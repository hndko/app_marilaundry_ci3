<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Data Layanan</h3>
				<div class="card-tools">
					<a href="<?= site_url('services/create') ?>" class="btn btn-primary btn-sm">
						<i class="fas fa-plus"></i> Tambah Layanan
					</a>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<div class="row mb-3">
					<div class="col-md-3">
						<div class="form-group">
							<label>Filter Satuan</label>
							<select class="form-control" id="filterUnit">
								<option value="">Semua</option>
								<option value="Kg">Kg</option>
								<option value="Pcs">Pcs</option>
								<option value="Meter">Meter</option>
							</select>
						</div>
					</div>
				</div>
				<table id="servicesTable" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Layanan</th>
							<th>Deskripsi</th>
							<th>Harga</th>
							<th>Satuan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($services as $service): ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $service->name ?></td>
								<td><?= $service->description ?? '-' ?></td>
								<td>Rp <?= number_format($service->price, 0, ',', '.') ?></td>
								<td><?= $service->unit ?></td>
								<td>
									<a href="<?= site_url('services/show/' . $service->id) ?>" class="btn btn-info btn-xs">
										<i class="fas fa-eye"></i> Detail
									</a>
									<a href="<?= site_url('services/edit/' . $service->id) ?>" class="btn btn-warning btn-xs">
										<i class="fas fa-edit"></i> Edit
									</a>
									<a href="<?= site_url('services/delete/' . $service->id) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
										<i class="fas fa-trash"></i> Hapus
									</a>
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

<script>
	$(document).ready(function() {
		var table = $('#servicesTable').DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
		});

		$('#filterUnit').on('change', function() {
			table.column(4).search(this.value).draw();
		});
	});
</script>
