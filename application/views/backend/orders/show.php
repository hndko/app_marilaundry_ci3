<div class="row">
    <div class="col-12">
        <!-- Main content -->
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas fa-globe"></i> MariLaundry.
                        <small class="float-right">Date: <?= date('d/m/Y', strtotime($order->entry_date)) ?></small>
                    </h4>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    Dari
                    <address>
                        <strong>MariLaundry</strong><br>
                        Jl. Contoh Laundry No. 123<br>
                        Jakarta, Indonesia<br>
                        Phone: (021) 123-4567<br>
                        Email: info@marilaundry.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    Kepada
                    <address>
                        <strong><?= $order->customer_name ?></strong><br>
                        <?= $order->address ?? 'Alamat tidak tersedia' ?><br>
                        Phone: <?= $order->phone ?><br>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>No. Invoice #<?= $order->invoice_code ?></b><br>
                    <br>
                    <b>Status Order:</b> <span class="badge badge-info"><?= ucfirst($order->status) ?></span><br>
                    <b>Estimasi Selesai:</b> <?= date('d/m/Y H:i', strtotime($order->estimation_date)) ?><br>
                    <b>Status Pembayaran:</b>
                    <span class="badge badge-<?= $order->payment_status == 'paid' ? 'success' : 'danger' ?>">
                        <?= $order->payment_status == 'paid' ? 'Lunas' : 'Belum Lunas' ?>
                    </span>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Qty</th>
                                <th>Layanan</th>
                                <th>Harga Satuan</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order->details as $detail) : ?>
                                <tr>
                                    <td><?= $detail->qty + 0 ?> <?= $detail->unit ?></td>
                                    <td><?= $detail->service_name ?></td>
                                    <td>Rp <?= number_format($detail->price, 0, ',', '.') ?></td>
                                    <td>Rp <?= number_format($detail->subtotal, 0, ',', '.') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                    <p class="lead">Metode Pembayaran:</p>
                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        <?= ucfirst($order->payment_method) ?>
                    </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <p class="lead">Total Tagihan</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Total:</th>
                                <td>Rp <?= number_format($order->total_price, 0, ',', '.') ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-12">
                    <a href="<?= site_url('orders/print_nota/' . $order->id) ?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print Nota</a>

                    <?php if ($order->payment_status == 'unpaid') : ?>
                        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#paymentModal">
                            <i class="far fa-credit-card"></i> Bayar Sekarang
                        </button>
                    <?php endif; ?>

                    <!-- Status Update Buttons -->
                    <div class="float-right mr-2">
                        <form action="<?= site_url('orders/update_status/' . $order->id) ?>" method="post" class="d-inline">
                            <?php if ($order->status == 'diterima') : ?>
                                <button type="submit" name="status" value="diproses" class="btn btn-primary">
                                    <i class="fas fa-cog"></i> Proses Laundry
                                </button>
                            <?php elseif ($order->status == 'diproses') : ?>
                                <?php if ($order->payment_status == 'unpaid') : ?>
                                    <button type="button" class="btn btn-warning disabled" title="Harap lunasi pembayaran terlebih dahulu">
                                        <i class="fas fa-check"></i> Selesai
                                    </button>
                                <?php else: ?>
                                    <button type="submit" name="status" value="selesai" class="btn btn-warning">
                                        <i class="fas fa-check"></i> Selesai
                                    </button>
                                <?php endif; ?>
                            <?php elseif ($order->status == 'selesai') : ?>
                                <button type="submit" name="status" value="diambil" class="btn btn-success">
                                    <i class="fas fa-people-carry"></i> Diambil
                                </button>
                            <?php endif; ?>
                        </form>
                    </div>

                    <a href="<?= site_url('orders') ?>" class="btn btn-secondary float-right mr-2" style="margin-right: 5px;">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
        <!-- /.invoice -->
    </div><!-- /.col -->
</div><!-- /.row -->

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Konfirmasi Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('orders/pay/' . $order->id) ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Metode Pembayaran</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="cash" name="payment_method" value="cash" checked>
                            <label for="cash" class="custom-control-label">Tunai (Cash)</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="transfer" name="payment_method" value="transfer">
                            <label for="transfer" class="custom-control-label">Transfer Bank</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="qris" name="payment_method" value="qris">
                            <label for="qris" class="custom-control-label">QRIS</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>
