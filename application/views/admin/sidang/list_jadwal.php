<section class="content">
<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>NO</th>
      <th>NIM</th>
      <th>NAMA</th>
      <th>PENGUJI 1</th>
      <th>PENGUJI 2</th>
      <th>JADWAL</th>
    </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach ($sidang as $u => $i ) { ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $i->no_induk ?></td>
      <td><?php echo $i->nama_mahasiswa ?></td>
      <td><?php echo $i->penguji1 ?></td>
      <td><?php echo $i->penguji2 ?></td>
      <td><?php echo $i->jadwal_sidang ?></td>
    </tr>
<?php } ?>
  </tbody>
</table>
</section>
 