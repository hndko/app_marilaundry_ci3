<div class="row">
    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Detail Pelanggan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">Nama Pelanggan</dt>
                    <dd class="col-sm-8"><?= $customer->name ?></dd>

                    <dt class="col-sm-4">No. Telepon</dt>
                    <dd class="col-sm-8"><?= $customer->phone ?></dd>

                    <dt class="col-sm-4">Alamat</dt>
                    <dd class="col-sm-8"><?= $customer->address ?? '-' ?></dd>

                    <dt class="col-sm-4">Terdaftar Pada</dt>
                    <dd class="col-sm-8"><?= date('d F Y H:i', strtotime($customer->created_at)) ?></dd>

                    <dt class="col-sm-4">Diperbarui Pada</dt>
                    <dd class="col-sm-8"><?= $customer->updated_at ? date('d F Y H:i', strtotime($customer->updated_at)) : '-' ?></dd>
                </dl>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="<?= site_url('customers/edit/' . $customer->id) ?>" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="<?= site_url('customers') ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
