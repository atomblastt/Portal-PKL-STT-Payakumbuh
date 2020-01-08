 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="<?php echo base_url('home/dasbor') ?>"><i class="fa fa-user"></i> <span><b>Profil</b></span></a></li>
        <li class="treeview">
          <a href="<?php echo base_url('admin/dasbor') ?>">
            <i class="fa fa-server"></i> <span><b>PKL</b></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('home/pkl') ?>"><i class="fa fa-book"></i>Pendaftaran</a></li>
            <?php if ($user->status_pkl==='disetujui'): ?>
            <li><a href="<?php echo base_url('home/pkl/list_pembimbing') ?>"><i class="fa fa-user "></i>Pilih Pembimbing Lapangan</a></li>
            <li><a href="<?php echo base_url('home/pkl/kegiatan') ?>"><i class="fa fa-book "></i>Kegiatan PKL</a></li>
            <?php endif ?>
          </ul>
          <?php if ($user->id_dosen): ?>
          <li><a href="<?php echo base_url('home/judul') ?>"><i class="fa fa-pencil "></i><b>Pengajuan Judul</b></a></li>
          <?php endif ?>

          <?php if ($user->status_judul==='acc'): ?>
           <li><a href="<?php echo base_url('home/bimbingan') ?>"><i class="fa fa-pencil "></i><b>Bimbingan</b></a></li>
          <?php endif ?>
        </li>
       

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- <div class="row"> -->
        <!-- <div class="col-xs-12">
          <div class="box">
             /.box-header -->
            <!-- <div class="box-body"> -->
