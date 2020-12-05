 <div class="container-fluid">

 	<!-- Page Heading -->
 	<h1 class="h3 mb-2 text-gray-800">
 		<a href="<?= base_url('admin/siswa/tambah') ?>" class="btn btn-secondary btn-icon-split">
 			<span class="icon text-white-50">
 				<i class="fas fa-arrow-right"></i>
 			</span>
 			<span class="text">Tambah Akun siswa</span>
 		</a></h1>
 		<p class="mb-4"></p>
 		<!-- DataTales Example -->
 		<div class="card shadow mb-4">
 			<div class="card-header py-3">
 				<h6 class="m-0 font-weight-bold text-primary">Tabel Form Siswa</h6>

 			</div>

 			<div class="card-body">
 				<div class="table-responsive">
 					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 						<div class="col-lg-7">
 							<thead>
 								<tr>
 									<th>Kelas</th>
 									<th>Nama</th>
 									<th>Nis</th>
 									<th>Tempat Lahir</th>
 									<th>Tanggal Lahir</th>
 									<th>Alamat</th>
 									<th>Nama Ayah</th>
 									<th>Pekerjaan Ayah</th>
 									<th>Nama Ibu</th>
 									<th>Pekerjaan Ibu</th>
 									<th>Aksi</th>
 								</tr>
 							</thead>

 							<tbody>
 								<?php foreach ($isi->result() as $key): ?>
 									<tr>
 										<?php 
 										$row=$this->db->get_where('tabel_kelas',  array('id' => $key->id_kelas, ) )->row();
 										 ?>
 										<td><?= $row->nama ?></td>
 										<td><?= $key->nama ?></td>
 										<td><?= $key->nis ?></td>
 										<td><?= $key->tempat_lahir ?></td>
 										<td><?= $key->tgl_lahir ?></td>
 										<td><?= $key->alamat ?></td>
 										<td><?= $key->nama_ayah ?></td>
 										<td><?= $key->pekerjaan_ayah ?></td>
 										<td><?= $key->nama_ibu ?></td>
 										<td><?= $key->pekerjaan_ibu ?></td>
 										<td>
 											<center>
 												<a href="<?= base_url('admin/siswa/hapus/'.$key->id) ?>" class="btn btn-danger">Hapus</a>
 													<a href="<?= base_url('admin/siswa/edit/'.$key->id) ?>" class="btn btn-warning">Edit</a>
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