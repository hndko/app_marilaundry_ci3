<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Edit Layanan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= site_url('services/update/' . $service->id) ?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Layanan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-tag"></i></span>
                            </div>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama Layanan" value="<?= $service->name ?>" required>
                        </div>
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi (Opsional)</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                            </div>
                            <textarea class="form-control" id="description" name="description" placeholder="Masukan Deskripsi Layanan"><?= $service->description ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Masukan Harga" value="<?= $service->price ?>" required>
                        </div>
                        <?= form_error('price', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="unit">Satuan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                            </div>
                            <select class="form-control" id="unit" name="unit" required>
                                <option value="Kg" <?= $service->unit == 'Kg' ? 'selected' : '' ?>>Kg</option>
                                <option value="Pcs" <?= $service->unit == 'Pcs' ? 'selected' : '' ?>>Pcs</option>
                                <option value="Meter" <?= $service->unit == 'Meter' ? 'selected' : '' ?>>Meter</option>
                            </select>
                        </div>
                        <?= form_error('unit', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="<?= site_url('services') ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Batal
                    </a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
