<div class="box box-info">
  <div class="box-body">
    
  
<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr style="background-color: yellow">
      <th>NO</th>
      <th>NAMA</th>
      <th>PRODI</th>
      <th>Action Bimbingan</th>
    </tr>
    </thead>
    <?php $no=1; ?>
    <tbody>
      <?php foreach($mahasiswa as $i):?>
        <?php if ($i->id_user_pm == '0'): ?>
      
    <tr>
      <td><?php echo $no++ ?></td>
      <td>
          <a href="<?php echo base_url('assets/upload/image/'.$i->gambar_mahasiswa) ?>"><img src="<?php echo base_url('assets/upload/image/'.$i->gambar_mahasiswa) ?>" class="img-circle" alt="Mahasiswa Image" width="50" height="50"></a>
        &emsp;
        <b><?php echo $i->nama_mahasiswa ?></b></td>
      <td><?php echo $i->prodi ?></td>
      <td>
          
        <a href="<?php echo base_url('pembimbing/mahasiswa/setujui/'.$i->id_mahasiswa) ?>" class="btn btn-success" onclick="return confirm('Yaking Ingin Memilih <?php echo $i->nama_mahasiswa ?> sebagai Pembibing Lapangan ?')"><i class="fa fa-check"></i> Pilih</a>
       </td>
    </tr>
      <?php else: ?>
        <?php endif ?>
     <?php endforeach;?>
  </tbody>
</table>
  </div>
</div>
</section>



