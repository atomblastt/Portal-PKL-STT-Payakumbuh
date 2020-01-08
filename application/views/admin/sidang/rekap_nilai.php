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
        top: 50%;
        transform: translateY(-50%);
      }
      div#logo {
        display: inline-block;
        text-align: center;
        width: 20%;
      }
      div#logo>img {
        width: 150px;
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

<!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <div class="text-right">
          <a href="<?php echo base_url('admin/nilai_akhir/cetak_nilai/'.$mahasiswa->id_mahasiswa) ?>" class="btn btn-info btn-lg"><i class="fa fa-print"></i>Cetak Nilai</a>
          </div>
          <br>
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right" style="background-color: #9ACD32">
              <li class="active"><a href="#final" data-toggle="tab">Nilai Akhir Mahasiswa</a></li>
              <li><a href="#akhir" data-toggle="tab">Nilai Sidang</a></li>
              <li><a href="#penguji1" data-toggle="tab">Nilai Sidang Penguji 1</a></li>
              <li><a href="#penguji2" data-toggle="tab">Nilai Sidang Penguji 2</a></li>
              <li class="pull-left header"><i class="fa fa-server"></i> <?php echo $mahasiswa->nama_mahasiswa; ?></li>
            </ul>
            <div class="tab-content no-padding">
              <br>
              <!-- Morris chart - Sales -->

              <!-- ===================== =========================-->
              <!-- Nilai Akhir  -->
              <!-- =============================================== -->
              <div class="chart tab-pane active" id="final" >

              <div id="kopsurat">
                    <div id="logo">
                      <img src="<?php echo base_url('assets/upload/image/logo.png') ?>" >    
                    </div>
                    <div id="kop">
                      <div class="kop">
                        <h3>PROGRAM STUDI DIII TEKNIK KOMPUTER <br>
                        <span style="font-size: 1.5em">SEKOLAH TINGGI TEKNOLOGI PAYAKUMBUH</span> <br>
                        <small><b>Jalan Khatib Sulaiman Sawah Padang Telp.(0752) 7010851 Fax : (0752) 795053 Payakumbuh 25227</b></small></h3>
                        </div>
                    </div>
                  </div>
                  <hr size="1">

                  <h2 style="text-align: center;"><u><font style="font-family: Times New Roman, Times, serif; font-size: 25px;">BERITA ACARA SIDANG LAPORAN PKL PROGRAM STUDI TEKNIK KOMPUTER</font></u></h2>
                  <br>
                  <p align="center"><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">Pada Tanggal <b><?php echo date('d F Y',strtotime($penguji2->jadwal_sidang)); ?></b> telah dilakukan Ujian Praktek Kerja Lapangan Mahasiswa Berikut :</font></p>

                </center>

                 <!-- <br> -->
                <table>
                  <tbody>
                      <tr>
                        
                          <td><h3>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Nama &emsp;&emsp;&emsp; </h3></td>
                          <td><h3>:</h3></td>
                          <td><b><h3>&emsp;&emsp;<?php echo $mahasiswa->nama_mahasiswa ?></h3></b></td>
                        
                      </tr>

                      <tr>
                        
                          <td><h3>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;NPM &emsp;&emsp;&emsp; </h3></td>
                          <td><h3>:</h3></td>
                          <td><b><h3>&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $mahasiswa->no_induk ?></h3></b></td>
                        
                      </tr>

                      <tr border="1">
                        
                          <td><h3>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Judul &emsp;&emsp;&emsp; </h3></td>
                          <td><h3>:</h3></td>
                        
                      </tr>
                  </tbody>
              </table>
              <div align="center">
                
              <table border="1">
                <thead>
                  <tr>
                    <td><b><h3>&emsp;&emsp;<?php echo $mahasiswa->judul ?>&emsp;&emsp;</h3></b></td>
                  </tr>
                </thead>
              </table>
              </div>
              
                <br>
                <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font style="font-family: Times New Roman, Times, serif; font-size: 19px;">Dengan hasil keputusan tim penguji bahwa mahasiswa di atas : </font></p>
                <?php $nilai_semua = ($nilai[0]->n5 + $nilai[1]->n5 + $nilai_pkl->nilai_lapangan) / 3 ?>
                <table>
                  <tbody>
                      <tr>
                          <td><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;Dinyatakan &emsp;&emsp;&emsp; </font></td>
                          <td><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">:</font></td>
                          <td><b><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">&emsp;&emsp;
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
                          <td><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;Dengan Nilai &emsp;&emsp;&emsp; </font></td>
                          <td><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">:</font></td>
                          <td><b><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">&emsp;&emsp;<?php echo number_format($nilai_semua,2) ?>
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
                          <td><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;Laporan PKL &emsp;&emsp;&emsp; </font></td>
                          <td><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">:</font></td>
                          <td><b><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">&emsp;&emsp;Diperbaiki / <span style="text-decoration:line-through"> Tidak diperbaiki </span>
                          </font></b></td>
                      </tr>
                  </tbody>
              </table>
              <br>
              <br>
              <br>
              <p class="kanan"><b><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">Payakumbuh, <?php echo date('d F Y',strtotime($penguji2->jadwal_sidang)); ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</font></b></p>
              <br>
              <br>
              <br>
              <p class="tengah"><b><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">TIM PENGUJI</font></b></p>
              <br>
              <br>
              <br>
              <p class="tengah"><b><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">PENGUJI 1&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;PENGUJI 2</font></b></p>

              <br>
              <br>
              <br>
              <p class="tengah"><b><font style="font-family: Times New Roman, Times, serif; font-size: 19px;">(<?php echo $nilai[0]->nama_dosen ?>)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;(<?php echo $nilai[1]->nama_dosen ?>)</font></b></p>
              <br><br>

              </div>
              <!-- ===================== =========================-->
              <!-- Nilai Akhir  -->
              <!-- =============================================== -->


              <!-- ===================== =========================-->
              <!-- Nilai Sidang  -->
              <!-- =============================================== -->
              <div class="chart tab-pane" id="akhir" >

              <div id="kopsurat">
                    <div id="logo">
                      <img src="<?php echo base_url('assets/upload/image/logo.png') ?>" >    
                    </div>
                    <div id="kop">
                      <div class="kop">
                        <h3>PROGRAM STUDI DIII TEKNIK KOMPUTER <br>
                        <span style="font-size: 1.5em">SEKOLAH TINGGI TEKNOLOGI PAYAKUMBUH</span> <br>
                        <small><b>Jalan Khatib Sulaiman Sawah Padang Telp.(0752) 7010851 Fax : (0752) 795053 Payakumbuh 25227</b></small></h3>
                        </div>
                    </div>
                  </div>
                  <hr size="1">

                  <h2 style="text-align: center;"><U>REKAPITULASI NILAI AKHIR PRAKTEK KERJA LAPANGAN</U></h2>

                </center>

                 <br>
                <table>
                  <tbody>
                      <tr>
                        
                          <td><h3>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Nama &emsp;&emsp;&emsp; </h3></td>
                          <td><h3>:</h3></td>
                          <td><b><h3>&emsp;&emsp;<?php echo $mahasiswa->nama_mahasiswa ?></h3></b></td>
                        
                      </tr>

                      <tr>
                        
                          <td><h3>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;NPM &emsp;&emsp;&emsp; </h3></td>
                          <td><h3>:</h3></td>
                          <td><b><h3>&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $mahasiswa->no_induk ?></h3></b></td>
                        
                      </tr>

                      <tr>
                        
                          <td><h3>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Judul &emsp;&emsp;&emsp; </h3></td>
                          <td><h3>:</h3></td>
                          <td><b><h3>&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $mahasiswa->judul ?></h3></b></td>
                        
                      </tr>
                  </tbody>
              </table>

                
                <br>
                <br>
              <?php $nilai_semua = ($nilai[0]->n5 + $nilai[1]->n5 + $nilai_pkl->nilai_lapangan) / 3 ?>
                <div align="center">
                  
              <table border="2" width="0,10s">
                  <thead width="450" border="2" bgcolor="yellow">
                  <tr width="300" height="40">
                    <th>&emsp;&emsp;&emsp;&emsp;MATERI PENILAIAN&emsp;&emsp;</th>
                    <th>&emsp;&emsp;NILAI (1 - 100)&emsp;&emsp;</th>
                  </tr>
                  </thead>
                  <tbody align="left">
                  <tr width="300" height="40">
                    <td>&emsp;&emsp;<B>NILAI PENGUJI 1</B></td>
                    <td align="center">
                      <?php echo $penguji1->n5 ?>
                    </td>
                  </tr>

                  <tr width="300" height="40">
                    <td>&emsp;&emsp;<B>NILAI PENGUJI 2</B></td>
                    <td align="center">
                      <?php echo $penguji2->n5 ?>
                    </td>
                  </tr>
                  <tr width="300" height="40">
                    <td>&emsp;&emsp;<B>NILAI PEMBIMIBING LAPANGAN</B></td>
                    <td align="center">
                      <?php echo $nilai_pkl->nilai_lapangan ?>
                    </td>
                  </tr>
                  <tr width="300" height="40">
                    <td>&emsp;&emsp;<B>TOTAL NILAI</B></td>
                    <td align="center">
                      <?php echo $nilai[0]->n5 + $nilai[1]->n5 + $nilai_pkl->nilai_lapangan ?>
                    </td>
                  </tr>
                  <tr width="300" height="40">
                    <td>&emsp;&emsp;<b>NILAI RATA RATA</b></td>
                    <td align="center">
                      <?php echo number_format($nilai_semua,2) ?>
                    </td>
                  </tr>
                      <tr width="300" height="40">
                    <td>&emsp;&emsp;<b>
                      NILAI HURUF
                    </b></td>
                    <td align="center">
                      <?php if ($nilai_semua >= 80 ): ?>
                        <h1><b>A</b></h1>
                      <?php elseif ($nilai_semua >= 65) : ?>
                        <h1><b>B</b></h1>
                      <?php elseif ($nilai_semua >= 55) : ?>
                        <h1><b>C</b></h1>
                      <?php elseif ($nilai_semua >= 50) : ?>
                        <h1><b>D</b></h1>
                      <?php else: ?>
                        <h1><b>E</b></h1>
                      <?php endif ?>
                    </td>
                  </tr>
                </tbody>
              </table>
                </div>
              <br>
              <br>
              <p class="tengah"><b>TIM PENGUJI</b></p>
              <br>
              <br>
              <br>
              <p class="tengah"><b>PENGUJI 1&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;PENGUJI 2</b></p>

              <br>
              <br>
              <br>
              <p class="tengah"><b><?php echo $nilai[0]->nama_dosen ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $nilai[1]->nama_dosen ?></b></p>
              </div>

              <!-- ===================== =========================-->
              <!-- / Nilai Sidang  -->
              <!-- =============================================== -->

              <!-- ===================== =========================-->
              <!-- Penguji 1  -->
              <!-- =============================================== -->
              <div class="chart tab-pane" id="penguji1" >

                <div id="kopsurat">
                    <div id="logo">
                      <img src="<?php echo base_url('assets/upload/image/logo.png') ?>" >    
                    </div>
                    <div id="kop">
                      <div class="kop">
                        <h3>PROGRAM STUDI DIII TEKNIK KOMPUTER <br>
                        <span style="font-size: 1.5em">SEKOLAH TINGGI TEKNOLOGI PAYAKUMBUH</span> <br>
                        <small><b>Jalan Khatib Sulaiman Sawah Padang Telp.(0752) 7010851 Fax : (0752) 795053 Payakumbuh 25227</b></small></h3>
                        </div>
                    </div>
                  </div>
                  <hr size="1">

                  <h2 style="text-align: center;"><U>DAFTAR PENILAIAN SIDANG LAPORAN PRAKTEK KERJA LAPANGAN</U></h2>

                   <table>
                  <tbody>
                      <tr>
                        
                          <td><h3>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Nama &emsp;&emsp;&emsp; </h3></td>
                          <td><h3>:</h3></td>
                          <td><b><h3>&emsp;&emsp;<?php echo $mahasiswa->nama_mahasiswa ?></h3></b></td>
                        
                      </tr>

                      <tr>
                        
                          <td><h3>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;NPM &emsp;&emsp;&emsp; </h3></td>
                          <td><h3>:</h3></td>
                          <td><b><h3>&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $mahasiswa->no_induk ?></h3></b></td>
                        
                      </tr>
                  </tbody>
              </table>

                 <br>
                <center>
                <table  width="500px" border="1">
                  <thead width="450" border="2" bgcolor="yellow">
                  <tr width="300" height="40">
                    <th align="center">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;MATERI PENILAIAN&emsp;&emsp;</th>
                    <th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;NILAI&emsp;&emsp;</th>
                  </tr>
                  </thead>
                  <tbody >
                  <tr>
                    <td  width="300" height="40">&emsp;&emsp;Penampilan</td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
                      <?php echo $penguji1->n1 ?>
                    </td>
                  </tr>

                  <tr>
                    <td width="300" height="40">&emsp;&emsp;Penguasaan Laporan PKL</td>
                   
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
                      <?php echo $penguji1->n2 ?>
                    </td>
                  </tr>

                  <tr>
                    <td width="300" height="40">&emsp;&emsp;Hasil</td>
                 
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
                      <?php echo $penguji1->n3 ?>
                    </td>
                  </tr>

                  <tr>
                    <td width="300" height="40">&emsp;&emsp;Penulisan Laporan PKL</td>
                    
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
                      <?php echo $penguji1->n4 ?>
                    </td>
                  </tr>

                  <tr width="10">
                    <td width="300" height="40" align="center"><b>TOTAL</b></td>

                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
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

              </div>
              <!-- ===================== =========================-->
              <!-- / Penguji 1  -->
              <!-- =============================================== -->

              <!-- ===================== =========================-->
              <!-- Penguji 2  -->
              <!-- =============================================== -->
              <div class="chart tab-pane" id="penguji2" >
                <div id="kopsurat">
                      <div id="logo">
                        <img src="<?php echo base_url('assets/upload/image/logo.png') ?>" >    
                      </div>
                      <div id="kop">
                        <div class="kop">
                          <h3>PROGRAM STUDI DIII TEKNIK KOMPUTER <br>
                          <span style="font-size: 1.5em">SEKOLAH TINGGI TEKNOLOGI PAYAKUMBUH</span> <br>
                          <small><b>Jalan Khatib Sulaiman Sawah Padang Telp.(0752) 7010851 Fax : (0752) 795053 Payakumbuh 25227</b></small></h3>
                          </div>
                      </div>
                    </div>
                    <hr size="1">

                    <h2 style="text-align: center;"><U>DAFTAR PENILAIAN SIDANG LAPORAN PRAKTEK KERJA LAPANGAN</U></h2>

                     <table>
                    <tbody>
                        <tr>
                          
                            <td><h3>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Nama &emsp;&emsp;&emsp; </h3></td>
                            <td><h3>:</h3></td>
                            <td><b><h3>&emsp;&emsp;<?php echo $mahasiswa->nama_mahasiswa ?></h3></b></td>
                          
                        </tr>

                        <tr>
                          
                            <td><h3>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;NPM &emsp;&emsp;&emsp; </h3></td>
                            <td><h3>:</h3></td>
                            <td><b><h3>&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $mahasiswa->no_induk ?></h3></b></td>
                          
                        </tr>
                    </tbody>
                </table>

                     <br>
                  <center>
                  <table  width="500px" border="1">
                    <thead width="450" border="2" bgcolor="yellow">
                    <tr width="300" height="40">
                      <th align="center">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;MATERI PENILAIAN&emsp;&emsp;</th>
                      <th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;NILAI&emsp;&emsp;</th>
                    </tr>
                    </thead>
                    <tbody >
                    <tr>
                      <td  width="300" height="40">&emsp;&emsp;Penampilan</td>
                      <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
                        <?php echo $penguji2->n1 ?>
                      </td>
                    </tr>

                    <tr>
                      <td width="300" height="40">&emsp;&emsp;Penguasaan Laporan PKL</td>
                     
                      <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
                        <?php echo $penguji2->n2 ?>
                      </td>
                    </tr>

                    <tr>
                      <td width="300" height="40">&emsp;&emsp;Hasil</td>
                   
                      <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
                        <?php echo $penguji2->n3 ?>
                      </td>
                    </tr>

                    <tr>
                      <td width="300" height="40">&emsp;&emsp;Penulisan Laporan PKL</td>
                      
                      <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
                        <?php echo $penguji2->n4 ?>
                      </td>
                    </tr>

                    <tr width="10">
                      <td width="300" height="40" align="center"><b>TOTAL</b></td>

                      <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
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
              </div>
              <!-- ===================== =========================-->
              <!-- / Penguji 2  -->
              <!-- =============================================== -->

            </div>
          </div>
        </div>
      </div>
          <!-- /.nav-tabs-custom -->




<!-- <div class="row">
        <div class="col-xs-12">
          <div class="box"> -->
            <!-- /.box-header -->
            <!-- <div class="box-body"> -->
  
<!--     
</div>
</div>
  </div>
</div>
 -->