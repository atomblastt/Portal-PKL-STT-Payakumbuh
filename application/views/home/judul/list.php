<div class="box box-danger">
	<div class="box-header with-border">
		<?php if (empty($judul->judul)): ?>
		<h1><label>Judul belum di ajukan atau ditolak</label></h1>
	</div>
		<div class="box-body">
		<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('home/judul/tambah'),' class="form-horizontal"');
?>

<p><h2 align="center">Ajukan Judul</h2></p>
<br>
<div class="form-group">
  <label class="col-md-2 control-label">Judul :</label>
  <div class="col-md-8">
	<textarea name="judul" class="col-md-6"><?php echo set_value('judul') ?></textarea>
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
		</div>
</div>
		<?php else: ?>
		<h2><label>Judul yang di ajukan : </label><p><i> <?php echo ucfirst($judul->judul) ?></i></p></h2>
			<?php if ($user->status_judul === ''): ?>
		<font color="red">Status : Sedang ditinjau dosen pembimbing</font>
			<?php else: ?>
		<font color="blue">Status : Sudah di terima dosen pembimbing, silahkan lanjutkan ke form bimbingan</font>
			<?php endif ?>
		<?php endif ?>

