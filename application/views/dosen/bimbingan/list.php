<div class="box box-info">
	<div class="box-body">
 <table class="table table-bordered" id="example1">
 	<thead>
 		<tr>
 			<th>NO</th>
 			<th>NAMA</th>
 			<th>PRODI</th>
 			<th>KONTAK</th>
 			<th>ACTION</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $no=1; foreach ($mahasiswa as $mahasiswa ) { ?>
 		<tr>
 			<td><?php echo $no++ ?></td>
 			<td><a href="<?php echo base_url('assets/upload/image/'.$mahasiswa->gambar_mahasiswa) ?>"><img src="<?php echo base_url('assets/upload/image/'.$mahasiswa->gambar_mahasiswa) ?>" class="img-circle" alt="Mahasiswa Image" width="50" height="50"></a>
        &emsp;
        <b><?php echo $mahasiswa->nama_mahasiswa ?></b></td>
 			<td><?php echo $mahasiswa->prodi  ?></td>
 			<td><?php echo $mahasiswa->no_tlp ?></td>
 		
 			<td>
 				<a href="<?php echo base_url('dosen/bimbingan/detail/'.$mahasiswa->id_mahasiswa) ?>" class="btn btn-info"><i class="fa fa-eye"></i> Detail Bimbingan</a>
 			</td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>
	</div>	
</div>