<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title ?? 'Log in | MariLaundry' ?></title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?= base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">

	<!-- jQuery -->
	<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>

	<style>
		body,
		html {
			margin: 0;
			padding: 0;
			height: 100%;
			font-family: 'Source Sans Pro', sans-serif;
		}

		.split-container {
			display: flex;
			height: 100vh;
			width: 100vw;
			overflow: hidden;
		}

		/* Branding Side (Left) */
		.brand-side {
			flex: 1.2;
			background: linear-gradient(135deg, rgba(102, 126, 234, 0.95) 0%, rgba(118, 75, 162, 0.95) 100%),
				url('https://images.unsplash.com/photo-1545173153-93627c01ef7e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
			background-size: cover;
			background-position: center;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			color: #fff;
			padding: 4rem;
			text-align: center;
		}

		.brand-side h1 {
			font-size: 4rem;
			font-weight: 800;
			margin-bottom: 1rem;
			text-transform: uppercase;
			letter-spacing: 2px;
		}

		.brand-side p {
			font-size: 1.25rem;
			max-width: 500px;
			line-height: 1.6;
			opacity: 0.9;
		}

		/* Form Side (Right) */
		.form-side {
			flex: 1;
			background: #ffffff;
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 2rem;
		}

		.login-card {
			width: 100%;
			max-width: 400px;
		}

		.login-card .brand-logo {
			display: none;
			/* Hide on desktop because of left side */
			font-size: 2.5rem;
			font-weight: 700;
			color: #764ba2;
			margin-bottom: 2rem;
			text-align: center;
		}

		.login-card h2 {
			font-size: 2rem;
			font-weight: 700;
			color: #333;
			margin-bottom: 0.5rem;
		}

		.login-card p.subtitle {
			color: #666;
			margin-bottom: 2.5rem;
		}

		/* Custom Inputs */
		.form-group label {
			font-weight: 600;
			color: #444;
			font-size: 0.9rem;
			margin-bottom: 0.5rem;
		}

		.input-wrapper {
			position: relative;
			margin-bottom: 1.5rem;
		}

		.input-wrapper i {
			position: absolute;
			left: 15px;
			top: 50%;
			transform: translateY(-50%);
			color: #aaa;
			transition: color 0.3s;
		}

		.input-wrapper input {
			width: 100%;
			padding: 12px 15px 12px 45px;
			background: #f9f9fb;
			border: 2px solid #f0f0f5;
			border-radius: 12px;
			font-size: 1rem;
			transition: all 0.3s ease;
		}

		.input-wrapper input:focus {
			border-color: #667eea;
			background: #fff;
			outline: none;
			box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
		}

		.input-wrapper input:focus+i {
			color: #667eea;
		}

		/* Submit Button */
		.btn-submit {
			width: 100%;
			padding: 14px;
			background: linear-gradient(to right, #667eea, #764ba2);
			border: none;
			border-radius: 12px;
			color: #fff;
			font-size: 1.1rem;
			font-weight: 600;
			cursor: pointer;
			transition: all 0.3s ease;
			box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
			margin-top: 1rem;
		}

		.btn-submit:hover {
			transform: translateY(-2px);
			box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
		}

		.footer-copyright {
			margin-top: 3rem;
			color: #999;
			font-size: 0.85rem;
			text-align: center;
		}

		/* Responsive */
		@media (max-width: 991px) {
			.brand-side {
				display: none;
			}

			.login-card .brand-logo {
				display: block;
			}
		}
	</style>
</head>

<body class="hold-transition">
