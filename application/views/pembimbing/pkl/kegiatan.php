<main role="main">
  <div class="row">
    <div class="col-md-4">
      <div class="box box-success">
        <div class="box-header">  
          <h2><b><?php echo $user->nama; ?></b></h2>
          <h3 ><?php echo $user->no_induk; ?></h3>
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
    <?php $no=1; foreach ($kegiatan as $user ) { ?>
    <tbody>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $user->tanggal_update ?></td>
      <td><?php echo $user->kegiatan ?></td>
      <td><?php echo $user->absen ?></td>
      <td>
          <a href="<?php echo base_url('home/pkl/edit_kegiatan/'. $user->id_kegiatan) ?>" class="btn btn-warning btn-sm"><i class="fa fa-check"></i>edit</a>

          <a href="<?php echo base_url('home/pkl/hapus_kegiatan/'. $user->id_kegiatan) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yaking Ingin Menghapus Data ?')"><i class="fa fa-trash-o"></i>Hapus</a>
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

<!-- MODAL ADD -->
           <div id="Modal_Tambah" class="modal fade">
            <div class="modal-dialog">
            <form action="<?php echo site_url('home/pkl/tambah_kegiatan'); ?>" method="post">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tabelnyaModalLabel"><b>MASUKAN KEGIATAN</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Kegiatan</label>
                            <div class="col-md-10">
                              <textarea type="text" name="kegiatan" id="kegiatan" class="form-control" placeholder="Isi Kegiatan...."></textarea>
                                      
                  </div>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
                    <button  type="submit" id="btn_save" class="btn btn-success"> Simpan</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL ADD-->


