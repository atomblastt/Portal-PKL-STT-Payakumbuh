<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('home/pkl/edit_kegiatan/'. $user->id_kegiatan),' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Kegiatan</label>
  <div class="col-md-5">
    <textarea type="text" class="form-control" placeholder="Kegiatan..." name="kegiatan" required ><?php echo $user->kegiatan ?></textarea>
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