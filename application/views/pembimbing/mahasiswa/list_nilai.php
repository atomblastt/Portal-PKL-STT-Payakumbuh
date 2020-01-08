  <div class="box box-info">
<div class="box-body">
    
<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>NO</th>
      <th>NAMA</th>
      <th>PRODI</th>
      <th>ACTION</th>
    </tr>
    </thead>
    <?php $no=1; ?>
    <tbody>
      <?php foreach($mahasiswa as $i):?>
      
    <tr>
      <td><?php echo $no++ ?></td>
      <td><a href="<?php echo base_url('assets/upload/image/'.$i->gambar_mahasiswa) ?>"><img src="<?php echo base_url('assets/upload/image/'.$i->gambar_mahasiswa) ?>" class="img-circle" alt="Mahasiswa Image" width="50" height="50"></a>
        &emsp;
        <b><?php echo $i->nama_mahasiswa ?></b></td>
      <td><?php echo $i->prodi ?></td>
      <td>

          
        <a href="<?php echo base_url('pembimbing/nilai/beri/'.$i->id_mahasiswa) ?>" class="btn btn-info"> Nilai</a>
       </td>
    </tr>
     <?php endforeach;?>
  </tbody>
</table>
  </div>
</div>
</section>



