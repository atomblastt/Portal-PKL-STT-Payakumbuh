<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('admin/sidang/penguji/'. $sidang->id_mahasiswa),' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Jadwal Sidang</label>
  <div class="col-md-2">
    <input type="date" class="form-control" placeholder="Nama Pengguna" name="jadwal_sidang" value="<?php echo $sidang->jadwal_sidang ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Penguji 1</label>
  <div class="col-md-2">
   <select name="id_penguji_1" class="form-control">
    <?php foreach ($dosen as $i => $u) { ?>
    <option value="<?php echo $u->id_dosen ?>"><?php echo $u->nama_dosen ?></option>
    <?php } ?>
   </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Penguji 2</label>
  <div class="col-md-2">
   <select name="id_penguji_2" class="form-control">
    <?php foreach ($dosen as $i => $u) { ?>
    <option value="<?php echo $u->id_dosen ?>"><?php echo $u->nama_dosen ?></option>
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