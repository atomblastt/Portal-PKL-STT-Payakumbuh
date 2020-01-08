<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('admin/bimbingan/pilih_pembimbing/'. $user->id_mahasiswa),' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Daftar Dosen</label>
  <div class="col-md-5">
   <select name="id_dosen" class="form-control">
    <?php foreach ($daftar_dosen as $i) { ?>
    <option value="<?php echo $i->id_dosen ?>"><?php echo $i->nama_dosen ?></option>
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
    <a href="<?php echo base_url('admin/user') ?>" class="btn btn-danger btn-lg" >Batal</a>
  </div>
</div>

<?php echo form_close(); ?>