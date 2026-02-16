<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Pengeluaran</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= site_url('expenses/store') ?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="date">Tanggal</label>
                        <input type="date" class="form-control" id="date" name="date" value="<?= date('Y-m-d') ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Listrik">Listrik</option>
                            <option value="Air">Air</option>
                            <option value="Gaji Karyawan">Gaji Karyawan</option>
                            <option value="Perawatan Mesin">Perawatan Mesin</option>
                            <option value="Deterjen & Pewangi">Deterjen & Pewangi</option>
                            <option value="Sewa Tempat">Sewa Tempat</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Keterangan</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Masukkan keterangan pengeluaran" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="amount">Jumlah Pengeluaran</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" class="form-control" id="amount" name="amount" placeholder="0" required>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= site_url('expenses') ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
