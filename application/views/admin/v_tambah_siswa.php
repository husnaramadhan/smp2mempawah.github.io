<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
        
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Form Tambah Akun Siswa  </h1>
              </div>
              <form class="user" action="<?php echo site_url('admin/siswa/proses') ?>" method="POST">
              	<div class="form-group row">
                 <div>  
                 <label class="m-0 font-weight-bold text-primary"> Kelas : </label ></div>
                 <select class="form-control" name="id_kelas">
                 	<?php foreach ($isi->result() as $key): ?>
                 		<option value="<?= $key->id ?>"><?= $key->nama ?></option>	
                 	<?php endforeach ?>
                 	
                 </select>
                </div>
                <div class="form-group row">
                 <div>  
                 <label class="m-0 font-weight-bold text-primary"> Nama : </label ></div>
                 <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="nama" required="">
                </div>
                <div class="form-group row">
                 <div>  
                 <label class="m-0 font-weight-bold text-primary" > Nis : </label ></div>    
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="nis" required="">
                  
                </div>
                <div class="form-group row">
                  <div>  
                 <label class="m-0 font-weight-bold text-primary" > Password  : </label ></div> 
                    <input type="password" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="password" required="">
                  
                </div>
                <div class="form-group row">
                   <div>  
                 <label class="m-0 font-weight-bold text-primary" > Tempat Lahir : </label ></div>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="tempat_lahir" >
                  
                </div>
                <div class="form-group row">
                   <div>  
                 <label class="m-0 font-weight-bold text-primary" > Tanggal Lahir : </label ></div>
                    <input type="date" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="tgl_lahir">
                  
                </div>
                <div class="form-group row">
                   <div>  
                 <label class="m-0 font-weight-bold text-primary"> Alamat :  </label ></div>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="alamat" >
                  
                </div>
                <div class="form-group row">
                   <div>  
                 <label class="m-0 font-weight-bold text-primary" > Nama Ayah : </label ></div>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="nama_ayah" >
                  
                </div>
                <div class="form-group row">
                   <div>  
                 <label class="m-0 font-weight-bold text-primary" > Pekerjaan Ayah : </label ></div>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="pekerjaan_ayah" >
                  
                </div>
                <div class="form-group row">
                   <div>  
                 <label class="m-0 font-weight-bold text-primary" > Nama ibu : </label ></div>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="nama_ibu" >
                  
                </div>
                <div class="form-group row">
                   <div>  
                 <label class="m-0 font-weight-bold text-primary" > Pekerjaan Ibu : </label ></div>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="pekerjaan_ibu" >
                  
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  TAMBAH AKUN
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