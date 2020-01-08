<main role="main">
  <div class="row">
    <div class="col-md-4">
      <div class="box box-success">
        <div class="box-header">  
         <h2><b><?php echo $nama_mhs->nama_mahasiswa; ?></b></h2>
      </div>
    </div>
  </div>
</div>
<!--           <div class="card-body">
            <div class="row">
              <div class=" col-md-9 col-lg-9 ">
                <table id="tabel" class="table table-user-information">
            <div align="left">
            </div>                  
                  <br> -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header">
            
          <div class="box-header with-border">
              <h2>Kegiatan Praktek Kerja Lapangan</h2>
              <a href="#" data-target="#Modal_Tambah" id="modal" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#Modal_Tambah" align="center"><span class="fa fa-plus">
              </span>Tambah</a><br>

          </div>
            <br>
          <?php 
// notifikasi
if ($this->session->flashdata('sukses')) {
  echo '<p class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>';
  echo $this->session->flashdata('sukses');
  echo '</div>' ;
}
 ?>

<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('admin/pkl/kegiatan'),' class="form-horizontal"');
?>
  
<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>NO</th>
      <th>TANGGAL / JAM</th>
      <th>KEGIATAN</th>
      <th>ABSEN</th>
      <th>ACTION</th>
    </tr>
    </thead>
    <?php $no=1; foreach ($mahasiswa as $user ) { ?>
    <tbody>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $user->tanggal_update ?></td>
      <td><?php echo $user->kegiatan ?></td>
      <td><?php echo $user->absen ?></td>
      <td>
        <?php if ($user->absen==='mangkir' or $user->absen==='izin'): ?>
          
          <a href="<?php echo base_url('pembimbing/mahasiswa/hadir/'. $user->id_kegiatan) ?>" class="btn btn-success "><i class="fa fa-check"></i>Hadir</a>
        <?php endif ?>

        <?php if ($user->absen==='mangkir' or $user->absen==='hadir'): ?>          
          <a href="<?php echo base_url('pembimbing/mahasiswa/izin/'. $user->id_kegiatan) ?>" class="btn btn-warning "><i class="fa fa-check"></i>Izin</a>
        <?php endif ?>

        <?php if ($user->absen==='hadir' or $user->absen==='izin'): ?>          
          <a href="<?php echo base_url('pembimbing/mahasiswa/mangkir/'. $user->id_kegiatan) ?>" class="btn btn-danger"><i class="fa fa-close"></i>Mangkir</a>
        <?php endif ?>

       </td>
    </tr>
  </tbody>
<?php } ?>
</table>
</section>

<?php echo form_close(); ?> 
        </div>
      </div>
    </div>
  </div>
</main>

