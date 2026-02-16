<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Pengguna</h3>
            </div>
            <form action="<?= site_url('users/store') ?>" method="post">
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="fullname">Nama Lengkap</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" value="<?= set_value('fullname') ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= set_value('username') ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= set_value('email') ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required minlength="5">
                        <small class="text-muted">Minimal 5 karakter.</small>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="operator" <?= set_select('role', 'operator') ?>>Operator</option>
                            <option value="admin" <?= set_select('role', 'admin') ?>>Administrator</option>
                            <option value="owner" <?= set_select('role', 'owner') ?>>Owner</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= site_url('users') ?>" class="btn btn-default">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
