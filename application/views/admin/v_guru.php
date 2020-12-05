 <div class="container-fluid">

 	<!-- Page Heading -->
 	<h1 class="h3 mb-2 text-gray-800">
 		<a href="<?= base_url('admin/guru/tambah') ?>" class="btn btn-secondary btn-icon-split">
 			<span class="icon text-white-50">
 				<i class="fas fa-arrow-right"></i>
 			</span>
 			<span class="text">Tambah Akun Guru</span>
 		</a></h1>
 		<p class="mb-4"></p>
 		<!-- DataTales Example -->
 		<div class="card shadow mb-4">
 			<div class="card-header py-3">
 				<h6 class="m-0 font-weight-bold text-primary">Tabel Form Guru</h6>

 			</div>

 			<div class="card-body">
 				<div class="table-responsive">
 					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 						<div class="col-lg-7">
 							<thead>
 								<tr>
 									<th>Nama</th>
 									<th>NIP</th>
 									<th>Aksi</th>
 									
 								</tr>
 							</thead>

 							<tbody>
 								<?php foreach ($isi->result() as $key): ?>
 									<tr>
 										<td><?= $key->nama ?></td>
 										<td><?= $key->nip ?></td>
 										
 										<td>
 											<center>
 												<a href="<?= base_url('admin/guru/hapus/'.$key->id) ?>" class="btn btn-danger">Hapus</a>
 													<a href="<?= base_url('admin/guru/edit/'.$key->id) ?>" class="btn btn-warning">Edit</a>
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
  var element = document.getElementById("guru");
  element.classList.add("active");
</script>