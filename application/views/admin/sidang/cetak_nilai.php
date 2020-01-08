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

                  <h2 style="text-align: center;"><u><font style="font-family: Times New Roman, Times, serif; font-size: 15px;">BERITA ACARA SIDANG LAPORAN PKL PROGRAM STUDI TEKNIK KOMPUTER</font></u></h2>
                  
                  <p align="center"><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">Pada Tanggal <b><?php echo date('d F Y',strtotime($penguji2->jadwal_sidang)); ?></b> telah dilakukan Ujian Praktek Kerja Lapangan Mahasiswa Berikut :</font></p>

                </center>

                 <!-- <br> -->
                <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font style="font-family: Times New Roman, Times, serif; font-size: 19px;">Nama &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;: <?php echo $mahasiswa->nama_mahasiswa ?></font></p>
                <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font style="font-family: Times New Roman, Times, serif; font-size: 19px;">NPM &emsp;&emsp;&emsp;&emsp;&emsp;&ensp; : <?php echo $mahasiswa->no_induk ?></font></p>
                <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font style="font-family: Times New Roman, Times, serif; font-size: 19px;">Judul Laporan PKL : </font></p>

              <div align="center">
                
              <table border="1" rules="all">
                <thead>
                  <tr>
                    <td><b><h3>&emsp;&emsp;<?php echo $mahasiswa->judul ?>&emsp;&emsp;</h3></b></td>
                  </tr>
                </thead>
              </table>
              </div>
              
                <br>
                <p>&emsp;&emsp;<font style="font-family: Times New Roman, Times, serif; font-size: 19px;">Dengan hasil keputusan tim penguji bahwa mahasiswa di atas : </font></p>
                <?php $nilai_semua = ($nilai[0]->n5 + $nilai[1]->n5 + $nilai_pkl->nilai_lapangan) / 3 ?>
                <table>
                  <tbody>
                      <tr>
                          <td><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">&emsp;&emsp;Dinyatakan &emsp; </font></td>
                          <td><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">:</font></td>
                          <td><b><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">&emsp;
                                              <?php if ($nilai_semua >= 80 ): ?>
                                                LULUS
                                              <?php elseif ($nilai_semua >= 65) : ?>
                                                LULUS
                                              <?php else: ?>
                                                TIDAK LULUS
                                              <?php endif ?>
                          </font></b></td>
                      </tr>

                      <tr>
                          <td><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">&emsp;&emsp;Dengan Nilai &emsp; </font></td>
                          <td><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">:</font></td>
                          <td><b><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">&emsp;<?php echo number_format($nilai_semua,2) ?>
                                              &ensp;,&ensp;(                                        
                                              <?php if ($nilai_semua >= 80 ): ?>
                                                A
                                              <?php elseif ($nilai_semua >= 65) : ?>
                                                B
                                              <?php elseif ($nilai_semua >= 55) : ?>
                                                C
                                              <?php elseif ($nilai_semua >= 50) : ?>
                                                D
                                              <?php else: ?>
                                                E
                                              <?php endif ?>
                          </font></b></td>
                      </tr>

                      <tr>
                          <td><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">&emsp;&emsp;Laporan PKL &emsp; </font></td>
                          <td><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">:</font></td>
                          <td><b><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">&emsp;Diperbaiki / <span style="text-decoration:line-through"> Tidak diperbaiki </span>
                          </font></b></td>
                      </tr>
                  </tbody>
              </table>
              <br>
              <p class="kanan"><b><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">Payakumbuh, <?php echo date('d F Y',strtotime($penguji2->jadwal_sidang)); ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</font></b></p>
              <br>
              <p class="tengah"><b><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">TIM PENGUJI</font></b></p>
              <br>
              <p class="tengah"><b><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">PENGUJI 1&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;PENGUJI 2</font></b></p>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>              
              <p class="tengah"><b><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">(<?php echo $nilai[0]->nama_dosen ?>)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;(<?php echo $nilai[1]->nama_dosen ?>)</font></b></p>
	

		<div id="kopsurat">
                    <div id="logo">
                      <img src="<?php echo base_url('assets/upload/image/logo.png') ?>" >    
                    </div>
                    <div id="kop">
                      <div class="kop">
                        <h3><font size="3em">PROGRAM STUDI DIII TEKNIK KOMPUTER</font> <br>
                        <span style="font-size: 1em">SEKOLAH TINGGI TEKNOLOGI PAYAKUMBUH</span> <br>
                        <small><b>Jalan Khatib Sulaiman Sawah Padang Telp.(0752) 7010851 Fax : (0752) 795053 Payakumbuh 25227</b></small></h3>
                        </div>
                    </div>
                  </div>
                  <hr size="1">

                  <h2 style="text-align: center;"><u><font style="font-family: Times New Roman, Times, serif; font-size: 15px;">REKAPITULASI NILAI AKHIR PRAKTEK KERJA LAPANGAN</font></u></h2>

                    </center>

                 <!-- <br> -->
                <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font style="font-family: Times New Roman, Times, serif; font-size: 19px;">Nama &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;: <?php echo $mahasiswa->nama_mahasiswa ?></font></p>
                <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font style="font-family: Times New Roman, Times, serif; font-size: 19px;">NPM &emsp;&emsp;&emsp;&emsp;&emsp;&ensp; : <?php echo $mahasiswa->no_induk ?></font></p>
                <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font style="font-family: Times New Roman, Times, serif; font-size: 19px;">Judul Laporan PKL : </font></p>

              <div align="center">
                
              <table border="1" rules="all">
                <thead>
                  <tr>
                    <td><b><h3>&emsp;&emsp;<?php echo $mahasiswa->judul ?>&emsp;&emsp;</h3></b></td>
                  </tr>
                </thead>
              </table>
              </div>

                
                <br>
                <br>
              <?php $nilai_semua = ($nilai[0]->n5 + $nilai[1]->n5 + $nilai_pkl->nilai_lapangan) / 3 ?>
                <div align="center">
                  
              <table border="1" rules="all">
                  <thead width="450" bgcolor="yellow">
                  <tr width="200" height="30">
                    <th>&emsp;&emsp;&emsp;&emsp;MATERI PENILAIAN&emsp;&emsp;</th>
                    <th>&emsp;&emsp;NILAI (1 - 100)&emsp;&emsp;</th>
                  </tr>
                  </thead>
                  <tbody align="left">
                  <tr width="200" height="30">
                    <td>&emsp;&emsp;<B>NILAI PENGUJI 1</B></td>
                    <td align="center">
                      <?php echo $penguji1->n5 ?>
                    </td>
                  </tr>

                  <tr width="200" height="30">
                    <td>&emsp;&emsp;<B>NILAI PENGUJI 2</B></td>
                    <td align="center">
                      <?php echo $penguji2->n5 ?>
                    </td>
                  </tr>
                  <tr width="200" height="30">
                    <td>&emsp;&emsp;<B>NILAI PEMBIMIBING LAPANGAN</B></td>
                    <td align="center">
                      <?php echo $nilai_pkl->nilai_lapangan ?>
                    </td>
                  </tr>
                  <tr width="200" height="30">
                    <td>&emsp;&emsp;<B>TOTAL NILAI</B></td>
                    <td align="center">
                      <?php echo $nilai[0]->n5 + $nilai[1]->n5 + $nilai_pkl->nilai_lapangan ?>
                    </td>
                  </tr>
                  <tr width="200" height="30">
                    <td>&emsp;&emsp;<b>NILAI RATA RATA</b></td>
                    <td align="center">
                      <?php echo number_format($nilai_semua,2) ?>
                    </td>
                  </tr>
                      <tr >
                    <td>&emsp;&emsp;<b>
                      NILAI HURUF
                    </b></td>
                    <td align="center">
                      <?php if ($nilai_semua >= 80 ): ?>
                        <h3><b>A</b></h3>
                      <?php elseif ($nilai_semua >= 65) : ?>
                        <h3><b>B</b></h3>
                      <?php elseif ($nilai_semua >= 55) : ?>
                        <h3><b>C</b></h3>
                      <?php elseif ($nilai_semua >= 50) : ?>
                        <h3><b>D</b></h3>
                      <?php else: ?>
                        <h3><b>E</b></h3>
                      <?php endif ?>
                    </td>
                  </tr>
                </tbody>
              </table>
                </div>
                <p class="kanan"><b><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">Payakumbuh, <?php echo date('d F Y',strtotime($penguji2->jadwal_sidang)); ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</font></b></p>
              <br>
              <p class="tengah"><b>TIM PENGUJI</b></p>
              <br>
              <p class="tengah"><b>PENGUJI 1&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;PENGUJI 2</b></p>
              <br>
              <br>
              <br>
              <br>
              <p class="tengah"><b>(<?php echo $nilai[0]->nama_dosen ?>)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(<?php echo $nilai[1]->nama_dosen ?>)</b></p>

	<div id="kopsurat">
                    <div id="logo">
                      <img src="<?php echo base_url('assets/upload/image/logo.png') ?>" >    
                    </div>
                    <div id="kop">
                      <div class="kop">
                        <h3><font size="3em">PROGRAM STUDI DIII TEKNIK KOMPUTER</font> <br>
                        <span style="font-size: 1em">SEKOLAH TINGGI TEKNOLOGI PAYAKUMBUH</span> <br>
                        <small><b>Jalan Khatib Sulaiman Sawah Padang Telp.(0752) 7010851 Fax : (0752) 795053 Payakumbuh 25227</b></small></h3>
                        </div>
                    </div>
                  </div>
                  <hr size="1">

                  <h2 style="text-align: center;"><u><font style="font-family: Times New Roman, Times, serif; font-size: 15px;">DAFTAR PENILAIAN SIDANG LAPORAN PRAKTEK KERJA LAPANGAN</font></u></h2>

                    </center>

                 <!-- <br> -->
                <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font style="font-family: Times New Roman, Times, serif; font-size: 19px;">Nama &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;: <?php echo $mahasiswa->nama_mahasiswa ?></font></p>
                <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font style="font-family: Times New Roman, Times, serif; font-size: 19px;">NPM &emsp;&emsp;&emsp;&emsp;&emsp;&ensp; : <?php echo $mahasiswa->no_induk ?></font></p>

              <center>
                <table  width="500px" border="1" rules="all">
                  <thead width="450" bgcolor="yellow">
                  <tr width="300" height="40">
                    <th align="center">&emsp;&emsp;&emsp;&emsp;MATERI PENILAIAN&emsp;&emsp;</th>
                    <th>&emsp;&emsp;NILAI&emsp;&emsp;</th>
                  </tr>
                  </thead>
                  <tbody >
                  <tr>
                    <td  width="300" height="40">&emsp;&emsp;Penampilan</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;
                      <?php echo $penguji1->n1 ?>
                    </td>
                  </tr>

                  <tr>
                    <td width="300" height="40">&emsp;&emsp;Penguasaan Laporan PKL</td>
                   
                    <td>&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;
                      <?php echo $penguji1->n2 ?>
                    </td>
                  </tr>

                  <tr>
                    <td width="300" height="40">&emsp;&emsp;Hasil</td>
                 
                    <td>&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;
                      <?php echo $penguji1->n3 ?>
                    </td>
                  </tr>

                  <tr>
                    <td width="300" height="40">&emsp;&emsp;Penulisan Laporan PKL</td>
                    
                    <td>&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;
                      <?php echo $penguji1->n4 ?>
                    </td>
                  </tr>

                  <tr width="10">
                    <td width="300" height="40" align="center"><b>TOTAL</b></td>

                    <td>&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;
                      <?php echo $penguji1->n5 ?>
                    </td>
                  </tr>
                </tbody>
              </table>
              </center>
              <br>
              <br>
              <br>
              <p class="tengah"><b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Payakumbuh <?php echo date('d F Y',strtotime($penguji1->jadwal_sidang)); ?><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;Penguji <?php echo $penguji1->penguji ?></b></p>
              <br>
              <br>
              <br>
              <br>
              <p class="tengah"><b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(<?php echo $penguji1->nama_dosen ?>)</b></p>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
    <div id="kopsurat">
                    <div id="logo">
                      <img src="<?php echo base_url('assets/upload/image/logo.png') ?>" >    
                    </div>
                    <div id="kop">
                      <div class="kop">
                        <h3><font size="3em">PROGRAM STUDI DIII TEKNIK KOMPUTER</font> <br>
                        <span style="font-size: 1em">SEKOLAH TINGGI TEKNOLOGI PAYAKUMBUH</span> <br>
                        <small><b>Jalan Khatib Sulaiman Sawah Padang Telp.(0752) 7010851 Fax : (0752) 795053 Payakumbuh 25227</b></small></h3>
                        </div>
                    </div>
                  </div>
                  <hr size="1">

                  <h2 style="text-align: center;"><u><font style="font-family: Times New Roman, Times, serif; font-size: 15px;">DAFTAR PENILAIAN SIDANG LAPORAN PRAKTEK KERJA LAPANGAN</font></u></h2>

                    </center>

                 <!-- <br> -->
                <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font style="font-family: Times New Roman, Times, serif; font-size: 19px;">Nama &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;: <?php echo $mahasiswa->nama_mahasiswa ?></font></p>
                <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font style="font-family: Times New Roman, Times, serif; font-size: 19px;">NPM &emsp;&emsp;&emsp;&emsp;&emsp;&ensp; : <?php echo $mahasiswa->no_induk ?></font></p>   

                 <center>
                  <table  width="500px" border="1" rules="all">
                    <thead width="450" border="2" bgcolor="yellow">
                    <tr width="300" height="40">
                      <th align="center">&emsp;&emsp;&emsp;&emsp;MATERI PENILAIAN&emsp;&emsp;</th>
                      <th>&emsp;&emsp;NILAI&emsp;&emsp;</th>
                    </tr>
                    </thead>
                    <tbody >
                    <tr>
                      <td  width="300" height="40">&emsp;&emsp;Penampilan</td>
                      <td>&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;
                        <?php echo $penguji2->n1 ?>
                      </td>
                    </tr>

                    <tr>
                      <td width="300" height="40">&emsp;&emsp;Penguasaan Laporan PKL</td>
                     
                      <td>&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;
                        <?php echo $penguji2->n2 ?>
                      </td>
                    </tr>

                    <tr>
                      <td width="300" height="40">&emsp;&emsp;Hasil</td>
                   
                      <td>&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;
                        <?php echo $penguji2->n3 ?>
                      </td>
                    </tr>

                    <tr>
                      <td width="300" height="40">&emsp;&emsp;Penulisan Laporan PKL</td>
                      
                      <td>&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;
                        <?php echo $penguji2->n4 ?>
                      </td>
                    </tr>

                    <tr width="10">
                      <td width="300" height="40" align="center"><b>TOTAL</b></td>

                      <td>&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;
                        <?php echo $penguji2->n5 ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
                </center>
                <br>
                <br>
                <br>
                <p class="tengah"><b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Payakumbuh <?php echo date('d F Y',strtotime($penguji2->jadwal_sidang)); ?><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;Penguji <?php echo $penguji2->penguji ?></b></p>
                <br>
                <br>
                <br>
                <br>
                <p class="tengah"><b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(<?php echo $penguji2->nama_dosen ?>)</b></p>       
</body>
</html>