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
        <li><a href="<?php echo base_url('admin/dasbor') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-table"></i>Data User</a></li>
            <li><a href="<?php echo base_url('admin/user/tambah_data') ?>"><i class="fa fa-plus"></i>Tambah User</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-server"></i> <span>PKL</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/pkl') ?>"><i class="fa fa-book"></i>Daftar Mahasiswa PKL</a></li>
            <li><a href="<?php echo base_url('admin/pkl/kegiatan') ?>"><i class="fa fa-book"></i>Kegiatan Mahasiswa</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-server"></i> <span>Bimbingan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/bimbingan') ?>"><i class="fa fa-users"></i>Daftar Mahasiswa Bimbingan</a></li>
            <li><a href="<?php echo base_url('admin/bimbingan/pembimbing') ?>"><i class="fa fa-user"></i>Dosen Pembimbing MHS</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa- fa-gavel"></i> <span>Persidangan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/sidang') ?>"><i class="fa fa-check"></i>Mahasiswa ACC Sidang</a></li>
            <li><a href="<?php echo base_url('admin/sidang/jadwal') ?>"><i class="fa fa-calendar"></i>Jadwal Sidang</a></li>
          </ul>
        </li>

        <li><a href="<?php echo base_url('admin/nilai_akhir') ?>"><i class="fa fa-book"></i>Nilai PKL Mahasiswa</a></li>


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
      
    </section>

    <!-- Main content -->
    <section class="content">
      