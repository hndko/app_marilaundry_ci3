<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $stats['total_orders'] ?></h3>
                <p>Pesanan Bulan Ini</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="<?= site_url('orders') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>Rp <?= number_format($stats['revenue'], 0, ',', '.') ?></h3>
                <p>Omzet Bulan Ini</p>
            </div>
            <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <a href="<?= site_url('reports') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $stats['unpaid_orders'] ?></h3>
                <p>Belum Bayar</p>
            </div>
            <div class="icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <a href="<?= site_url('orders') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $stats['completed_orders'] ?></h3>
                <p>Pesanan Selesai</p>
            </div>
            <div class="icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <a href="<?= site_url('orders') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->

<div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-line mr-1"></i>
                    Tren Pendapatan (7 Hari Terakhir)
                </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content p-0">
                    <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                </div>
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Recent Orders -->
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Transaksi Terakhir</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>Invoice</th>
                                <th>Pelanggan</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recent_orders as $order) : ?>
                                <tr>
                                    <td><a href="<?= site_url('orders/show/' . $order->id) ?>"><?= $order->invoice_code ?></a></td>
                                    <td><?= $order->customer_name ?></td>
                                    <td>
                                        <span class="badge badge-<?= $order->status == 'diambil' ? 'success' : ($order->status == 'selesai' ? 'primary' : 'warning') ?>">
                                            <?= ucfirst($order->status) ?>
                                        </span>
                                    </td>
                                    <td>Rp <?= number_format($order->total_price, 0, ',', '.') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <a href="<?= site_url('orders/create') ?>" class="btn btn-sm btn-info float-left">Buat Pesanan Baru</a>
                <a href="<?= site_url('orders') ?>" class="btn btn-sm btn-secondary float-right">Lihat Semua Pesanan</a>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.Left col -->

    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">
        <!-- Donut chart -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Distribusi Layanan
                </h3>
            </div>
            <div class="card-body">
                <canvas id="service-pie-chart" height="300" style="height: 300px;"></canvas>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- right col -->
</div>

<!-- Chart Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(function() {
        // Revenue Trend Chart
        var revenueCanvas = $('#revenue-chart-canvas').get(0).getContext('2d');
        var revenueData = {
            labels: [
                <?php foreach ($revenue_trend as $rt) : ?> '<?= date('d M', strtotime($rt->date)) ?>',
                <?php endforeach; ?>
            ],
            datasets: [{
                label: 'Pendapatan',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: true,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [
                    <?php foreach ($revenue_trend as $rt) : ?> <?= $rt->total ?>,
                    <?php endforeach; ?>
                ]
            }]
        };

        var revenueOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false
                    }
                }]
            }
        };

        new Chart(revenueCanvas, {
            type: 'line',
            data: revenueData,
            options: revenueOptions
        });

        // Service Distribution Chart
        var pieCanvas = $('#service-pie-chart').get(0).getContext('2d');
        var pieData = {
            labels: [
                <?php foreach ($service_distribution as $sd) : ?> '<?= $sd->name ?>',
                <?php endforeach; ?>
            ],
            datasets: [{
                data: [
                    <?php foreach ($service_distribution as $sd) : ?> <?= $sd->count ?>,
                    <?php endforeach; ?>
                ],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
            }]
        };
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true
        };

        new Chart(pieCanvas, {
            type: 'doughnut',
            data: pieData,
            options: pieOptions
        });
    });
</script>
