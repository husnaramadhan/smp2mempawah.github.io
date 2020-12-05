 <div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">

        <div class="col-lg">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Form Edit Absen </h1>
            </div>
            <form class="user" action="<?= base_url('guru/edit_absen/proses'); ?>" method="POST">
              <input type="hidden" name="id_tampung" value="<?= $id_tampung ?>">
              <input type="hidden" name="id_siswa" value="<?= $id_siswa ?>">
             <div class="form-group row">
               <div>  
                 <label class="m-0 font-weight-bold text-primary"> Nama : </label ></div>
                 <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." value="<?= $siswa->nama ?>" disabled>
               </div>

               <div class="form-group row">
                 <div>  
                   <label class="m-0 font-weight-bold text-primary"> Alpha :</label ></div>
                   <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="alpha" value="<?= $absen->alpha ?>">
                 </div>
                 <div class="form-group row">
                   <div>  
                     <label class="m-0 font-weight-bold text-primary"> Izin :</label ></div>
                     <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="izin" value="<?= $absen->izin ?>">
                   </div>
                   <div class="form-group row">
                     <div>  
                       <label class="m-0 font-weight-bold text-primary"> Sakit :</label ></div>
                       <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="sakit" value="<?= $absen->sakit ?>">
                     </div>

                     <button type="submit" class="btn btn-primary btn-user btn-block">
                      SIMPAN DATA
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
        var element = document.getElementById("kelola_nilai");
        element.classList.add("active");
      </script>