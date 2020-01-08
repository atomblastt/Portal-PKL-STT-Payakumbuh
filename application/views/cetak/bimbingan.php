<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script media="print"></script>
    <style>
      div#kopsurat{
        width: 100%;
      }
      div#kop {
        display: inline-block;
        position:  relative;
        width: 70%;
      }
      div.kop {
        text-align: center;
        position: absolute;
        top: 10%;
        transform: translateY(-85%);
      }
      div#logo {
        display: inline-block;
        text-align: center;
        width: 20%;
      }
      div#logo>img {
        width: 120px;
      }
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
    <div id="kopsurat">
                    <div id="logo">
                      <img src="<?php echo base_url('assets/upload/image/logo.png') ?>" >    
                    </div>
                    <div id="kop">
                      <div class="kop">
                        <h3><font size="3em">PROGRAM STUDI DIII TEKNIK KOMPUTER</font> <br>
                        <span style="font-size: 1em;">SEKOLAH TINGGI TEKNOLOGI PAYAKUMBUH</span> <br>
                        <small><b>Jalan Khatib Sulaiman Sawah Padang Telp.(0752) 7010851 Fax : (0752) 795053 Payakumbuh 25227</b></small></h3>
                        </div>
                    </div>
                  </div>
                  <hr size="1">

    <h2 align="center"><U>KARTU BIMBINGAN PRAKTEK KERJA LAPANGAN (PKL)</U></h2>
	</center>
	<table>
    <tbody>
    			
        <tr>
            <td>Nama </td>
            <td>:</td>
            <td><b><?php echo $user->nama_mahasiswa ?></b></td>
        </tr>
         <tr>
            <td>NPM</td>
            <td>:</td>
            <td><b><?php echo $user->no_induk ?></b></td>
        </tr>
         <tr>
            <td>JUDUL</td>
            <td>:</td>
            <td><b><?php echo $judul->judul ?></b></td>
        </tr>
         <tr>
            <?php foreach ($bimbingan as $i => $u) { ?>
                <?php if ($i===0): ?>
            <td>DOSEN PEMBIMBING</td>
            <td>:</td>
            <td><b><?php echo $u->nama_dosen ?></b></td>
                <?php endif ?>
         <?php } ?>
        </tr>
    </tbody>
</table>
<br>
<br>
 <table border="1" rules="all" height="200">
 	<thead>
 		<tr>
 			<th width="300">TANGGAL KONSULTASI</th>
 			<th width="500">KOMENTAR PEMBIMBING</th>
 			<th width="300">TANDA TANGAN PEMBIMBING</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php foreach ($bimbingan as $i ) { ?>
 		<tr>
 			<td align="center"><?php echo $i->update_dsn ?></td>
 			<td align="center"><?php echo $i->komentar_dsn ?></td>
 			<td></td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>
<br>
<p class="kiri"><U>K E T E N T U A N :</U></p>
<p class="kiri">Konsultasi dengan dosen pembimbing minimal 5 kali</p>
<p class="kiri">Setiap konsultasi <u>harap membawa kartu bimbingan</u></p>
<p class="kiri">Kartu yang hilang atau tidak di bawa saat bimbingan <u>tidak akan dilayani</u></p>
<p class="kiri">Jika tidak mematuhi ketentuan di atas PKL <u>DIBATALKAN</u></u></p>

</body>
</html>