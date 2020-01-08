<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
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
                  <h2 style="text-align: center;"><u><font style="font-family: Times New Roman, Times, serif; font-size: 15px;">DAFTAR MAHASISWA PRAKTEK KERJA LAPANGAN</font></u></h2>
<br>

<table border="1" rules="all" cellpadding=10 cellspacing=15>
    <thead>
    <tr>
      <th>NO</th>
      <th>NIM</th>
      <th>NAMA</th>
      <th>NAMA INSTUSI</th>
      <th>ALAMAT INSTUSI</th>
      <th>STATUS PKL</th>
    </tr>
    </thead>
    <?php $no=1; foreach ($user as $user ) { ?>
    <tbody>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $user->no_induk ?></td>
      <td><?php echo $user->nama_mahasiswa ?></td>
      <td><?php echo $user->nama_tempat ?></td>
      <td><?php echo $user->lokasi ?></td>
      <td><?php echo $user->status_pkl ?></td>
    </tr>
  </tbody>
<?php } ?>
</table>

<p class="kanan"><b><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">Payakumbuh, <?php echo date('d F Y'); ?>&emsp;&emsp;</font></b></p>
<p class="kanan"><b><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">Ketua Prodi Teknik Komputer&emsp;&emsp;</font></b></p>
<br><br><br><br>
<p class="kanan"><b><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">(......................................................)&emsp;&emsp;</font></b></p>
</body>
</html>