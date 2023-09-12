<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
	<link rel="icon" href="<?php echo base_url();?>img/image.png" type="image/ico" />
  <title>San Martin de Porres</title>


  <!-- Bootstrap -->
  <link href="<?php echo base_url();?>admintemplete/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url();?>admintemplete/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?php echo base_url();?>admintemplete/vendors/animate.css/animate.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="<?php echo base_url();?>admintemplete/build/css/custom.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>admintemplete/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>admintemplete/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>admintemplete/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>admintemplete/dist/css/adminlte.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">



  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
    <div class="login-logo">
    <img src="<?php echo base_url();?>img/logo.png" alt="CentroCatólico" width="40%;">
    <img src="<?php echo base_url();?>img/nombrelogo.png" alt="CentroCatólico" width="60%;">
  </div>
    <br>
<?php

echo form_open_multipart('usuario/validarusuario', array('id'=>'form1', 'class'=>'needs-validation', 'method'=>'post'));

?>
        
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Email" name="email" required autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="contrasenia" required autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
          </div>
        </div><br>
<?php
echo form_close();
?>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url();?>adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>

