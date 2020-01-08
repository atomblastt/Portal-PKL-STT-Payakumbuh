<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('home/pkl/tambah'),' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Nama Instusi</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Nama Lengkap Instusi" name="nama_tempat" value="<?php echo set_value('nama_tempat') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Lokasi PKL</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Lokasi Lengkap" name="lokasi" value="<?php echo set_value('lokasi') ?>" required>
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