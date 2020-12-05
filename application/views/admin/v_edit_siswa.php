<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
        
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Form Edit Akun Siswa  </h1>
              </div>
              <form class="user" action="<?php echo site_url('admin/siswa/proses_edit') ?>" method="POST">
              	<input type="hidden" required="" name="id" value="<?= $row->id ?>">
              	<div class="form-group row">
                 <div>  
                 <label class="m-0 font-weight-bold text-primary"> Kelas : </label ></div>
                 <select class="form-control" required="" name="id_kelas">
                 	<?php foreach ($isi->result() as $key): ?>
                 		<option value="<?= $key->id ?>"><?= $key->nama ?></option>	
                 	<?php endforeach ?>
                 	
                 </select>
                </div>
                <div class="form-group row">
                 <div>  
                 <label class="m-0 font-weight-bold text-primary"> Nama : </label ></div>
                 <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." required="" name="nama" value="<?= $row->nama ?>">
                </div>
                <div class="form-group row">
                 <div>  
                 <label class="m-0 font-weight-bold text-primary" > Nis : </label ></div>    
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." required="" name="nis" value="<?= $row->nis ?>">
                  
                </div>
                <div class="form-group row">
                  <div>  
                 <label class="m-0 font-weight-bold text-primary" > Password  : </label ></div> 
                    <input type="password" class="form-control form-control-user" id="exampleFirstName" placeholder="..."  name="password" value="">
                  
                </div>
                <div class="form-group row">
                   <div>  
                 <label class="m-0 font-weight-bold text-primary" > Tempat Lahir : </label ></div>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="tempat_lahir" value="<?= $row->tempat_lahir ?>">
                  
                </div>
                <div class="form-group row">
                   <div>  
                 <label class="m-0 font-weight-bold text-primary" > Tanggal Lahir : </label ></div>
                    <input type="date" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="tgl_lahir" value="<?= $row->tgl_lahir ?>">
                  
                </div>
                <div class="form-group row">
                   <div>  
                 <label class="m-0 font-weight-bold text-primary"> Alamat :  </label ></div>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="alamat" value="<?= $row->alamat ?>">
                  
                </div>
                <div class="form-group row">
                   <div>  
                 <label class="m-0 font-weight-bold text-primary" > Nama Ayah : </label ></div>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="nama_ayah" value="<?= $row->nama_ayah ?>">
                  
                </div>
                <div class="form-group row">
                   <div>  
                 <label class="m-0 font-weight-bold text-primary" > Pekerjaan Ayah : </label ></div>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="pekerjaan_ayah" value="<?= $row->pekerjaan_ayah ?>">
                  
                </div>
                <div class="form-group row">
                   <div>  
                 <label class="m-0 font-weight-bold text-primary" > Nama ibu : </label ></div>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="nama_ibu" value="<?= $row->nama_ibu ?>">
                  
                </div>
                <div class="form-group row">
                   <div>  
                 <label class="m-0 font-weight-bold text-primary" > Pekerjaan Ibu : </label ></div>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="pekerjaan_ibu" value="<?= $row->pekerjaan_ibu ?>">
                  
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Edit AKUN
                </button>
                <hr>
                
              </form>
              
              
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script>
  var element = document.getElementById("siswa");
  element.classList.add("active");
</script>