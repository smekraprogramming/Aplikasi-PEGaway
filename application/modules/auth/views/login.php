
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | PEGaway</title>
    <!-- Favicon-->
    <link rel="icon" href="<?=base_url('assets/')?>favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?=base_url('assets/')?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?=base_url('assets/')?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?=base_url('assets/')?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?=base_url('assets/')?>css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Jquery Core Js -->
    <script src="<?=base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Aplikasi <b>PEG</b>away</a>
            <small>SMK Negeri 2 Nganjuk</small>
        </div>
        <?php if ($this->session->flashdata('error')): ?>
            <?=$this->session->flashdata('error')  ?>
        <?php endif ?> 
        <div class="card">
            <div class="body">
                <form id="sign_in" action="<?=site_url('auth');?>" method="POST">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="password" placeholder="Token" required>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div> -->
                        <div class="col-xs-4 col-xs-offset-4">
                            <button class="btn btn-block btn-lg bg-pink waves-effect" name="submit" type="submit">SIGN IN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap Core Js -->
    <script src="<?=base_url('assets/')?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=base_url('assets/')?>plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?=base_url('assets/')?>plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?=base_url('assets/')?>js/admin.js"></script>
    <script src="<?=base_url('assets/')?>js/pages/examples/sign-in.js"></script>
</body>

</html>