 <div class="container-fluid">

 	<!-- Page Heading -->
 	
 	<p class="mb-4"></p>
 	<!-- DataTales Example -->
 	<div class="card shadow mb-4">
 		<div class="card-header py-3">
 			<h6 class="m-0 font-weight-bold text-primary">Tabel siswa</h6>

 		</div>

 		<div class="card-body">
 			<div class="table-responsive">
 				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 					<div class="col-lg-7">
 						<thead>
 							<tr>
 								<th>Mata Pelajaran</th>
 								<th>Akumulasi Nilai</th>
 								<th>Aksi</th>
 							</tr>
 						</thead>
 						<tbody>
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
 									<td><?= $key->nama_mapel ?></td>
 									<td><?= round($nilai_akumulasi, 2) ?></td> 						
 									<td>
 										<center>
 											<a href="<?= base_url('siswa/nilai/index/'.$key->id); ?>" class="btn btn-primary">Lihat Nilai</a>

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
 		var element = document.getElementById("mapel");
 		element.classList.add("active");
 	</script>