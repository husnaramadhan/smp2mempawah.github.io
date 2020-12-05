 <div class="col-lg-6 mx-auto">

 	<div class="card shadow mb-4">
 		<div class="card-header py-3">
 			<h6 class="m-0 font-weight-bold text-primary">Daftar Kelas SMPN 2 Mempawah Timur</h6>
 		</div>
 		<div class="card-body">


 			<?php 
 			$no = 0;
 			foreach ($isi->result() as $key): $no++; ?>
 				<?php if ($no % 2 == 0){ ?>
 					<div class="my-2"></div>
 					<a href="#" class="btn btn-light btn-icon-split">
 						<span class="icon text-gray-600">
 							<i class="fas fa-home"></i>
 						</span>
 						<span class="text" class="text"style="width: 455px;">Kelas <?= $key->nama ?></span>
 					</a>	
 					<?php }else{ ?>
 						<div class="my-2"></div>
 						<a href="#" class="btn btn-info btn-icon-split">
 							<span class="icon text-white-50">
 								<i class="fas fa-home"></i>
 							</span>
 							<span class="text" class="text"style="width: 455px;">Kelas <?= $key->nama ?></span>
 						</a>
 						<?php	} ?>
 					<?php endforeach ?>





 				</div>
 			</div>

 		</div>

 	</div>

 </div>
 <!-- /.container-fluid -->

</div>