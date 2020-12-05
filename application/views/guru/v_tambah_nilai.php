 <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
        
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Form Tambah Nilai </h1>
              </div>
              <form class="user" action="<?= base_url('guru/tambah_nilai/proses') ?>" method="POST">
                <input type="hidden" name="id_mapel" value="<?= $id_mapel ?>">
                <input type="hidden" name="id_siswa" value="<?= $id_siswa ?>">
                 <div class="form-group row">
                 <div>  
                 <label class="m-0 font-weight-bold text-primary"> Nama : </label ></div>
                 <input type="text" class="form-control form-control-user" id="exampleFirstName" disabled="" value="<?= $siswa->nama ?>">
                 </div>

                <div class="form-group row">
                  <div>  
                 <label class="m-0 font-weight-bold text-primary"> Mata Pelajaran : </label ></div>
                 <input type="text" class="form-control form-control-user" id="exampleFirstName" disabled="" value="<?= $mapel->nama_mapel ?>">
               </div>
                <div class="form-group row">
                 <div>  
                 <label class="m-0 font-weight-bold text-primary"> Jenis Nilai</label ></div>
                 <select class="form-control" name="jenis">
                  <option value="Tugas">Tugas</option>
                  <option value="Ulangan Harian">Ulangan Harian</option>
                  <option value="Mid">Mid</option>
                  <option value="Ulangan Umum">Ulangan Umum</option>
                  </select>
                </div>
                
                 <div class="form-group row">
                 <div>  
                 <label class="m-0 font-weight-bold text-primary"> Nilai</label ></div>
                 <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="..." name="nilai">
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