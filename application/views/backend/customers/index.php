<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pelanggan</h3>
                <div class="card-tools">
                    <a href="<?= site_url('customers/create') ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Pelanggan
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="customersTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No. Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($customers as $customer): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $customer->name ?></td>
                                <td><?= $customer->phone ?></td>
                                <td><?= $customer->address ?? '-' ?></td>
                                <td>
                                    <a href="<?= site_url('customers/show/' . $customer->id) ?>" class="btn btn-info btn-xs">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a href="<?= site_url('customers/edit/' . $customer->id) ?>" class="btn btn-warning btn-xs">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="<?= site_url('customers/delete/' . $customer->id) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?');">
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
        $('#customersTable').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        });
    });
</script>
