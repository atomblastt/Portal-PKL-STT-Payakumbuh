<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script media="print"></script>
	<style>
			.tengah{
				text-align:center;
			}
			.kiri{
				text-align:left;
			}
			.kanan{
				text-align:right;
			}
		</style>
</head>
<body onload="print()">
	<center>
	<h2>CATATAN HARIAN</h2>
	<H2>PRAKTEK KERJA LAPANGAN</H2>
	<h2>STT-PAYAKUMBUH</h2>
	</center>
	<table>
    <tbody>
    			
        <tr>
            <td>Nama </td>
            <td>:</td>
            <td><b><?php echo $user->nama_mahasiswa ?></b></td>
        </tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
         <tr>
            <td>NPM</td>
            <td>:</td>
            <td><b><?php echo $user->no_induk ?></b></td>
        </tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
         <tr>
            <td>Program Studi</td>
            <td>:</td>
            <td><b>Teknik Komputer</b></td>
        </tr>
         <th>&nbsp;</th>
        <th>&nbsp;</th>
         <tr>
            <td>Tempat PKL</td>
            <td>:</td>
            <td><b><?php echo $pkl->nama_tempat ?></b></td>
        </tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
         <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><b><?php echo $pkl->lokasi ?></b></td>
        </tr>
    </tbody>
</table>
<br>
<br>
 <table border="1" rules="all" height="200">
 	<thead>
 		<tr>
 			<th width="300">No</th>
 			<th width="500">Jam Tanggal</th>
 			<th width="300">Uraian Kegiatan</th>
 			<th width="300">Absen</th>
 			<th width="300">Paraf</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $no=1; foreach ($kegiatan as $i ) { ?>
 		<tr>
 			<td align="center"><?php echo $no++ ?></td>
 			<td align="center"><?php echo $i->tanggal_update ?></td>
 			<td align="center"><?php echo ucfirst($i->kegiatan) ?></td>
 			<td align="center"><?php echo ucfirst($i->absen) ?></td>
 			<td></td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>
<br>
<p class="kiri">*)Di paraf oleh pembimbing lapangan</p>
<br>
<p class="kanan">Mengetahui</p>
<p class="kanan">Pembimbing Lapangan</p></p>
<br>
<br>
<br>
<br>
<p class="kanan	">(.........................................)</p>

</body>
</html>