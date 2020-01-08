<main role="main">
  <div class="row">
 <?php 
if ($this->session->flashdata('warning')) {
  echo '<div class="alert alert-danger">';
  echo $this->session->flashdata('warning');
  echo '</div>';
}
if ($this->session->flashdata('sukses')) {
  echo '<p class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>';
  echo $this->session->flashdata('sukses');
  echo '</div>' ;
}
?>
    <div class="col-md-12">

      <div class="box box-primary">
        <div class="box-header with-border" style="background-color: #3c8dbc;">  
            <h3 align="center"><b><font color="white"><?php echo $user->nama_dosen; ?></font></b></h3>
            <br>
          </div>
         
              &nbsp; <a href="#" data-target="#Modal_Foto" id="modal" data-toggle="modal" data-target="#Modal_Foto"  ><i class="fa fa-image"></i> Foto Profil</a>
              <div class="box-body">
              <div class="col-md-3 col-lg-3 " align="center">
                <img alt="Foto Mahasiswa" src="<?php
                  echo base_url('assets/upload/image/'.$user->gambar_dosen);
                ?>" class="img-circle img-fluid" width="200px" height="200px">
              </div>
              
                <!-- <table id="tabel" class="table table-user-information"> -->
                <table id="tabel" style="font-size:1.5vw">
                  <tbody>
                    <tr>
                      <th>NIM</th>
                      <td><strong>&nbsp;:</strong></td>
                      <td>&nbsp;<?php echo $user->no_induk; ?></td>
                    </tr>
                    <tr>
                      <th>&nbsp;</th>
                    </tr>
                    <tr>
                      <th>Alamat</th>
                      <td><strong>&nbsp;:</strong></td>
                      <td>&nbsp;<?php echo $user->alamat ?></td>
                    </tr>
                    <tr>
                      <th>&nbsp;</th>
                    </tr>
                    <tr>
                      <th>Kontak</th>
                      <td><strong>&nbsp;:</strong></td>
                      <td>&nbsp;<?php echo $user->no_tlp ?></td>
                    </tr>
                    <tr>
                      <th>&nbsp;</th>
                    </tr>
                    <tr>
                      <th>Tempat Tanggal Lahir</th>
                      <th><strong>&nbsp;:</strong></th>
                      <td>&nbsp;<?php echo $user->tempat_lahir ?>/<?php echo $user->tanggal_lahir  ?></td>
                    </tr>
                  </tbody>
                </table>
              
          
            <a href="#" data-target="#Modal_Edit_Pass" id="modal" data-toggle="modal" data-target="#Modal_Edit_Pass" class="btn btn-warning" ><i class="fa fa-lock"></i> Edit Akun</a>
            <a href="#" data-target="#Modal_Edit_Bio" id="modal" data-toggle="modal" data-target="#Modal_Edit_Bio" class="btn btn-primary" ><i class="fa fa-user"></i> Edit Biodata</a>
              </div>
                
              </div>
            </div>
          </div>

            <!-- MODAL foto -->
           <div id="Modal_Foto" class="modal fade">
            <div class="modal-dialog">
            <!--<form action="<?php //echo site_url('dosen/bimbingan/tambah'); ?>" method="post" enctype="multipart/form-data"> -->
              <?php echo form_open_multipart('dosen/dasbor/foto/'. $user->id_dosen); ?>
                <div class="modal-content">
                  <div class="modal-header" style="background-color: #3c8dbc;">
                    <h5 class="modal-title" id="tabelnyaModalLabel"><b><font color="white">Upload Foto Profil</font></b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                  <div class="form-group row">
            <label class="col-md-2 control-label">Uplaod File</label>
            <div class="col-md-5">
              <input type="file" name="gambar_dosen" class="form-control" required="required">
            </div>
          </div>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
                    <button  type="submit" id="btn_save" class="btn btn-success"> Simpan</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL foto-->

        <!-- MODAL ganti pass -->
           <div id="Modal_Edit_Pass" class="modal fade">
            <div class="modal-dialog">
            <!--<form action="<?php //echo site_url('dosen/bimbingan/tambah'); ?>" method="post" enctype="multipart/form-data"> -->
              <?php echo form_open_multipart('dosen/dasbor/edit/'. $user->id_user); ?>
                <div class="modal-content">
                  <div class="modal-header" style="background-color: #3c8dbc;">
                    <h5 class="modal-title" id="tabelnyaModalLabel"><b><font color="white">Edit Akun</font></b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                <div class="modal-body">
                  <div class="form-group row">
                    <label class="col-md-2 control-label">NIM</label>
                    <div class="col-md-5">
                      <input type="text" name="no_induk" class="form-control" value="<?php echo $user->no_induk ?>" required="required">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-2 control-label">Password</label>
                    <div class="col-md-5">
                      <input type="password" name="password" class="form-control" required="required">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-2 control-label">Email</label>
                    <div class="col-md-5">
                      <input type="email" name="email" class="form-control" value="<?php echo $user->email ?>" required="required">
                    </div>
                  </div>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
                    <button  type="submit" id="btn_save" class="btn btn-success"> Simpan</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL ADD-->

        <!-- MODAL ganti pass -->
           <div id="Modal_Edit_Bio" class="modal fade">
            <div class="modal-dialog">
            <!--<form action="<?php //echo site_url('dosen/bimbingan/tambah'); ?>" method="post" enctype="multipart/form-data"> -->
              <?php echo form_open_multipart('dosen/dasbor/edit_bio/'. $user->id_dosen); ?>
                <div class="modal-content">
                  <div class="modal-header" style="background-color: #3c8dbc;">
                    <h5 class="modal-title" id="tabelnyaModalLabel" ><b><font color="white">Edit Biodata</font></b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                <div class="modal-body">
                  <div class="form-group row">
                    <label class="col-md-4 control-label">Nama</label>
                    <div class="col-md-5">
                      <input type="text" name="nama_dosen" class="form-control" value="<?php echo $user->nama_dosen ?>" required="required">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-4 control-label">Tanggal Lahir</label>
                    <div class="col-md-5">
                      <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $user->tanggal_lahir ?>" required="required">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-4 control-label">Tempat Lahir</label>
                    <div class="col-md-5">
                      <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $user->tempat_lahir ?>" required="required">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-4 control-label">Alamat</label>
                    <div class="col-md-5">
                      <input type="text" name="alamat" class="form-control" value="<?php echo $user->alamat ?>" required="required">
                    </div>
                  </div>
                

                  <div class="form-group row">
                    <label class="col-md-4 control-label">Agama</label>
                    <div class="col-md-5">
                      <input type="text" name="agama" class="form-control" value="<?php echo $user->agama ?>" required="required">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-4 control-label">Konta wa / no telepon</label>
                    <div class="col-md-5">
                      <input type="number" name="no_tlp" class="form-control" value="<?php echo $user->no_tlp ?>" required="required">
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
                    <button  type="submit" id="btn_save" class="btn btn-success"> Simpan</button>
                  </div>
                </div>
              </div>
            </div>

          </div>
            </form>
        <!--END MODAL ADD-->
</main>
