
<?php if ($mahasiswa->status_judul==='' ): ?>
	<div class="box box-info">
	<div class="box-header with-border">
		<h1>Judul Yang di ajukan <?php echo ucfirst($mahasiswa->nama_mahasiswa) ?>:<p>
			<?php if (!$judul): ?>
			<?php else: ?>
				<br>
			<font color="blue">"<?php echo ucfirst($judul->judul) ?>"</font>
			<?php endif ?>

			</p></h1>
			<br>
		<a href="<?php echo base_url('dosen/bimbingan/judul_acc/'.$mahasiswa->id_mahasiswa) ?>" class="btn btn-success btn-lg"><i class="fa fa-check" onclick="return confirm('Yaking Ingin Menyetujui Judul ?')"></i> ACC</a>
		<a href="<?php echo base_url('dosen/bimbingan/judul_tolak/'.$mahasiswa->id_mahasiswa) ?>" class="btn btn-danger btn-lg"><i class="fa fa-close"></i> Tolak Judul</a>
	</div>
	<div class="box-body">
		<?php else: ?>

<div class="col-md-8">
<div class="box box-info">
	<div class="box-header with-border">
		<table>
    <tbody>	
        <tr>
            <td width="200"><h4>Mahasiswa Bimbingan</h4></td>
            <td>:</td>
            <td><b><h4>&nbsp;<?php echo ucfirst($mahasiswa->nama_mahasiswa) ?></h4></b></td>
        </tr>
         <tr>
            <td><h4>Judul</h4></td>
            <td>:</td>
            <td><b><h4>&nbsp;<?php echo ucfirst($judul->judul) ?></h4></b></td>
        </tr>
    </tbody>
</table>
		<?php if (empty($sidang->status_sidang)): ?>
		<a href="<?php echo base_url('dosen/bimbingan/batal_judul/'.$mahasiswa->id_mahasiswa) ?>" class="btn btn-danger btn-lg"><i class="fa fa-close"></i> Batalkan Judul PKL</a>
		<?php else: ?>
		<?php endif ?>
	</div>
</div>
</div>

			<div class="col-md-4">
					<?php if (empty($sidang->status_sidang)): ?>
			<div class="box box-danger">
				<div class="box-header with-border">
					<h4><font color="red">Mahasiswa Bimbingan Belum ACC Sidang !</font></h4>
				</div>
			</div>
					<?php else: ?>
			<div class="box box-danger">
				<div class="box-header with-border">
					<h4><i class="fa fa-exclamation-triangle"></i> Mahasiswa telah di ACC sidang</h4>
				</div>
			</div>
					<?php endif ?>
			</div>

	<div class="row">

	<div class="col-md-12">
		<div class="box box-info">
			<div class="">
		<p>
		
			<h2 align="center">Data bimbingan <?php echo ucfirst($mahasiswa->nama_mahasiswa) ?></h2>
		</p>
	</div>
	<div class="box-body">
	<div class="col-md-6">
 <table class="table table-bordered">
 	<caption><b>Mahasiswa</b></caption>
 	<thead>
 		<tr  style="background-color: #48D1CC">
 			<th>NO</th>
 			<th>CAPTION MAHASISWA</th>
 			<th>TANGGAL KIRIM</th>
 			<th>KOMENTAR</th>
 			
 		</tr>
 	</thead>
 	<tbody>
 			<?php $no=1; foreach ($bimbingan_mhs as $b) { ?>
 		<tr>
 			<td><?php echo $no++ ?></td>
 			<td><?php echo $b->komentar_mhs ?> <br><a href="<?php echo base_url('dosen/bimbingan/download/'.$b->id_bm_mhs) ?>" class="btn btn-warning btn-xs"><i class="fa fa-download"></i> Unduh</a></td>
 			<td><?php echo $b->update_mhs ?></td>
 			<td>

 				<?php if ($b->id_bm_dsn == ''): ?>
 				<a href="#" data-toggle="modal" data-target="#Modal_Tambah<?php echo $b->id_bm_mhs ?>" id="textkedip" type="button" class="btn btn-danger btn-md" align="center"><span class="fa fa-reply"></span> Balasan</a>
 				<?php else: ?>
 					Sudah Di komenatari
 				<?php endif ?>
 			</td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>
	</div>

	<div class="col-md-6">
 <table class="table table-bordered" >
 	<caption><b>Dosen</b></caption>
 	<thead>
 		<tr style="background-color: gold">
 			<th>NO</th>
 			<th>CAPTION MAHASISWA</th>
 			<th>TANGGAL KIRIM</th>
 			
 		</tr>
 	</thead>
 	<tbody>
 		<tr>
 			<?php $no=1; foreach ($bimbingan_dsn as $b) { ?>
 			<td><?php echo $no++ ?></td>
 			<td><?php echo $b->komentar_dsn ?></td>
 			<td><?php echo $b->update_dsn ?></td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>
	</div>
			<?php foreach ($total_sidang as $total_sidang) { ?>
		<?php if (empty($sidang->status_sidang)): ?>
		<?php if ($total_sidang >5): ?>
			<a href="<?php echo base_url('dosen/bimbingan/acc/'.$mahasiswa->id_mahasiswa) ?>" class="btn btn-success btn-lg"><i class="fa fa-check"></i> ACC Sidang</a>
		<?php endif ?>
		<?php endif ?>
		<?php } ?>
	</div>	
</div>
	</div>
		</div>
</div>
<?php endif ?>

<!-- MODAL ADD -->
			<?php foreach ($bimbingan_mhs as $b) { ?>

           <div id="Modal_Tambah<?php echo $b->id_bm_mhs ?>" class="modal fade">
            <div class="modal-dialog">
            <!--<form action="<?php //echo site_url('home/bimbingan/tambah'); ?>" method="post" enctype="multipart/form-data"> -->
            	<?php echo form_open_multipart('dosen/bimbingan/tambah/'.$b->id_bm_mhs); ?>
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tabelnyaModalLabel"><b>Input file Bimbingan</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                  <div class="form-group row">
					  <label class="col-md-2 control-label">Uplaod File</label>
					  <div class="col-md-5">
					    <input type="file" name="file_bm_dsn" class="form-control">
					  </div>
					</div>
                  
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">komentar</label>
                            <div class="col-md-10">
                              <textarea type="text" name="komentar_dsn"  class="form-control" placeholder="Komentar"></textarea>
                            
                  </div>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
                    <button  type="submit" id="btn_save" class="btn btn-success"> Simpan</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
            </form>
        <?php } ?>
        <!--END MODAL ADD-->


