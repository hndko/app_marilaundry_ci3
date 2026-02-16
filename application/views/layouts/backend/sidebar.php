<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= site_url('dashboard') ?>" class="brand-link">
		<span class="brand-text font-weight-light">MariLaundry</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url('assets/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?= $this->session->userdata('fullname') ?? $this->session->userdata('username') ?></a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

				<li class="nav-header">NAVIGASI</li>
				<li class="nav-item">
					<a href="<?= site_url('dashboard') ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>

				<li class="nav-header">TRANSAKSI</li>
				<li class="nav-item">
					<a href="<?= site_url('orders') ?>" class="nav-link <?= $this->uri->segment(1) == 'orders' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-cash-register"></i>
						<p>Entri Transaksi</p>
					</a>
				</li>

				<li class="nav-header">DATA MASTER</li>
				<li class="nav-item">
					<a href="<?= site_url('customers') ?>" class="nav-link <?= $this->uri->segment(1) == 'customers' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-users"></i>
						<p>Pelanggan</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('services') ?>" class="nav-link <?= $this->uri->segment(1) == 'services' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-concierge-bell"></i>
						<p>Layanan</p>
					</a>
				</li>

				<li class="nav-header">KEUANGAN</li>
				<li class="nav-item">
					<a href="<?= site_url('expenses') ?>" class="nav-link <?= $this->uri->segment(1) == 'expenses' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-hand-holding-usd"></i>
						<p>Pengeluaran</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('reports') ?>" class="nav-link <?= $this->uri->segment(1) == 'reports' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-chart-bar"></i>
						<p>Laporan</p>
					</a>
				</li>

				<li class="nav-header">SISTEM</li>
				<li class="nav-item">
					<a href="<?= site_url('settings') ?>" class="nav-link <?= $this->uri->segment(1) == 'settings' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-cogs"></i>
						<p>Pengaturan</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('auth/logout') ?>" class="nav-link text-danger">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>Keluar (Logout)</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><?= $title ?? $page_title ?? 'Dashboard' ?></h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
