<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Reports extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        auth_middleware();
        $this->load->model('Expense_model');
    }

    public function index()
    {
        $data['title'] = 'Laporan';
        $this->_render('backend/reports/index', $data);
    }

    public function expenses()
    {
        $data['title'] = 'Laporan Pengeluaran';
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        if ($start_date && $end_date) {
            $data['expenses'] = $this->Expense_model->get_by_date_range($start_date, $end_date);
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;
        } else {
            $data['expenses'] = [];
            $data['start_date'] = date('Y-m-01');
            $data['end_date'] = date('Y-m-t');
        }

        $this->_render('backend/reports/expenses', $data);
    }

    public function expenses_pdf()
    {
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        if (!$start_date || !$end_date) {
            redirect('reports/expenses');
        }

        $data['expenses'] = $this->Expense_model->get_by_date_range($start_date, $end_date);
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;

        $html = $this->load->view('backend/reports/expenses_pdf', $data, TRUE);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("laporan_pengeluaran_" . date('YmdHis') . ".pdf", array("Attachment" => 0));
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
