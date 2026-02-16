<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layouts/backend/head'); ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php $this->load->view('layouts/backend/navbar'); ?>

        <?php $this->load->view('layouts/backend/sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $page_title ?? 'Dashboard' ?></h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <?php if (isset($view) && $view) $this->load->view($view); ?>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php $this->load->view('layouts/backend/footer'); ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php $this->load->view('layouts/backend/javascript'); ?>
</body>

</html>
