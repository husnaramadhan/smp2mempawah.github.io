<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
        
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Form Tambah Akun Guru </h1>
              </div>
              <form class="user" action="<?php echo site_url('admin/guru/proses') ?>" method="POST">
              	
                <div class="form-group row">
                 <div>  
                 <label class="m-0 font-weight-bold text-primary"> Nama : </label ></div>
                 <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="nama" required="">
                </div>
                <div class="form-group row">
                 <div>  
                 <label class="m-0 font-weight-bold text-primary" > NIP : </label ></div>    
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="nip"required="">
                  
                </div>
                <div class="form-group row">
                  <div>  
                 <label class="m-0 font-weight-bold text-primary" > Password  : </label ></div> 
                    <input type="password" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="password" required="">
                  
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
  var element = document.getElementById("guru");
  element.classList.add("active");
</script>