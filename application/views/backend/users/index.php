<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Pengguna Sistem</h3>
                <div class="card-tools">
                    <a href="<?= site_url('users/create') ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah User
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $user->fullname ?></td>
                                <td><?= $user->username ?></td>
                                <td><?= $user->email ?></td>
                                <td>
                                    <span class="badge badge-<?= $user->role == 'admin' ? 'danger' : 'success' ?>">
                                        <?= ucfirst($user->role) ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if ($user->role !== 'super_admin') : ?>
                                        <a href="<?= site_url('users/edit/' . $user->id) ?>" class="btn btn-info btn-xs">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <?php if ($user->id != $this->session->userdata('user_id')) : ?>
                                            <a href="<?= site_url('users/delete/' . $user->id) ?>" class="btn btn-danger btn-xs btn-delete">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <span class="text-muted"><i class="fas fa-lock"></i> Sistem</span>
                                    <?php endif; ?>
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
