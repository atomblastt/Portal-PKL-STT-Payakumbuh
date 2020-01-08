    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua ">
            <div class="inner">
              <h3><?php foreach ($total_mhs as $mhs ) {
               echo $mhs;
              } ?></h3>

              <p>Mahasiswa PKL</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?php echo base_url('admin/dasbor/cetak') ?>" target="_blank" class="small-box-footer">More info <i class="fa fa-arrow-circle-right" ></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
               <h3><?php foreach ($total_pkl as $pkl ) {
               echo $pkl;
              } ?></h3>

              <p>Lokasi yang sudah dipilih</p>
            </div>
            <div class="icon">
              <i class="fa fa-map-marker"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php foreach ($total_setuju as $setuju ) {
               echo $setuju;
              } ?></h3>

              <p>Lokasi yang sudah di setujui</p>
            </div>
            <div class="icon">
              <i class="fa fa-check"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
             <h3><?php foreach ($total_belum as $belum ) {
               echo $belum;
              } ?></h3>              

              <p>LOKASI YANG BELUM DI SETUJUI</p>
            </div>
            <div class="icon">
              <i class="fa fa-close"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
<br>
<hr>
<h3 align="center">Daftar mahasiswa yang sudah mengisi form praktek kerja lapangan</h3>
<br>

<table id="example1" class="table table-bordered table-striped">
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
</section>

