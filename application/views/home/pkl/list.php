<main role="main">
  <div class="container">
    <div class="row">
      <div class=" box box-primary">
        <div class="box-header with-border" style="background-color: #3c8dbc;">
            <h3 class="card-title" align="left"><b><font color="white"><?php echo $user->nama_mahasiswa; ?></font></b></h3>
            <h3 class="card-title" align="left"><b><font color="white"><?php echo $user->no_induk; ?></b></font></h3>
            <?php if ($user->id_pkl == ''): ?>
                <a href="<?php echo base_url('home/pkl/tambah') ?>" class="btn btn-default btn-lg">Isi Lokasi Lengkap PKL</a>
              <?php endif ?>
              <?php if ($user->status_pkl == 'di tolak'): ?>
                <a href="<?php echo base_url('home/pkl/edit_tolak/'.$user->id_pkl) ?>" class="btn btn-default btn-lg">Isi Ulang Lokasi PKL</a>
              <?php endif ?>
          </div>
        <div class="box-body">
          <div class="card-body">
            <div class="row">
              <div class=" col-md-9 col-lg-9 ">
                <h4>
                <table id="tabel" cellpadding=100 cellspacing=100 align="left">
                  <tbody>
                    <tr>
                      <th>Nama Instusi</th>
                      <td><strong>&nbsp;:</strong></td>
                      <?php if ($user->status_pkl == 'di tolak'): ?>
                      <?php else: ?>
                      <td>&nbsp;<?php echo $user->nama_tempat; ?></td>
                      <?php endif ?>
                    </tr>
                    <tr>
                      <th>&nbsp;</th>
                    </tr>
                    <tr>
                      <th>Lokasi Praktek Kerja Lapangan </th>
                      <th><strong>&nbsp;:</strong></th>
                      <td>&nbsp;<?php echo $user->lokasi ?></td>
                    </tr>
                    <tr>
                      <th>&nbsp;</th>
                    </tr>
                    <tr>
                      <th>Status Praktek Kerja Lapangan</th>
                      <td><strong>&nbsp;:</strong></td>
                      <td>&nbsp;<?php echo $user->status_pkl ?></td>
                      <td>&nbsp;</td>
                      <td> 
                        <?php if ($user->status_pkl == 'di tolak'): ?>
                        <h3 id="textkedip"><b><font color=red><?php echo $user->nama_tempat ?></color></b></h3>
                        <?php endif ?>
                        <?php if ($user->status_pkl === 'peninjauan'): ?>
                        <h5><b><font color=red>Silahkan hubungi prodi untuk peninjauan lokasi Praktek Kerja Lapangan anda</color></b></h5>
                        <?php endif ?>
                        <?php if ($user->status_pkl==='disetujui'): ?>
                        <h5 id="textkedip"><b><font color=blue>Anda di terima PKL di <h3><b><?php echo ucfirst($user->nama_tempat) ?></b></h3></color></b></h5>
                        <?php endif ?>
            </td>
                    </tr>
                  </tbody>
                </table>
              </h4>
              </div>
            </div>
          </div>
            <hr>
            <div align="rigth">
              <?php if ($user->status_pkl === 'di proses'): ?>
                
                  <a href="<?php echo base_url('cetak/cetak/permohonan') ?>" class="btn btn-success btn btn-lg">
                    <i class="fa fa-print"></i> Cetak Surat PKL 
                  </a>
              <?php endif ?>
<!--               <?php if ($user->status_pkl === 'peninjauan'): ?>
                  <a href="<?php echo base_url('home/pkl/edit/'.$user->id_user) ?>" class="btn btn-info btn btn-lg">Ubah Lokasi PKL 
                  </a>
                
              <?php endif ?> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script>
  
  var kedipan = 1000; 
var dumet = setInterval(function () {
    var ele = document.getElementById('textkedip');
    ele.style.visibility = (ele.style.visibility == 'hidden' ? ''  : 'hidden');
}, kedipan);

</script>
