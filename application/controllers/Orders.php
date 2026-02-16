<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        auth_middleware();
        $this->load->model('Order_model');
        $this->load->model('Customer_model');
        $this->load->model('Service_model');
        $this->load->model('Setting_model');
        $this->load->helper('whatsapp');
    }

    public function index()
    {
        $data['title'] = 'Data Transaksi';
        $data['orders'] = $this->Order_model->get_all();
        $this->_render('backend/orders/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Buat Transaksi Baru';
        $data['customers'] = $this->Customer_model->get_all();
        $data['services'] = $this->Service_model->get_all();
        $this->_render('backend/orders/create', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('customer_id', 'Pelanggan', 'required');
        $this->form_validation->set_rules('service_id[]', 'Layanan', 'required');
        $this->form_validation->set_rules('qty[]', 'Jumlah', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            // Calculate total price and estimation
            $customer_id = $this->input->post('customer_id');
            $services = $this->input->post('service_id'); // Array of service IDs
            $qtys = $this->input->post('qty'); // Array of quantities

            $total_price = 0;
            $max_duration = 0;

            // Prepare Order Data
            $invoice_code = $this->Order_model->generate_invoice();

            // Loop to calculate totals first (simplification)
            foreach ($services as $key => $service_id) {
                $service = $this->Service_model->get_by_id($service_id);
                $qty = $qtys[$key];
                $total_price += $service->price * $qty;
                if ($service->estimation_duration > $max_duration) {
                    $max_duration = $service->estimation_duration;
                }
            }

            $entry_date = date('Y-m-d H:i:s');
            $estimation_date = date('Y-m-d H:i:s', strtotime("+$max_duration hours"));

            $order_data = [
                'invoice_code' => $invoice_code,
                'customer_id' => $customer_id,
                'entry_date' => $entry_date,
                'estimation_date' => $estimation_date,
                'status' => 'diterima',
                'total_price' => $total_price,
                'payment_status' => 'unpaid',
                'payment_method' => 'pending',
                'user_id' => $this->session->userdata('user_id'),
            ];

            // Start Transaction
            $this->db->trans_start();

            $order_id = $this->Order_model->insert($order_data);

            // Insert Details
            foreach ($services as $key => $service_id) {
                $service = $this->Service_model->get_by_id($service_id);
                $qty = $qtys[$key];
                $subtotal = $service->price * $qty;

                $detail_data = [
                    'order_id' => $order_id,
                    'service_id' => $service_id,
                    'qty' => $qty,
                    'price' => $service->price,
                    'subtotal' => $subtotal,
                ];
                $this->Order_model->insert_detail($detail_data);
            }

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata('error', 'Gagal membuat transaksi!');
                redirect('orders/create');
            } else {
                // Send Notification
                $template = $this->Setting_model->get_value('wa_template_accepted');
                if ($template) {
                    $customer = $this->Customer_model->get_by_id($customer_id);
                    $message = format_wa_message($template, [
                        'invoice' => $invoice_code,
                        'customer' => $customer->name,
                        'estimation' => date('d/m/Y H:i', strtotime($estimation_date)),
                        'total' => 'Rp ' . number_format($total_price, 0, ',', '.')
                    ]);
                    send_wa($customer->phone, $message);
                }

                $this->session->set_flashdata('success', 'Transaksi berhasil dibuat! Invoice: ' . $invoice_code);
                redirect('orders');
            }
        }
    }

    public function show($id)
    {
        $data['title'] = 'Detail Transaksi';
        $data['order'] = $this->Order_model->get_by_id($id);

        if (!$data['order']) {
            $this->session->set_flashdata('error', 'Transaksi tidak ditemukan!');
            redirect('orders');
        }

        $this->_render('backend/orders/show', $data);
    }

    public function update_status($id)
    {
        $status = $this->input->post('status');
        $order = $this->Order_model->get_by_id($id);

        if ($status == 'selesai' && $order->payment_status == 'unpaid') {
            $this->session->set_flashdata('error', 'Pesanan belum dibayar, tidak dapat diselesaikan!');
            redirect('orders/show/' . $id);
            return;
        }

        if ($status) {
            $this->Order_model->update($id, ['status' => $status]);

            // Send Notification based on status
            $template_key = '';
            if ($status == 'diproses') $template_key = 'wa_template_process';
            elseif ($status == 'selesai') $template_key = 'wa_template_ready';
            elseif ($status == 'diambil') $template_key = 'wa_template_taken';

            if ($template_key) {
                $template = $this->Setting_model->get_value($template_key);
                if ($template) {
                    $message = format_wa_message($template, [
                        'invoice' => $order->invoice_code,
                        'customer' => $order->customer_name,
                        'estimation' => date('d/m/Y H:i', strtotime($order->estimation_date)),
                        'total' => 'Rp ' . number_format($order->total_price, 0, ',', '.')
                    ]);
                    send_wa($order->customer_phone, $message);
                }
            }

            $this->session->set_flashdata('success', 'Status transaksi diperbarui!');
        }
        redirect('orders/show/' . $id);
    }

    public function pay($id)
    {
        $payment_method = $this->input->post('payment_method');
        if (!$payment_method) {
            $this->session->set_flashdata('error', 'Metode pembayaran harus dipilih!');
            redirect('orders/show/' . $id);
            return;
        }

        $this->Order_model->update($id, [
            'payment_status' => 'paid',
            'payment_method' => $payment_method
        ]);
        $this->session->set_flashdata('success', 'Pembayaran berhasil dikonfirmasi!');
        redirect('orders/show/' . $id);
    }

    public function print_nota($id)
    {
        $data['order'] = $this->Order_model->get_by_id($id);
        if (!$data['order']) {
            show_404();
        }
        $this->load->view('backend/orders/print', $data);
    }

    private function _render($view, $data)
    {
        $this->load->view('layouts/backend/head', $data);
        $this->load->view('layouts/backend/navbar');
        $this->load->view('layouts/backend/sidebar');
        $this->load->view($view, $data);
        $this->load->view('layouts/backend/footer');
        $this->load->view('layouts/backend/javascript');
    }
}
