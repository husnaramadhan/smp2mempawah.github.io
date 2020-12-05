 <div class="container-fluid">

 	<!-- Page Heading -->
 	
 	<p class="mb-4"></p>
 	<!-- DataTales Example -->
 	<div class="card shadow mb-4">
 		<div class="card-header py-3">
 			<h6 class="m-0 font-weight-bold text-primary">Tabel Siswa <b><?= $row->kelas ?></b> - Mata Pelajaran <b><?= $row->nama_mapel ?></b></h6>

 		</div>

 		<div class="card-body">
 			<div class="table-responsive">
 				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 					<div class="col-lg-7">
 						<thead>
 							<tr>
 								<th>Nama</th>
 								<th>Nis</th>
 								<th>Akumulasi Nilai</th>
 								<th>Alpa</th>
 								<th>Izin</th>
 								<th>Sakit</th>
 								<th>Aksi</th>
 							</tr>
 						</thead>
 						<tbody>
 							<?php foreach ($isi->result() as $key): ?>
 								<tr>
 									<td><?= $key->nama ?></td>
 									<td><?= $key->nis ?></td>
 									<td>
 										<?php 
 										$tugas = $this->db->get_where('tabel_nilai', array('jenis' => 'Tugas', 'id_siswa' => $key->id));
 										$ulangan_harian = $this->db->get_where('tabel_nilai', array('jenis' => 'Ulangan Harian', 'id_siswa' => $key->id ));
 										$mid = $this->db->get_where('tabel_nilai', array('jenis' => 'Mid', 'id_siswa' => $key->id));
 										$ulangan_umum = $this->db->get_where('tabel_nilai', array('jenis' => 'Ulangan Umum', 'id_siswa' => $key->id));
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
 										<?= round($nilai_akumulasi, 2) ?>

 									</td>
 									<?php $absen = $this->db->get_where('tabel_absen',  array('id_siswa' => $key->id, ))->row(); ?>
 									<td><?= $absen->alpha ?></td>
 									<td><?= $absen->izin ?></td>
 									<td><?= $absen->sakit ?></td>
 									<td>
 										<center>
 											<a href="<?= base_url('guru/lihat_nilai/index/'.$id_mapel.'/'.$key->id); ?>" class="btn btn-primary">Lihat Nilai</a>
 											<a href="<?= base_url('guru/edit_absen/index/'.$id_tampung.'/'.$key->id); ?>" class="btn btn-warning">Edit Absen</a>
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
 		var element = document.getElementById("siswa");
 		element.classList.add("active");
 	</script>
 	<script>
 		var element = document.getElementById("kelola_nilai");
 		element.classList.add("active");
 	</script>