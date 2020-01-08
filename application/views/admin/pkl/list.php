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
echo form_open(base_url('admin/pkl/update_status'),' class="form-horizontal"');
?>

<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>NO</th>
      <th>NIM</th>
      <th>NAMA</th>
      <th>NAMA INSTUSI / Alasan Batal Menyetujui Lokasi</th>
      <th>ALAMAT INSTUSI</th>
      <th>STATUS PKL</th>
      <th>Action Status PKL</th>
    </tr>
    </thead>
    <?php $no=1; foreach ($user as $user ) { ?>
    <tbody>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $user->no_induk ?></td>
      <td><?php echo $user->nama_mahasiswa ?></td>
      <td><?php echo $user->nama_tempat ?></td>
      <td><?php echo $user->lokasi ?></td>
      <td><?php echo ucfirst($user->status_pkl) ?></td>
      <td>
        <?php if ($user->status_pkl==='peninjauan'): ?>
          <a href="<?php echo base_url('admin/pkl/update_status_proses/'. $user->id_pkl) ?>" class="btn btn-warning"><i class="fa fa-check"></i> Proses Surat</a>
        <?php endif ?>

        <?php if ($user->status_pkl==='di proses'): ?>
          <a href="<?php echo base_url('admin/pkl/update_status/'. $user->id_pkl) ?>" class="btn btn-success "><i class="fa fa-check"></i> Setujui</a>
        <?php endif ?>

        <?php if ($user->status_pkl==='disetujui' or $user->status_pkl === 'di proses' or $user->status_pkl === 'peninjauan'): ?>
          <a href="" data-target="#Modal_Edit<?=$user->id_pkl;?>" id="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modal_Edit<?=$user->id_pkl;?>"><span class="fa fa-close">
              </span>Batal Setujui</a>
        <?php endif ?>

       </td>
    </tr>
  </tbody>
<?php } ?>
</table>
</section>



<?php echo form_close(); ?>
<!-- MODAL EDIT -->
            
            <?php foreach ($mahasiswa as $i) { ?>
           <!-- MODAL ADD -->
           <div id="Modal_Edit<?=$i->id_pkl;?>" class="modal fade">
            <div class="modal-dialog">
            <form action="<?php echo site_url('admin/pkl/batal_update_status/'.$i->id_pkl); ?>" method="post">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tabelnyaModalLabel">Alasan tidak menyetujui lokasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Alasan</label>
                            <div class="col-md-10">
                              <input type="text" name="komentar" id="komentar" class="form-control" placeholder="Beri Alasan" value="<?php echo set_value('komentar') ?>" required>
                            </div>
                        </div>
                        
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button  type="submit" id="btn_edit" class="btn btn-primary">Simpan Perubahan</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
            <?php }  ?>
        <!--END MODAL ADD-->
         
        <!--END MODAL ADD-->