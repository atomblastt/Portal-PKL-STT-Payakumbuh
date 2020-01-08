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
      <th>DOSEN PEMBIMBING</th>
      <th>TENTUKAN PEMBIMBING</th>
    </tr>
    </thead>
    <?php $no=1; foreach ($user as $user ) { ?>
    <tbody>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $user->no_induk ?></td>
      <td><?php echo $user->nama_mahasiswa ?></td>
      <td>
        <?php echo $user->nama_dosen ?>
        </td>
      <td>
        <a href="<?php echo base_url('admin/bimbingan/pilih_pembimbing/'. $user->id_mahasiswa) ?>" class="btn btn-warning"><i class="fa fa-check"></i> Pilih Dosen Pembimbing</a>
       </td>
    </tr>
  </tbody>
<?php } ?>

</table>
</section>

<div class="form-group">
</div>

<?php echo form_close(); ?>