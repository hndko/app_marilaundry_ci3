<div class="row">
    <div class="col-md-6">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Pengeluaran</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= site_url('expenses/update/' . $expense->id) ?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="date">Tanggal</label>
                        <input type="date" class="form-control" id="date" name="date" value="<?= $expense->date ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Listrik" <?= $expense->category == 'Listrik' ? 'selected' : '' ?>>Listrik</option>
                            <option value="Air" <?= $expense->category == 'Air' ? 'selected' : '' ?>>Air</option>
                            <option value="Gaji Karyawan" <?= $expense->category == 'Gaji Karyawan' ? 'selected' : '' ?>>Gaji Karyawan</option>
                            <option value="Perawatan Mesin" <?= $expense->category == 'Perawatan Mesin' ? 'selected' : '' ?>>Perawatan Mesin</option>
                            <option value="Deterjen & Pewangi" <?= $expense->category == 'Deterjen & Pewangi' ? 'selected' : '' ?>>Deterjen & Pewangi</option>
                            <option value="Sewa Tempat" <?= $expense->category == 'Sewa Tempat' ? 'selected' : '' ?>>Sewa Tempat</option>
                            <option value="Lainnya" <?= $expense->category == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Keterangan</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required><?= $expense->description ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="amount">Jumlah Pengeluaran</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" class="form-control" id="amount" name="amount" value="<?= $expense->amount ?>" required>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= site_url('expenses') ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
