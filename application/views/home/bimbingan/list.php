
<div class="row">
	<div class="col-md-6">
		
<div class="box box-info">
	<div class="box-body">
		<div class="callout callout-info">
		<h3><label>Mahasiswa</label></h3>
	</div>
	<hr>

	<p>
		<a href="#" data-target="#Modal_Tambah" id="modal" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#Modal_Tambah" align="center"><span class="fa fa-plus"></span>Tambah</a>
		<a href="<?php echo base_url('cetak/cetak/bimbingan/'.$id_dosen->id_mahasiswa) ?>" class="btn btn-success btn-lg"><i class="fa fa-print"></i> Cetak Kartu Bimbingan</a>
	</p>
	
 <table class="table table-bordered" id="example1">
 	<thead>
 		<tr>
 			<th>NO</th>
 			<th>CAPTION</th>
 			<th>TANGGAL KIRIM</th>
 			<th></th>
 		</tr>
 	</thead>
 	<tbody>
 		
 		<tr>
 			
 			<?php $no=1; foreach ($bimbingan as $b) { ?>
 			<td><?php echo $no++ ?></td>
 			<td><?php echo $b->komentar_mhs ?></td>
 			<td><?php echo $b->update_mhs ?></td>
 			<td>

 			</td> 			
 		</tr>
 		<?php } ?>
 		
 	</tbody>
 </table>
	</div>	
</div>
	</div>
<!-- 
<div>
	<h2 align="center">--BALASAN--</h2>
</div> -->
<div class="col-md-6">
<div class="box box-danger">
	<div class="box-body">
		<div class="callout callout-danger">
		<h3><label>Dosen Bimbingan</label>
		</h3>
	</div>
	<hr>
	<br>

	<div class="table-responsive">
 <table class="table table-bordered" id="example1">
 	<thead>
 		<tr>
 			<th>NO</th>
 			<th>KOMENTAR DOSEN</th>
 			<th>TANGGAL KIRIM</th>
 			<th></th>
 		</tr>
 	</thead>
 	<tbody>
 		
 		<tr>
 			<?php $no=1; foreach ($bimbingan_dsn as $b) { ?>
 			<td><?php echo $no++ ?></td>
 			<td><?php echo $b->komentar_dsn ?></td>
 			<td><?php echo $b->update_dsn ?></td>
 			<td>
				<a href="<?php echo base_url('home/bimbingan/download/'.$b->id_bm_dsn) ?>" class="btn btn-success btn-xs"><i class="fa fa-unduh"></i> Unduh</a>
 			</td>
 			
 		</tr>
 		<?php } ?>
 		
 	</tbody>
 </table>
	</div>
	</div>	
</div>
</div>

</div>


<!-- MODAL ADD -->
           <div id="Modal_Tambah" class="modal fade">
            <div class="modal-dialog">
            <!--<form action="<?php //echo site_url('home/bimbingan/tambah'); ?>" method="post" enctype="multipart/form-data"> -->
            	<?php echo form_open_multipart('home/bimbingan/tambah'); ?>
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
					    <input type="file" name="file_bm_mhs" class="form-control" required="required">
					  </div>
					</div>
                  
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">komentar</label>
                            <div class="col-md-10">
                              <textarea type="text" name="komentar_mhs"  class="form-control" placeholder="Isi Kegiatan...."></textarea>
                            
                  </div>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
                    <button  type="submit" id="btn_save" class="btn btn-success"> Simpan</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL ADD-->


