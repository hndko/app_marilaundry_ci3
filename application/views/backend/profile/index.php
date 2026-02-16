<div class="row">
    <div class="col-md-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="https://ui-avatars.com/api/?name=<?= urlencode($user->fullname) ?>&background=0D8ABC&color=fff" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $user->fullname ?></h3>
                <p class="text-muted text-center"><?= ucfirst($user->role) ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Username</b> <a class="float-right"><?= $user->username ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right"><?= $user->email ?></a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Profil & Keamanan</h3>
            </div><!-- /.card-header -->
            <div class="card-body">
                <form action="<?= site_url('profile/update') ?>" method="post">
                    <div class="form-group row">
                        <label for="fullname" class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="fullname" id="fullname" value="<?= $user->fullname ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" id="username" value="<?= $user->username ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="email" value="<?= $user->email ?>" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password Baru</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Kosongkan jika tidak ingin mengubah password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pass_conf" class="col-sm-3 col-form-label">Konfirmasi</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="pass_conf" id="pass_conf" placeholder="Ulangi password baru">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
