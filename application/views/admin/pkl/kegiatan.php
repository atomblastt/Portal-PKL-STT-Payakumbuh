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
      <th>LAPORAN</th>
    </tr>
    </thead>
    <?php $no=1; foreach ($user as $u ) { ?>
    <tbody>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $u->no_induk ?></td>
      <td><a href="<?php echo base_url('admin/pkl/profil_kegiatan/'. $user->id_user) ?>" ><?php echo $u->nama ?></a></td>
      <td><?php echo $u->nama_tempat ?></td>
    </tr>
  </tbody>
<?php } ?>

</table>
</section>

<div class="form-group">
  <label class="col-md-2 control-label"></label>
  <div class="col-md-5">
    <button class="btn btn-success btn-lg" name="submit" type="submit">
      <i class="fa fa-save"></i>Update
    </button>
    <button class="btn btn-info btn-lg" name="reset" type="reset">
      <i class="fa fa-times"></i>Reset
    </button>
  </div>
</div>

<?php echo form_close(); ?>