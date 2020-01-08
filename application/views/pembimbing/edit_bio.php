<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('pembimbing/dasbor/edit/'. $user->id_user),' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Nama Lengkap</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Nama Lengkap " name="nama_pembimbing" value="<?php echo $user->nama_pembimbing ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Tanggal Lahir</label>
  <div class="col-md-5">
    <input type="date" class="form-control" placeholder="Tanggal lahir" name="tanggal_lahir" value="<?php echo $user->tanggal_lahir ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Tempat Lahir</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Tempat lahir" name="tempat_lahir" value="<?php echo $user->tempat_lahir ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Alamat Tinggal</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $user->alamat ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Nama Instusi</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Nama Instusi" name="instusi" value="<?php echo $user->instusi ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Agama</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Agama" name="agama" value="<?php echo $user->agama ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Kontak</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Kontak" name="no_tlp" value="<?php echo $user->no_tlp ?>" required>
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