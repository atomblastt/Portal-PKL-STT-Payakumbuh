
  
<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>NO</th>
      <th>NAMA</th>
      <th>PRODI</th>
      <th>Action Bimbingan</th>
    </tr>
    </thead>
    <?php $no=1; ?>
    <tbody>
    <tr>
      <?php foreach($mahasiswa as $i):?>
      <td><?php echo $no++ ?></td>
      <td><?php echo $i->nama_mahasiswa ?></td>
      <td><?php echo $i->prodi ?></td>
      <td>
          
        <a href="<?php echo base_url('pembimbing/mahasiswa/setujui/'.$i->id_mahasiswa) ?>" class="btn btn-success" onclick="return confirm('Yaking Ingin Memilih <?php echo $i->nama_mahasiswa ?> sebagai Pembibing Lapangan ?')"><i class="fa fa-check"></i> Pilih</a>
       </td>
     <?php endforeach;?>
    </tr>
  </tbody>
</table>
</section>



