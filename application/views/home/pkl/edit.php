<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
if ($user->status_pkl == 'peninjauan') {
echo form_open(base_url('home/pkl/edit/'. $user->id_user),' class="form-horizontal"');
}

if ($user->status_pkl == 'di tolak') {
echo form_open(base_url('home/pkl/edit_tolak/'. $user->id_pkl),' class="form-horizontal"');
}
?>

<div class="form-group">
  <label class="col-md-2 control-label">Nama Instusi</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Nama Lengkap Instusi" name="nama_tempat"  required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Lokasi PKL</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Lokasi Lengkap" name="lokasi" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Tambah teman PKL</label>
  <div class="col-md-2">

    <?php $i = 1 ?>
    <?php foreach ($data_user as $d) { ?>
      <div class="checkbox">
        <label><input type="checkbox" value="<?php echo $d->id_user ?>" name="teman[]"><?php echo $d->nama_mahasiswa ?></label>
      </div>
      <?php $i++; ?>
    <?php } ?>
   </select>
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