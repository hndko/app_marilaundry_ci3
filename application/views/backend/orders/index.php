<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Transaksi</h3>
                <div class="card-tools">
                    <a href="<?= site_url('orders/create') ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Buat Transaksi
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="ordersTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Invoice</th>
                            <th>Pelanggan</th>
                            <th>Tanggal Masuk</th>
                            <th>Estimasi Selesai</th>
                            <th>Total Biaya</th>
                            <th>Status</th>
                            <th>Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($orders as $order): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $order->invoice_code ?></td>
                                <td><?= $order->customer_name ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($order->entry_date)) ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($order->estimation_date)) ?></td>
                                <td>Rp <?= number_format($order->total_price, 0, ',', '.') ?></td>
                                <td>
                                    <?php
                                    $badge = 'secondary';
                                    if ($order->status == 'diterima') $badge = 'info';
                                    elseif ($order->status == 'diproses') $badge = 'primary';
                                    elseif ($order->status == 'selesai') $badge = 'success';
                                    elseif ($order->status == 'diambil') $badge = 'secondary';
                                    ?>
                                    <span class="badge badge-<?= $badge ?>"><?= ucfirst($order->status) ?></span>
                                </td>
                                <td>
                                    <span class="badge badge-<?= $order->payment_status == 'paid' ? 'success' : 'danger' ?>">
                                        <?= $order->payment_status == 'paid' ? 'Lunas' : 'Belum Lunas' ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="<?= site_url('orders/show/' . $order->id) ?>" class="btn btn-info btn-xs">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#ordersTable').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "order": [
                [3, "desc"]
            ] // Sort by Entry Date Desc
        });
    });
</script>
