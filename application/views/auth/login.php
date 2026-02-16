<div class="split-container">
	<!-- Left: Brand Side -->
	<div class="brand-side">
		<h1>MariLaundry</h1>
		<p>Solusi manajemen laundry modern, cepat, dan efisien. Kelola bisnismu dengan mudah dalam satu genggaman.</p>
	</div>

	<!-- Right: Form Side -->
	<div class="form-side">
		<div class="login-card">
			<div class="brand-logo">MariLaundry</div>
			<h2>Selamat Datang!</h2>
			<p class="subtitle">Silakan masuk untuk memulai pengelolaan.</p>

			<form action="<?= site_url('auth/login') ?>" method="post">
				<div class="form-group">
					<label>Username</label>
					<div class="input-wrapper">
						<input type="text" name="username" placeholder="Masukkan username" value="<?= set_value('username'); ?>" required autofocus>
						<i class="fas fa-user"></i>
					</div>
					<?= form_error('username', '<small class="text-danger d-block mb-3" style="margin-top:-10px">', '</small>'); ?>
				</div>

				<div class="form-group">
					<label>Password</label>
					<div class="input-wrapper">
						<input type="password" name="password" placeholder="Masukkan password" required>
						<i class="fas fa-lock"></i>
					</div>
					<?= form_error('password', '<small class="text-danger d-block mb-3" style="margin-top:-10px">', '</small>'); ?>
				</div>

				<button type="submit" class="btn-submit">
					Masuk ke Aplikasi <i class="fas fa-arrow-right ml-2"></i>
				</button>
			</form>

			<div class="footer-copyright">
				&copy; <?= date('Y') ?> MariLaundry System v1.0
			</div>
		</div>
	</div>
</div>
