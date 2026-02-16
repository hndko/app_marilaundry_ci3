<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layouts/auth/head'); ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= site_url() ?>"><b>Mari</b>Laundry</a>
        </div>
        <!-- /.login-logo -->

        <?php if (isset($view) && $view) $this->load->view($view); ?>

    </div>
    <!-- /.login-box -->

    <!-- REQUIRED SCRIPTS -->
    <?php $this->load->view('layouts/auth/javascript'); ?>
</body>

</html>
