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

<div class="box">
  <div class="box-body">
  
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
    </tbody>
</table>
  
  <br>
  <br>

<?php if (empty($cek)): ?>     
<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('dosen/sidang/input_nilai/'.$mahasiswa->id_mahasiswa),' class="form-horizontal"');
?>



  <div align="center">
    <div class="form-group">
  <label class="col-md-2 control-label">Sebagai Penguji</label>
  <div class="col-md-2">
   <select name="penguji" class="form-control">
    <option value="1">1</option>
    <option value="2">2</option>
   </select>
  </div>
</div>
    
<table border="2" width="0,10s">
    <thead width="450" border="2" bgcolor="yellow">
    <tr>
      <th>&emsp;&emsp;MATERI PENILAIAN&emsp;&emsp;</th>
      <th>&emsp;&emsp;NILAI (1 - 100)&emsp;&emsp;</th>
      <th>&emsp;&emsp;BOBOT ( % )&emsp;&emsp;</th>
      <th>&emsp;&emsp;NILAI X BOBOT&emsp;&emsp;</th>
    </tr>
    </thead>
    <tbody align="center">
    <tr>
      <td>Penampilan</td>
      <td>
        <input type="number" name="nilai1" id="nilai1" onkeyup="penampilan()" placeholder="isi disni..">
      </td>
      <td>10</td>
      <td>
        <input type="text" name="hasil1" id="hasil1" placeholder="......" readonly>
      </td>
    </tr>

    <tr>
      <td>Penguasaan Laporan PKL</td>
      <td>
        <input type="number" name="nilai2" id="nilai2" onkeyup="penampilan()" placeholder="isi disni..">
      </td>
      <td>50</td>
      <td>
        <input type="text" name="hasil2" id="hasil2" placeholder="......" readonly>
      </td>
    </tr>

    <tr>
      <td>Hasil</td>
      <td>
        <input type="number" name="nilai3" id="nilai3" onkeyup="penampilan()" placeholder="isi disni..">
      </td>
      <td>20</td>
      <td>
        <input type="text" name="hasil3" id="hasil3" placeholder="......" readonly>
      </td>
    </tr>

    <tr>
      <td>Penulisan Laporan PKL</td>
      <td>
        <input type="number" name="nilai4" id="nilai4" onkeyup="penampilan()" placeholder="isi disni..">
      </td>
      <td>85</td>
      <td>
        <input type="text" name="hasil4" id="hasil4" placeholder="......" readonly>
      </td>
    </tr>

    <tr width="10">
      <td><b>TOTAL</b></td>
      <td>
        
      </td>
      <td>100</td>
      <td>
        <input type="text" name="hasil5" id="hasil5" onkeydown="penampilan()" placeholder="......" readonly>
      </td>
    </tr>
  </tbody>
</table>
  </div>
<br>
  <div class="text-center">  
<div class="form-group">
  <label class="col-md-2 control-label"></label>
  <div class="col-md-5">
    <button class="btn btn-success btn-lg" name="submit" type="submit">
      <i class="fa fa-save"></i>Simpan
    </button>
    <button class="btn btn-info btn-lg" name="reset" type="reset">
      <i class="fa fa-times"></i>Reset
    </button>
  </div>
</div>
  </div>





<?php echo form_close(); ?>

<?php else: ?>

  <div align="center">
    <div class="form-group">
  <label class="col-md-2 control-label">Sebagai Penguji</label>
  <div class="col-md-2">
   <label class="col-md-2 control-label"><?php echo $cek->penguji ?></label>
  </div>
</div>
    <br><br><br><br>
<table border="2" width="0,10s">
    <thead width="450" border="2" bgcolor="pink">
    <tr>
      <th>&emsp;&emsp;MATERI PENILAIAN&emsp;&emsp;</th>
      <th>&emsp;&emsp;NILAI&emsp;&emsp;</th>
    </tr>
    </thead>
    <tbody align="center">
    <tr>
      <td>Penampilan</td>
      <td>
        <?php echo $cek->n1 ?>
      </td>
    </tr>

    <tr>
      <td>Penguasaan Laporan PKL</td>
     
      <td>
        <?php echo $cek->n2 ?>
      </td>
    </tr>

    <tr>
      <td>Hasil</td>
   
      <td>
        <?php echo $cek->n3 ?>
      </td>
    </tr>

    <tr>
      <td>Penulisan Laporan PKL</td>
      
      <td>
        <?php echo $cek->n4 ?>
      </td>
    </tr>

    <tr width="10">
      <td><b>TOTAL</b></td>

      <td>
        <?php echo $cek->n5 ?>
      </td>
    </tr>
  </tbody>
</table>

<?php endif ?>   

<hr>


</div>
  </div>
    </div>