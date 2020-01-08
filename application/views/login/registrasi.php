<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
<div class="">
  
  <div class="login-logo">
    <img class="" src="<?php echo base_url() ?>assets/upload/image/logo.png" alt="logo" width="215px" height="200px">
    <h1><b>Registrasi</b> Mahaiswa</h1>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"></p>

<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('registrasi'),' class="form-horizontal"');
?>

<div class="form-group" hidden="">
  <label class="col-md-2 control-label">Prodi</label>
  <div class="col-md-2">
   <select name="prodi" class="form-control">
    <option value="Teknik Komputer">Teknik Komputer</option>
   </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Nama </label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Nama Pengguna" name="nama_mahasiswa" value="<?php echo set_value('nama_mahasiswa') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Email</label>
  <div class="col-md-5">
    <input type="email" class="form-control" placeholder="Email Pengguna" name="email" value="<?php echo set_value('email') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">No Bp</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Nim" name="no_induk" value="<?php echo set_value('no_induk') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Password</label>
  <div class="col-md-3">
    <input type="password" class="form-control" id="mypass" name="password" placeholder="Password" value="<?php echo set_value('password') ?>" required>
  </div>
    <i type=button class="fa fa-eye" id="show" onclick="ShowPassword()"></i>
  <i type=button class="fa fa-eye" style="display:none" id="hide" onclick="HidePassword()"></i>
</div> 

<div class="form-group">
  <label class="col-md-2 control-label">Re-type Password</label>
  <div class="col-md-3">
    <input type="password" class="form-control" id="mypass2" name="password2" placeholder="Password" value="<?php echo set_value('password2') ?>" required>
  </div>
    <i type=button class="fa fa-eye" id="show2"  onclick="ShowPassword2()"></i>
  <i type=button class="fa fa-eye" style="display:none" id="hide2" onclick="HidePassword2()"></i>
</div> 

<hr>
<h3 class="align text-center"><b>Biodata Diri</b></h3>

<div class="form-group">
  <label class="col-md-2 control-label">Tanggal Lahir</label>
  <div class="col-md-3">
    <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" value="<?php echo set_value('tanggal_lahir') ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Tempat Lahir</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" value="<?php echo set_value('tempat_lahir') ?>">
  </div>
</div>


<div class="form-group">
  <label class="col-md-2 control-label">Alamat</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo set_value('alamat') ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Agama</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Agama" name="agama" value="<?php echo set_value('agama') ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">No Telp/Hp</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="No Telp/Hp" name="no_tlp" value="<?php echo set_value('no_tlp') ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label"></label>
  <div class="col-md-5">
    <button class="btn btn-success btn-lg" name="submit" type="submit">
      <i class="fa fa-save"></i>Simpan
    </button>
    <button class="btn btn-info btn-lg" name="reset" type="reset">
      <i class="fa fa-times"></i>Reset
    </button>
  </div>
</div>

<?php echo form_close(); ?>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>assets/admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

  function ShowPassword()
{
  if(document.getElementById("mypass").value!="")
  {
    document.getElementById("mypass").type="text";
    document.getElementById("show").style.display="none";
    document.getElementById("hide").style.display="block";
  }
}

function HidePassword()
{
  if(document.getElementById("mypass").type == "text")
  {
    document.getElementById("mypass").type="password"
    document.getElementById("show").style.display="block";
    document.getElementById("hide").style.display="none";
  }
}

  function ShowPassword2()
{
  if(document.getElementById("mypass2").value!="")
  {
    document.getElementById("mypass2").type="text";
    document.getElementById("show2").style.display="none";
    document.getElementById("hide2").style.display="block";
  }
}

function HidePassword2()
{
  if(document.getElementById("mypass2").type == "text")
  {
    document.getElementById("mypass2").type="password"
    document.getElementById("show2").style.display="block";
    document.getElementById("hide2").style.display="none";
  }
}
</script>
</body>
</html>
