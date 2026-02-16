<div class="row">
    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Detail Layanan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">Nama Layanan</dt>
                    <dd class="col-sm-8"><?= $service->name ?></dd>

                    <dt class="col-sm-4">Deskripsi</dt>
                    <dd class="col-sm-8"><?= $service->description ?? '-' ?></dd>

                    <dt class="col-sm-4">Harga</dt>
                    <dd class="col-sm-8">Rp <?= number_format($service->price, 0, ',', '.') ?></dd>

                    <dt class="col-sm-4">Satuan</dt>
                    <dd class="col-sm-8"><?= $service->unit ?></dd>

                    <dt class="col-sm-4">Dibuat Pada</dt>
                    <dd class="col-sm-8"><?= date('d F Y H:i', strtotime($service->created_at)) ?></dd>

                    <dt class="col-sm-4">Diperbarui Pada</dt>
                    <dd class="col-sm-8"><?= $service->updated_at ? date('d F Y H:i', strtotime($service->updated_at)) : '-' ?></dd>
                </dl>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="<?= site_url('services/edit/' . $service->id) ?>" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="<?= site_url('services') ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
