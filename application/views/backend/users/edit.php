<div class="row">
    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Form Edit Pengguna</h3>
            </div>
            <form action="<?= site_url('users/update/' . $user->id) ?>" method="post">
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="fullname">Nama Lengkap</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" value="<?= $user->fullname ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= $user->username ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= $user->email ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="operator" <?= $user->role == 'operator' ? 'selected' : '' ?>>Operator</option>
                            <option value="admin" <?= $user->role == 'admin' ? 'selected' : '' ?>>Administrator</option>
                            <option value="owner" <?= $user->role == 'owner' ? 'selected' : '' ?>>Owner</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update</button>
                    <a href="<?= site_url('users') ?>" class="btn btn-default">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
