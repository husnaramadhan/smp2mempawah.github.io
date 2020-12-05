 <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
        
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Form .. </h1>
              </div>
              <form class="user" action="<?php echo site_url('admin/mengampu_mapel/proses') ?>" method="POST">
                <div class="form-group row">
                 <div>  
                 <label class="m-0 font-weight-bold text-primary"> Nama Guru : </label ></div>
                 <select class="form-control" name="id_guru">
                  <?php foreach ($guru->result() as $key): ?>
                    <option value="<?= $key->id ?>"> <?= $key->nama ?></option>  
                  <?php endforeach ?>
                  
                 </select>
                </div>
                <div class="form-group row">
                 <div>  
                 <label class="m-0 font-weight-bold text-primary"> Kelas : </label ></div>
                 <select class="form-control" name="id_kelas">
                  <?php foreach ($kelas->result() as $key): ?>
                    <option value="<?= $key->id ?>"> <?= $key->nama ?></option>  
                  <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group row">
                 <div>  
                 <label class="m-0 font-weight-bold text-primary"> Mapel : </label ></div>
                 <select class="form-control" name="id_mapel">
                  <?php foreach ($mapel->result() as $key): ?>
                    <option value="<?= $key->id ?>"> <?= $key->nama_mapel ?></option>  
                  <?php endforeach ?>
                  </select>
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