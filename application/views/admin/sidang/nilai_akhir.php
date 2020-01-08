 <table class="table table-bordered" id="example1">
 	<thead>
 		<tr>
 			<th>NO</th>
 			<th>NAMA</th>
 			<th>NO INDUK</th>
 			<th>JUDUL</th>
 			<th>ACTION</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $no=1; foreach ($user as $user ) { ?>
 		<tr>
 			<td><?php echo $no++ ?></td>
 			<td><?php echo $user->nama_mahasiswa ?></td>
 			<td><?php echo $user->no_induk  ?></td>
 			<td><?php echo $user->judul ?></td>
 			<td>
 				<a href="<?php echo base_url('admin/nilai_akhir/nilai_mhs/'. $user->id_mahasiswa) ?>" class="btn btn-warning btn-lg"><i class="fa fa-eye"></i> Lihat Nilai</a>
 			</td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>