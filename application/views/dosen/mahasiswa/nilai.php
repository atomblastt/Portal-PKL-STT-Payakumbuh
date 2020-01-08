<div class="box">
  <div class="box-header with-border">
    <h4>Grade Nilai :</h4>
  <table width="100px">
    <thead>
      <tr>
        <th>A</th>
         <td><strong>&nbsp;:</strong></td>
        <th>80 - 100</th>
      </tr>
      <tr>
        <th>B</th>
         <td><strong>&nbsp;:</strong></td>
        <th>65 - 79</th>
      </tr>
      <tr>
        <th>C</th>
         <td><strong>&nbsp;:</strong></td>
        <th>55 - 64</th>
      </tr>
      <tr>
        <th>D</th>
         <td><strong>&nbsp;:</strong></td>
        <th>50 - 54</th>
      </tr>
      <tr>
        <th>E</th>
         <td><strong>&nbsp;:</strong></td>
        <th>0 - 50</th>
      </tr>
    </thead>
  </table>
  <br>
  <hr>
    <div class="">
      
  
<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('pembimbing/nilai/tambah/'.$mahasiswa->id_mahasiswa),' class="form-horizontal"');
?>


<div class="form-group">
  <label class="col-md-8 ">Bagaimana disiplin kerja dan efisiensi waktu dalam melaksanakan pekerjaan</label>
  <div class="col-md-2">
    <input type="text" class="form-control" placeholder="0" name="nilai1" value="" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-8 ">Apakah mahasiswa yang bersangkutan dapat melaksanakan pekerjaan dan instruksi yang di berikan oleh instansi</label>
  <div class="col-md-2">
    <input type="text" class="form-control" placeholder="0" name="nilai2" value="" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-8 ">Apakah mahasiswa yang bersangkutan dapat bekerja sama dengan tim atau instansi</label>
  <div class="col-md-2">
    <input type="text" class="form-control" placeholder="0" name="nilai3" value="" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-8 ">Apakah mahasiswa yang bersangkutan memiliki inisiatif dan kreatifitas yang baik dalam bekerja</label>
  <div class="col-md-2">
    <input type="text" class="form-control" placeholder="0" name="nilai4" value="" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-8 ">Bagaimana penerapan konsep dan ide yang di berikan mahasiswa dalam penyelesaian pekerjaan</label>
  <div class="col-md-2">
    <input type="text" class="form-control" placeholder="0" name="nilai5" value="" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-8 ">Bagaimana persentasi kehadiran mahasiswa di tempat PKL</label>
  <div class="col-md-2">
    <input type="text" class="form-control" placeholder="0" name="nilai6" value="" required>
  </div>
</div>

<div class="form-group" align="right">
  <div class="col-md-10">
    <button class="btn btn-success" name="submit" type="submit">
      <i class="fa fa-save"></i> Submit
    </button>
    <button class="btn btn-info" name="reset" type="reset">
      <i class="fa fa-times"></i> Reset
    </button>
  </div>
</div>

<?php echo form_close(); ?>
<hr>

<div class="form-group">

<div class="form-group" align="right">
  <label class="col-md-8 ">Total Nilai :</label>
  <div class="col-md-2" align="left">
    <b><?php echo $mahasiswa->total_lapangan ?></b>
  </div>
</div>

<div class="form-group" align="right">
  <label class="col-md-8 ">Nilai Akhir (TN/6) :</label>
  <div class="col-md-2" align="left">
    <b><?php echo $mahasiswa->nilai_lapangan ?></b>
  </div>
</div>
<?php if ($mahasiswa->nilai_lapangan >= 80 ): ?>
  <h1><b>A</b></h1>
<?php elseif ($mahasiswa->nilai_lapangan >= 65) : ?>
  <h1><b>B</b></h1>
<?php elseif ($mahasiswa->nilai_lapangan >= 55) : ?>
  <h1><b>C</b></h1>
<?php elseif ($mahasiswa->nilai_lapangan >= 50) : ?>
  <h1><b>D</b></h1>
<?php else: ?>
  <h1><b>E</b></h1>
<?php endif ?>
</div>
</div>
  </div>
    </div>