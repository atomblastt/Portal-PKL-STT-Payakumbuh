<section class="content">
<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>NO</th>
      <th>NIM</th>
      <th>NAMA</th>
      <th>JUDUL</th>
      <th>ACTION</th>
    </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach ($sidang as $i ) { ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $i->no_induk ?></td>
      <td><?php echo $i->nama_mahasiswa ?></td>
      <td><?php echo $i->judul ?></td>
      <td><a href="<?php echo base_url('admin/sidang/penguji/'.$i->id_mahasiswa) ?>" class="btn btn-warning btn-block"><i class="fa fa-black-tie"></i> Pilih Penguji</a></td>
    </tr>
<?php } ?>
  </tbody>
</table>
</section>
 