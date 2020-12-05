
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">
    <a href="<?= base_url('guru/tambah_nilai/index/'.$id_mapel.'/'.$id_siswa) ?>" class="btn btn-secondary btn-icon-split">
      <span class="icon text-white-50">
        <i class="fas fa-arrow-right"></i>
      </span>
      <span class="text">Tambah Nilai</span>
    </a></h1>
    <p class="mb-4"></p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4 mx-auto">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Nilai</h6>

      </div>

      <div class="card-body">
        <table class="table">
          <tr>
            <th width="15%">Nama</th>
            <th width="1px">:</th>
            <th><?= $siswa->nama ?></th>
          </tr>
          <tr>
            <th>NIS</th>
            <th>:</th>
            <th><?= $siswa->nis ?></th>
          </tr>
          <tr>
            <th>Mata Pelajaran</th>
            <th >:</th>
            <th><?= $mapel->nama_mapel ?></th>
          </tr>
        </table>
        <br>
        <br>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <div class="col-lg-7 mx-auto">
            <thead>
              <tr>
                <th>Jenis</th>
                <th>Nilai</th>
                <th><center>Aksi</center></th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $nilai_tugas = 0;
              $nilai_ulangan_harian = 0;
              $nilai_mid = 0;
              $nilai_ulangan_umum = 0;
              $num_rows_tugas = $tugas->num_rows();
              $num_rows_ulangan_harian = $ulangan_harian->num_rows();
              $num_rows_mid = $mid->num_rows();
              $num_rows_ulangan_umum = $ulangan_umum->num_rows();
              ?>
              <?php
              $nilai = 0;
              foreach ($tugas->result() as $key): ?>
                <tr>
                  <td>Tugas</td>
                  <td><?= $key->nilai ?></td>
                  <td>
                    <center>
                      <a href="<?= base_url('guru/lihat_nilai/hapus/'.$id_mapel.'/'.$id_siswa.'/'.$key->id) ?>" class="btn btn-danger">Hapus</a>
                      <a href="<?= base_url('guru/lihat_nilai/edit/'.$key->id) ?>" class="btn btn-warning">Edit</a>
                    </center>
                  </td>
                </tr>
                <?php 
                $nilai = $nilai + $key->nilai;
                $nilai_tugas = $nilai / $num_rows_tugas;
                ?>

              <?php endforeach ?>
              <?php if ($num_rows_tugas >= 1): ?>
                <tr>
                  <td colspan="3"></td>
                </tr>  
              <?php endif ?>
              
              <?php
              $nilai = 0;
              foreach ($ulangan_harian->result() as $key): ?>
                <tr>
                  <td>Ulangan Harian</td>
                  <td><?= $key->nilai ?></td>
                  <td>
                    <center>
                      <a href="<?= base_url('guru/lihat_nilai/hapus/'.$id_mapel.'/'.$id_siswa.'/'.$key->id) ?>" class="btn btn-danger">Hapus</a>
                      <a href="<?= base_url('guru/lihat_nilai/edit/'.$key->id) ?>" class="btn btn-warning">Edit</a>
                    </center>
                  </td>
                </tr>
                <?php 
                $nilai = $nilai + $key->nilai;
                $nilai_ulangan_harian = $nilai / $num_rows_ulangan_harian;
                ?>
              <?php endforeach ?>
              <?php if ($num_rows_ulangan_harian >= 1): ?>
                <tr>
                  <td colspan="3"></td>
                </tr>  
              <?php endif ?>
              <?php $nilai = 0; foreach ($mid->result() as $key): ?>
              <tr>
                <td>MID</td>
                <td><?= $key->nilai ?></td>
                <td>
                  <center>
                    <a href="<?= base_url('guru/lihat_nilai/hapus/'.$id_mapel.'/'.$id_siswa.'/'.$key->id) ?>" class="btn btn-danger">Hapus</a>
                    <a href="<?= base_url('guru/lihat_nilai/edit/'.$key->id) ?>" class="btn btn-warning">Edit</a>
                  </center>
                </td>
              </tr>
              <?php 
              $nilai = $nilai + $key->nilai;
              $nilai_mid = $nilai / $num_rows_mid;
              ?>
            <?php endforeach ?>
            <?php if ($num_rows_mid >= 1): ?>
              <tr>
                <td colspan="3"></td>
              </tr>  
            <?php endif ?>
            <?php $nilai = 0; foreach ($ulangan_umum->result() as $key): ?>
            <tr>
              <td>Ulangan Umum</td>
              <td><?= $key->nilai ?></td>
              <td>
                <center>
                  <a href="<?= base_url('guru/lihat_nilai/hapus/'.$id_mapel.'/'.$id_siswa.'/'.$key->id) ?>" class="btn btn-danger">Hapus</a>
                 <a href="<?= base_url('guru/lihat_nilai/edit/'.$key->id) ?>" class="btn btn-warning">Edit</a>
                </center>
              </td>
            </tr>
            <?php 
            $nilai = $nilai + $key->nilai;
            $nilai_ulangan_umum = $nilai / $num_rows_ulangan_umum;
            ?>
          <?php endforeach ?>
          <?php if ($num_rows_ulangan_umum >= 1): ?>
            <tr>
              <td colspan="3"></td>
            </tr>  
          <?php endif ?>
          <tr>
            <td colspan="1">Akumulasi Nilai</td>
            <td colspan="2">
              <?php 
              $nilai_akumulasi = ($nilai_ulangan_harian + $nilai_tugas + $nilai_mid + $nilai_ulangan_umum  ) / 4
               ?>
               <?= round($nilai_akumulasi, 2) ?>
            </td>
          </tr>  
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