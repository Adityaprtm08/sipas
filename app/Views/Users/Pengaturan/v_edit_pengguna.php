        <?=$this->extend("Users/Layout/v_header_footer");?>

        <?=$this->section("page-content");?>

        <!--Page Content-->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="row">
            <div class="col-sm-6">
              <h4 class="m-0 text-gray-700">Pengguna</h4>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/pengguna">Pengguna</a></li>
                <li class="breadcrumb-item"><a href="/pengguna/edit/<?= $pengguna['id_user']; ?>">Edit</a></li>
                <li class="breadcrumb-item active">Id Pengguna : #<?= $pengguna['id_user']; ?></li>
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
                  <b> Edit Pengguna</b>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" action="/pengguna/update/<?= $pengguna['id_user']; ?>" enctype="multipart/form-data" method="post">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="fotoLama" value="<?= $pengguna['foto_profil'];?>">
                  <div class="form-group row">
                      <label class="control-label col-lg-3">Level</label>
                      <div class="col-lg-9">
                        <select class="form-control <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?>" style="font-size: .85rem;" name="level"  autofocus >
                          <option value="<?= $pengguna['level']; ?>">
                            <?php 
                            if ($pengguna['level'] == 'admin')
                            {
                              echo 'Admin';
                            }
                            else{
                              echo 'User';
                            }?></option>
                          <option value="admin">Admin</option>
                          <option value="user">User</option>
                        </select>
                        <div class="invalid-feedback">
                          <?= $validation->getError('level');?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-lg-3">Nama Lengkap</label>
                      <div class="col-lg-9">
                        <input type="text" name="nama_lengkap" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : ''; ?>" value="<?= $pengguna['nama_lengkap']; ?>" placeholder="Masukkan Nama Lengkap" maxlength="100">
                        <div class="invalid-feedback">
                          <?= $validation->getError('nama_lengkap');?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-lg-3">Username</label>
                      <div class="col-lg-9">
                        <input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" value="<?= $pengguna['username']; ?>" placeholder="Masukkan Username" maxlength="100" >
                        <div class="invalid-feedback">
                          <?= $validation->getError('username');?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-lg-3">E-mail</label>
                      <div class="col-lg-9">
                        <input type="text" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" value="<?= $pengguna['email']; ?>" placeholder="Masukan E-mail" >
                        <div class="invalid-feedback">
                          <?= $validation->getError('email');?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-lg-3">Bagian</label>
                      <div class="col-lg-9">
                        <select class="form-control <?= ($validation->hasError('bagian')) ? 'is-invalid' : ''; ?>" name="id_bagian">
                          <option value="<?= $pengguna['id_bagian']?>"><?= $pengguna['nama_bagian']?></option>
                          <?php foreach($bagian as $key => $value){ ?>
                            <option value="<?= $value['id_bagian']?>"><?= $value['nama_bagian']?></option>
                          <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                          <?= $validation->getError('id_bagian'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-lg-3">Alamat</label>
                      <div class="col-lg-9">
                        <textarea name="alamat" rows="3" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Alamat" ><?= $pengguna['alamat']; ?></textarea>
                        <div class="invalid-feedback">
                          <?= $validation->getError('alamat'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-lg-3">Telepon</label>
                      <div class="col-lg-9">
                        <input type="text" name="telepon" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Telepon" maxlength="12" value="<?= $pengguna['telepon']; ?>">
                        <div class="invalid-feedback">
                          <?= $validation->getError('telepon'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-lg-3">Foto Profile</label>
                      <div class="col-lg-2">
                        <img src="/img/profile/<?= $pengguna['foto_profil']; ?>" class="img-thumbnail img-preview">
                      </div>
                      <div class="col-lg-7">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input <?= ($validation->hasError('foto_profil')) ? 'is-invalid' : ''; ?>" name="foto_profil" id="foto_profil" onchange="previewImg()">
                          <div class="invalid-feedback">
                            <?= $validation->getError('foto_profil'); ?>
                          </div>
                          <label class="custom-file-label" for="foto_profil"><?= $pengguna['foto_profil']; ?></label>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <a href="/pengguna" class="btn btn-sm btn-back">Kembali</a>
                    <button type="submit" name="btnupdate" class="btn btn-sm btn-submit" style="float:right;">Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <!-- End of Main Content -->
        <?=$this->endSection();?>