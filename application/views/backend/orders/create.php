<div class="row">
	<div class="col-12">
		<form action="<?= site_url('orders/store') ?>" method="post" id="orderForm">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Buat Transaksi Baru</h3>
				</div>
				<div class="card-body">
					<!-- Customer Selection -->
					<div class="form-group">
						<label for="customer_id">Pelanggan</label>
						<select class="form-control select2" id="customer_id" name="customer_id" style="width: 100%;" required>
							<option value="">-- Pilih Pelanggan --</option>
							<?php foreach ($customers as $customer) : ?>
								<option value="<?= $customer->id ?>"><?= $customer->name ?> - <?= $customer->phone ?></option>
							<?php endforeach; ?>
						</select>
						<small class="form-text text-muted">
							Pelanggan belum terdaftar? <a href="<?= site_url('customers/create') ?>">Tambah Pelanggan Baru</a>
						</small>
					</div>

					<!-- Services Section -->
					<div class="form-group mt-4">
						<label>Layanan Laundry</label>
						<table class="table table-bordered table-striped" id="servicesTable">
							<thead>
								<tr class="text-center">
									<th>Layanan</th>
									<th width="200">Harga</th>
									<th width="180">Jumlah</th>
									<th width="200">Subtotal</th>
									<th width="50"><i class="fas fa-trash"></i></th>
								</tr>
							</thead>
							<tbody>
								<tr class="service-row">
									<td>
										<select class="form-control service-select" name="service_id[]" required>
											<option value="" data-price="0">-- Pilih Layanan --</option>
											<?php foreach ($services as $service) : ?>
												<option value="<?= $service->id ?>" data-price="<?= $service->price ?>" data-unit="<?= $service->unit ?>">
													<?= $service->name ?> - Rp <?= number_format($service->price, 0, ',', '.') ?> / <?= $service->unit ?>
												</option>
											<?php endforeach; ?>
										</select>
									</td>
									<td>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">Rp</span>
											</div>
											<input type="text" class="form-control price-input text-right" value="0" readonly>
										</div>
									</td>
									<td>
										<div class="input-group">
											<input type="number" class="form-control qty-input text-center" name="qty[]" value="1" min="0.01" step="0.01" required>
											<div class="input-group-append">
												<span class="input-group-text unit-label">-</span>
											</div>
										</div>
									</td>
									<td>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">Rp</span>
											</div>
											<input type="text" class="form-control subtotal-input text-right" value="0" readonly>
										</div>
									</td>
									<td class="text-center">
										<button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-times"></i></button>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="3" class="text-right" style="vertical-align: middle;"><strong>Total Estimasi Biaya:</strong></td>
									<td>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text font-weight-bold">Rp</span>
											</div>
											<input type="text" class="form-control font-weight-bold text-right text-lg" id="grandTotal" value="0" readonly style="font-size: 1.2rem;">
										</div>
									</td>
									<td class="text-center" style="vertical-align: middle;">
										<button type="button" class="btn btn-success btn-sm" id="addRow"><i class="fas fa-plus"></i></button>
									</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Transaksi</button>
					<a href="<?= site_url('orders') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Batal</a>
				</div>
			</div>
		</form>
	</div>
</div>

<script>
	$(document).ready(function() {
		// Initialize Select2 (If you want to use it, ensure CSS/JS is loaded. For now standard select)
		// $('.select2').select2();

		function calculateRow(row) {
			var selectedOption = row.find('.service-select option:selected');
			var price = parseFloat(selectedOption.data('price')) || 0;
			var unit = selectedOption.data('unit');
			var qtyInput = row.find('.qty-input');
			var qty = parseFloat(qtyInput.val()) || 0;

			// Configure Input based on Unit
			if (unit === 'pcs') {
				qtyInput.attr('step', '1');
				qtyInput.attr('min', '1');
				row.find('.unit-label').text('Pcs');
			} else if (unit === 'kg') {
				qtyInput.attr('step', '0.01');
				qtyInput.attr('min', '0.01');
				row.find('.unit-label').text('Kg');
			} else {
				row.find('.unit-label').text('-');
			}

			var subtotal = Math.round(price * qty);

			row.find('.price-input').val(price);
			row.find('.subtotal-input').val(subtotal);

			calculateGrandTotal();
		}

		function calculateGrandTotal() {
			var total = 0;
			$('.subtotal-input').each(function() {
				total += parseFloat($(this).val()) || 0;
			});
			$('#grandTotal').val(Math.round(total));
		}

		function updateServiceOptions() {
			var selectedValues = [];
			$('.service-select').each(function() {
				var val = $(this).val();
				if (val) {
					selectedValues.push(val);
				}
			});

			$('.service-select').each(function() {
				var currentSelect = $(this);
				var currentVal = currentSelect.val();

				currentSelect.find('option').each(function() {
					var optionVal = $(this).val();
					if (optionVal && selectedValues.includes(optionVal) && optionVal !== currentVal) {
						$(this).prop('disabled', true);
					} else {
						$(this).prop('disabled', false);
					}
				});
			});
		}

		// Event for Service Select
		$(document).on('change', '.service-select', function() {
			calculateRow($(this).closest('tr'));
			updateServiceOptions();
		});

		// Event for Qty Input
		$(document).on('input', '.qty-input', function() {
			calculateRow($(this).closest('tr'));
		});

		// Add Row
		$('#addRow').click(function() {
			var row = $('.service-row').first().clone();

			// Clear inputs
			row.find('.qty-input').val(1);
			row.find('.price-input').val(0);
			row.find('.subtotal-input').val(0);
			row.find('.unit-label').text('-');

			// Reset selected option
			row.find('.service-select').val('');

			// Enable all options initially for new row
			row.find('option').prop('disabled', false);

			$('#servicesTable tbody').append(row);
			updateServiceOptions();
		});

		// Remove Row
		$(document).on('click', '.remove-row', function() {
			if ($('.service-row').length > 1) {
				$(this).closest('tr').remove();
				calculateGrandTotal();
				updateServiceOptions();
			} else {
				alert('Minimal satu layanan harus dipilih.');
			}
		});
	});
</script>
