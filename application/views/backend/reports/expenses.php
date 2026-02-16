<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Filter Laporan</h3>
            </div>
            <div class="card-body">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tanggal Awal</label>
                                <input type="date" name="start_date" class="form-control" value="<?= $this->input->get('start_date') ?? date('Y-m-01') ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tanggal Akhir</label>
                                <input type="date" name="end_date" class="form-control" value="<?= $this->input->get('end_date') ?? date('Y-m-t') ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>&nbsp;</label><br>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Filter</button>
                                <?php if (!empty($expenses)) : ?>
                                    <a href="<?= site_url('reports/expenses_pdf?start_date=' . $start_date . '&end_date=' . $end_date) ?>" target="_blank" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Export PDF</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php if (!empty($expenses)) : ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Pengeluaran (<?= date('d/m/Y', strtotime($start_date)) ?> - <?= date('d/m/Y', strtotime($end_date)) ?>)</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Keterangan</th>
                                <th>Jumlah</th>
                                <th>Diinput Oleh</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($expenses as $index => $expense) :
                                $total += $expense->amount;
                            ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= date('d/m/Y', strtotime($expense->date)) ?></td>
                                    <td><?= $expense->category ?></td>
                                    <td><?= $expense->description ?></td>
                                    <td>Rp <?= number_format($expense->amount, 0, ',', '.') ?></td>
                                    <td><?= $expense->user_name ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4" class="text-right">Total Pengeluaran:</th>
                                <th colspan="2">Rp <?= number_format($total, 0, ',', '.') ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        <?php endif; ?>
    </div>
</div>
