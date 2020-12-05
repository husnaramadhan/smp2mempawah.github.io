 <div class="my-2"></div>


 <!-- Begin Page Content -->

 <div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">
    <a href="<?= base_url('admin/mengampu_mapel/tambah') ?>" class="btn btn-secondary btn-icon-split">
      <span class="icon text-white-50">
       <i class="fas fa-arrow-right"></i>
     </span>
     <span class="text">Tambah Mengampu Mapel</span>
   </a></h1>
   <p class="mb-4"></p>

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel ...</h6>

    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <div class="col-lg-7">
          <thead>
            <tr>
              <th>Nama Guru</th>
              <th>Mata Pelajaran</th>
              <th>Kelas</th>
              <th>aksi</th>

            </tr>
          </thead>
          <tbody>
            <?php foreach ($isi->result() as $key): ?>
              <tr>
              <td><?= $key->guru ?></td>
              <td><?= $key->nama_mapel ?></td>
              <td><?= $key->kelas ?></td>
              <td>
              <center>
                <a href="<?= base_url('admin/mengampu_mapel/hapus/'.$key->id) ?>" class="btn btn-danger">Hapus</a>
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

<script>
  var element = document.getElementById("tampung_kelas");
  element.classList.add("active");
</script>