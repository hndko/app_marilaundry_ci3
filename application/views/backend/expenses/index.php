<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pengeluaran</h3>
                <div class="card-tools">
                    <a href="<?= site_url('expenses/create') ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Pengeluaran
                    </a>
                </div>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($expenses as $index => $expense) : ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= date('d/m/Y', strtotime($expense->date)) ?></td>
                                <td><?= $expense->category ?></td>
                                <td><?= $expense->description ?></td>
                                <td>Rp <?= number_format($expense->amount, 0, ',', '.') ?></td>
                                <td><?= $expense->user_name ?></td>
                                <td>
                                    <a href="<?= site_url('expenses/edit/' . $expense->id) ?>" class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= site_url('expenses/delete/' . $expense->id) ?>" class="btn btn-danger btn-sm delete-btn" title="Hapus">
                                        <i class="fas fa-trash"></i>
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
