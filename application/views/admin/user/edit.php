<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('admin/user/edit/'. $user->id_user),' class="form-horizontal"');
?>
<div class="form-group">
  <label class="col-md-2 control-label">Email</label>
  <div class="col-md-5">
    <input type="email" class="form-control" placeholder="Email Pengguna" name="email" value="<?php echo $user->email ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">No Induk</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Username" name="no_induk" value="<?php echo $user->no_induk ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Password</label>
  <div class="col-md-5">
    <input type="password" class="form-control" name="password" placeholder="Password" value="">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Level Akses</label>
  <div class="col-md-2">
   <select name="akses_level" class="form-control">
    <option value="dosen">Dosen</option>
    <option value="pembimbing_lapangan">Pembimbing Lapangan</option>
    <option value="prodi">Prodi</option>
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