<main role="main">
  <div class="container">
    <div class="row">
      <div class="" >
        <div class="card">
          <div class="card-header">
            <h3 class="card-title" align="left"><b><?php echo $user->nama; ?></b></h3>
            <h3 class="card-title" align="left"><b><?php echo $user->no_induk; ?></b></h3>
            <hr>
          </div>
          <div class="card-body">
            <div class="row">
              <div class=" col-md-9 col-lg-9 ">
                <!-- <table id="tabel" class="table table-user-information"> -->
            <div align="left">
              <?php if ($user->id_pkl == ''): ?>
                <a href="<?php echo base_url('home/pkl/tambah') ?>" class="btn btn-warning btn-lg">Isi Lokasi Lengkap PKL</a>
              <?php endif ?>
            </div>                  
                  <br>
                <h4>
                <table id="tabel" cellpadding=100 cellspacing=100 align="left">
                  <tbody>
                    <tr>
                      <th>Nama Instusi</th>
                      <td><strong>&nbsp;:</strong></td>
                      <td>&nbsp;<?php echo $user->nama_tempat; ?></td>
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
                        <?php if ($user->status_pkl === 'peninjauan'): ?>
                        <h5><b><font color=red>Silahkan hubungi prodi untuk peninjauan lokasi Praktek Kerja Lapangan anda</color></b></h5>
                        <?php endif ?>
                        <?php if ($user->status_pkl==='disetujui'): ?>
                        <h5><b><font color=blue>Cetak surat praktek kerja lapangan umtuk proses lanjutan</color></b></h5>
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
              <?php if ($user->status_pkl === 'disetujui'): ?>
                
                  <a href="#" class="btn btn-success btn btn-lg">
                    <i class="fa fa-print"></i> Cetak Surat PKL 
                  </a>
                
              <?php endif ?>
                  <a href="<?php echo base_url('home/pkl/edit/'.$user->id_user) ?>" class="btn btn-info btn btn-lg">Ubah Lokasi PKL 
                  </a>
            </div>
        </div>
      </div>
    </div>
  </div>
</main>
