  <div class="card">
      <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>

          <form action="<?= site_url('auth/login') ?>" method="post">
              <div class="input-group mb-3">
                  <input type="text" class="form-control" name="username" placeholder="Username / Email" value="<?= set_value('username'); ?>">
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                      </div>
                  </div>
              </div>
              <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>

              <div class="input-group mb-3">
                  <input type="password" class="form-control" name="password" placeholder="Password">
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                      </div>
                  </div>
              </div>
              <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>

              <div class="row">
                  <div class="col-8">
                      <div class="icheck-primary">
                          <input type="checkbox" id="remember">
                          <label for="remember">
                              Remember Me
                          </label>
                      </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                      <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                  </div>
                  <!-- /.col -->
              </div>
          </form>
      </div>
      <!-- /.login-card-body -->
  </div>
