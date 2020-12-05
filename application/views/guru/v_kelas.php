
<div class="container-fluid">

  <!-- Page Heading -->



  <!-- DataTales Example -->
  <div class="card shadow mb-4 mx-auto">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Kelas Mata Pelajaran</h6>

    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <div class="col-lg-7 mx-auto">
          <thead>
            <tr>
              <th>Kelas</th>
              <th>Mata Pelajaran</th>
              <th><center>Aksi</center></th>

            </tr>
          </thead>

          <tbody>
            <?php foreach ($isi->result() as $key): ?>
              <tr>
                <td><?= $key->kelas ?></td>
                <td><?= $key->nama_mapel ?></td>
                <td>
                  <center>
                    <a href="<?= base_url('guru/lihat_siswa/index/'.$key->id); ?>" class="btn btn-success">Lihat Siswa</a>
                  </center>
                </td>
              </tr>
            <?php endforeach ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>


</div>  
</div>

<script>
  var element = document.getElementById("kelola_nilai");
  element.classList.add("active");
</script>