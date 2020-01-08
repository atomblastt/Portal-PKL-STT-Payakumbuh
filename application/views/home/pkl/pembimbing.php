<div class="box">
	<div class="box-header with-border">
	<?php if (empty($tampil_pilih->id_pembimbing)): ?>
   <h1>Pembimbing Lapangan anda belum dipilih</h1>    
</div>
<div class="box-body">
<?php 
// notifikasi
if ($this->session->flashdata('sukses')) {
	echo '<p class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>';
	echo $this->session->flashdata('sukses');
	echo '</div>' ;
}
 ?>

 <table class="table table-bordered" id="example1">
 	<thead>
 		<tr style="background-color: yellow">
 			<th>NO</th>
 			<th>NAMA</th>
 			<th>INSTUSI</th>
 			<th>NO INDUK</th>
 			<th>ACTION</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $no=1; foreach ($pembimbing as $user ) { ?>
 		<tr>
 			<td><?php echo $no++ ?></td>
 			<td><a href="<?php echo base_url('assets/upload/image/'.$user->gambar_p_lapangan) ?>"><img src="<?php echo base_url('assets/upload/image/'.$user->gambar_p_lapangan) ?>" class="img-circle" alt="Mahasiswa Image" width="50" height="50"></a>
        	&emsp;
        	<b><?php echo $user->nama_pembimbing ?></b></td>
 			<td><?php echo $user->instusi ?></td>
 			<td><?php echo $user->no_induk ?></td>
 			<td>
 				<a href="<?php echo base_url('home/pkl/pilih_pembimbing/'.$user->id_pembimbing) ?>" class="btn btn-success" onclick="return confirm('Yaking Ingin Memilih <?php echo $user->nama_pembimbing ?> sebagai Pembibing Lapangan ?')"><i class="fa fa-check"></i> Pilih</a>
 			</td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>
</div>

 	</div>
</div>

<?php else: ?>
	<div class="box-header with-border">
	<h2>Pembimbing lapangan anda :</h2>
	</div>
	<br>
	<img src="<?php echo base_url('assets/upload/image/'.$tampil_pilih->gambar_p_lapangan) ?>" alt="Foto Pembimbing" class="col-md-3 img-circle img-fluid" width="200px" height="230px">
	<h1 class="col-md-6"><?php echo $tampil_pilih->nama_pembimbing ?></h1>
	<br>
	<br>
	  <a href="<?php echo base_url('home/pkl/batal_pilih_pembimbing/'.$tampil_pilih->id_user) ?>" class="col-md-4 btn btn-danger btn-lg" onclick="return confirm('Yaking Ingin membatalkan <?php echo $tampil_pilih->nama_pembimbing ?> sebagai Pembibing Lapangan ?')"><i class="fa fa-close"></i> Batal</a>
<?php endif ?>
