<div class="box box-info">
	<div class="box-body">
 <table class="table table-bordered" id="example1">
 	<thead>
 		<tr>
 			<th>NO</th>
 			<th>NAMA</th>
 			<th>JUDUL</th>
 			<th>KONTAK</th>
 			<th>ACTION</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $no=1; foreach ($sidang as $mahasiswa ) { ?>
 		<tr>
 			<td><?php echo $no++ ?></td>
 			<td><?php echo $mahasiswa->nama_mahasiswa ?></td>
 			<td><?php echo $mahasiswa->judul  ?></td>
 			<td><?php echo $mahasiswa->no_tlp ?></td>
 		
 			<td>
 				
 				<a href="<?php echo base_url('dosen/sidang/mulai/'.$mahasiswa->id_mahasiswa) ?>" class="btn btn-warning"><i class="fa fa-gavel"></i> Mulai Sidang</a>	
 				
 				
 			</td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>
	</div>	
</div>
<?php if ($this->session->flashdata('sukses')) {
	echo '<p class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>';
	echo $this->session->flashdata('sukses');
	echo '</div>' ;
}
 ?>