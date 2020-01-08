<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open_multipart(base_url('admin/user/tambah_data'),' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Nama Pengguna</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Nama Pengguna" name="nama" value="<?php echo set_value('nama') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Email</label>
  <div class="col-md-5">
    <input type="email" class="form-control" placeholder="Email Pengguna" name="email" value="<?php echo set_value('email') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">NO INDUK</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Nim" name="no_induk" value="<?php echo set_value('no_induk') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Password</label>
  <div class="col-md-5">
    <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password') ?>" required>
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
  <label class="col-md-2 control-label">Tanggal Lahir</label>
  <div class="col-md-3">
    <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" value="<?php echo set_value('tanggal_lahir') ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Tempat Lahir</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" value="<?php echo set_value('tempat_lahir') ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Alamat</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo set_value('alamat') ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Agama</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Agama" name="agama" value="<?php echo set_value('agama') ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">No Telp/Hp</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="No Telp/Hp" name="no_tlp" value="<?php echo set_value('no_tlp') ?>">
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