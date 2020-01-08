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
	<h2><u>FORMULIR</u></h2>
	<br>
	<h2>PERMOHONAN SURAT PENGANTAR</h2>
	<H2>PRAKTEK KERJA LAPANGAN (PKL)</H2>
	</center>
	
	<br>

	<table>
    <tbody>
    	<?php foreach ($surat_permohonan as $i => $u) { ?>
    		<?php if ($i===0): ?>
    			
        <tr>
            <td>Nama Instusi / Perusahaan</td>
            <td>:</td>
            <td><b><?php echo $u->nama_tempat ?></b></td>
        </tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
         <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><b><?php echo $u->lokasi ?></b></td>
        </tr>
    		<?php endif ?>
    	<?php } ?>
    </tbody>
</table>
<br>
<br>
<center><b>Data Mahasiswa yang akan melaksanakan PKL</b></center>
<br>
 <table border="1" rules="all" height="200">
 	<thead>
 		<tr>
 			<th width="300">No</th>
 			<th width="500">Nama</th>
 			<th width="300">NPM</th>
 			<th width="300">No.HP</th>
 			<th width="300">Tanda Tangan</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $no=1; foreach ($surat_permohonan as $i ) { ?>
 		<tr>
 			<td align="center"><?php echo $no++ ?></td>
 			<td align="center"><?php echo $i->nama_mahasiswa ?></td>
 			<td align="center"><?php echo $i->no_induk ?></td>
 			<td align="center"><?php echo $i->no_tlp ?></td>
 			<td></td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>
<br>
<p class="kanan">Payakumbuh................................,</p>
<br>
<br>
<br>
<p class="kiri">Mengetahui</p>
<p class="kiri">Ketua/Sekretaris Prodi</p>
<p class="kiri">Teknik Komputer &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Mahasiswa yang mengajukan</p>
<br>
<br>
<br>
<br>
<p class="kiri">(.........................................) &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(.........................................)</p>

</body>
</html>