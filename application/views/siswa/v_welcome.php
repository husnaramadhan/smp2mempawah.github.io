 <div class="container-fluid">


  <p class="mb-4 mx-auto"> </p>


  <div class="card shadow mb-4">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Biodata Siswa</h6>

      </div>

      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="70%" cellspacing="0">
           <div class="col-lg-7">
            <thead>

            </thead>

            <tbody>
              <tr>
                <th>Kelas</th>
                <td><?= $kelas ?></td>
              </tr>
              <tr>
                <th width="30%">Nama</th>
                <td><?= $siswa->nama ?></td>
              </tr>

              <tr>
                <th>Nis</th>
                <td><?= $siswa->nis ?></td>


              </tr>
              <tr>
                <th>Tempat Lahir</th>
                <td><?= $siswa->tempat_lahir ?></td>


              </tr>
              <tr>
                <th>Tanggal Lahir</th>
                <td><?= $siswa->tgl_lahir ?></td>


              </tr>
              <tr>
                <th>Alamat</th>
                <td><?= $siswa->alamat ?></td>


              </tr>

              <tr>
                <th>Nama Ayah</th>
                <td><?= $siswa->nama_ayah ?></td>


              </tr>

              <tr>
                <th>Pekerjaan Ayah</th>
                <td><?= $siswa->pekerjaan_ayah ?></td>


              </tr>
              <tr>
                <th>Nama Ibnu</th>
                <td><?= $siswa->nama_ibu ?></td>


              </tr>
             
                <tr>
                  <th colspan="2"> <center>Mapel</center></th>
                </tr>
                <?php foreach ($mapel->result() as $key): ?>
                  <?php
                  $id_mapel = $key->id;
                  $id_siswa =  $this->session->userdata('id');
                  $tugas = $this->db->get_where('tabel_nilai', array('jenis' => 'Tugas', 'id_siswa' => $id_siswa, 'id_mapel' => $id_mapel ));
                  $ulangan_harian = $this->db->get_where('tabel_nilai', array('jenis' => 'Ulangan Harian', 'id_siswa' => $id_siswa, 'id_mapel' => $id_mapel ));
                  $mid = $this->db->get_where('tabel_nilai', array('jenis' => 'Mid', 'id_siswa' => $id_siswa, 'id_mapel' => $id_mapel));
                  $ulangan_umum = $this->db->get_where('tabel_nilai', array('jenis' => 'Ulangan Umum', 'id_siswa' => $id_siswa, 'id_mapel' => $id_mapel));

                  $nilai_tugas = 0;
                  $nilai_ulangan_harian = 0;
                  $nilai_mid = 0;
                  $nilai_ulangan_umum = 0;
                  $num_rows_tugas = $tugas->num_rows();
                  $num_rows_ulangan_harian = $ulangan_harian->num_rows();
                  $num_rows_mid = $mid->num_rows();
                  $num_rows_ulangan_umum = $ulangan_umum->num_rows();

                  $nilai = 0; foreach ($tugas->result() as $key2){
                    $nilai = $nilai + $key2->nilai;
                    $nilai_tugas = $nilai / $num_rows_tugas;
                  }

                  $nilai = 0; foreach ($ulangan_harian->result() as $key2){
                    $nilai = $nilai + $key2->nilai;
                    $nilai_ulangan_harian = $nilai / $num_rows_ulangan_harian;
                  } 

                  $nilai = 0; foreach ($mid->result() as $key2){
                    $nilai = $nilai + $key2->nilai;
                    $nilai_mid = $nilai / $num_rows_mid;
                  } 

                  $nilai = 0; foreach ($ulangan_umum->result() as $key2){

                    $nilai = $nilai + $key2->nilai;
                    $nilai_ulangan_umum = $nilai / $num_rows_ulangan_umum;
                  } 

                  $nilai_akumulasi = ($nilai_ulangan_harian + $nilai_tugas + $nilai_mid + $nilai_ulangan_umum  ) / 4
                  ?>
                
                  <tr>
                    <th><?= $key->nama_mapel ?></th>
                    <td><?= round($nilai_akumulasi, 2) ?></td>
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
  <!-- End of Main Content -->


  <!-- End of Content Wrapper -->

