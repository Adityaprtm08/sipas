        <?=$this->extend("Users/Layout/v_header_footer");?>

        <?=$this->section("page-content");?>
        <!--Page Content-->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="row">
            <div class="col-sm-6">
              <h4 class="m-0 text-gray-700">Profile</h4>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/profile">Profile</a></li>
                <li class="breadcrumb-item active">Edit</li>
              </ol>
            </div>
          </div>
          <!--End Of Page Heading-->

          <!--Content Row-->
          <div class="row justify-content-center">
            <div class="col-md-6 mb-4">
              <div class="card card-secondary shadow">
                <div class="card-header">
                  <i class="fa fa-user-edit"></i>
                  <b> Edit Profile</b>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" action="/profile/update/<?= $pengguna['id_user']; ?>" enctype="multipart/form-data" method="post">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="fotoLama" value="<?= $pengguna['foto_profil'];?>">
                    <div class="form-group">
                      <label class="form-label">Username</label>
                      <input type="text" name="username" class="form-control" value="<?= $pengguna['username']; ?>" placeholder="Nama Pengguna" readonly>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Nama Lengkap</label>
                      <input type="text" name="nama_lengkap" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : ''; ?>" value="<?= $pengguna['nama_lengkap']; ?>" placeholder="Masukkan Nama Lengkap" maxlength="100">
                      <div class="invalid-feedback">
                        <?= $validation->getError('nama_lengkap');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="InputEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" value="<?= $pengguna['email']; ?>" placeholder="Masukan E-mail" >
                      <div class="invalid-feedback">
                        <?= $validation->getError('email');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Level</label>
                      <input type="text" name="" class="form-control" value="<?= $pengguna['level']; ?>" placeholder="Level User" readonly>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Bagian</label>
                      <input type="text" class="form-control" name="bagian" value="<?= $pengguna['nama_bagian']; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Alamat</label>
                      <textarea name="alamat" rows="3" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Alamat" ><?= $pengguna['alamat']; ?></textarea>
                      <div class="invalid-feedback">
                        <?= $validation->getError('alamat'); ?>
                      </div>                   
                    </div>
                    <div class="form-group">
                      <label class="form-label">Telepon</label>
                      <input type="text" name="telepon" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Telepon" maxlength="12" value="<?= $pengguna['telepon']; ?>">
                      <div class="invalid-feedback">
                        <?= $validation->getError('telepon'); ?>
                      </div>                    
                    </div>
                    <div class="form-group">
                      <label class="control-label">Foto Profile</label>
                      <div class="row">
                        <div class="col-lg-3">
                          <img src="/img/profile/<?= $pengguna['foto_profil']; ?>" class="img-thumbnail img-preview">
                        </div>
                        <div class="col-lg-9">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('foto_profil')) ? 'is-invalid' : ''; ?>" name="foto_profil" id="foto_profil" onchange="previewImg()">
                            <div class="invalid-feedback">
                              <?= $validation->getError('foto_profil'); ?>
                            </div>
                            <label class="custom-file-label" for="foto_profil"><?= $pengguna['foto_profil']; ?></label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <a href="/profile" class="btn btn-sm btn-back">
                      Kembali</a>
                    <button type="submit" class="btn btn-sm btn-submit" style="float:right;">
                      Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <!-- End of Main Content -->
        <?=$this->endSection();?>