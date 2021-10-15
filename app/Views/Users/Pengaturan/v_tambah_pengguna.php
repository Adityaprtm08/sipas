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
                <li class="breadcrumb-item active">Tambah</li>
              </ol>
            </div>
          </div>
          <!--End Of Page Heading-->

          <!--Content Row-->
          <div class="row justify-content-center">
            <div class="col-md-6 mb-4">
              <div class="card card-secondary shadow">
                <div class="card-header">
                  <i class="fa fa-user-plus"></i>
                  <b> Tambah Pengguna</b>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" action="/pengguna/save" enctype="multipart/form-data" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                      <label class="control-label col-lg-3">Level</label>
                      <div class="col-lg-9">
                        <select class="form-control <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?>" style="font-size: .85rem;" name="level" autofocus >
                          <option <?= old('level') == '' ? 'selected' : '' ?> value= ''>- Pilih Level -</option>
                          <option <?= old('level') == 'admin' ? 'selected' : '' ?> value="admin">Admin</option>
                          <option <?= old('level') == 'user' ? 'selected' : '' ?> value="user">User</option>
                        </select>
                        <div class="invalid-feedback">
                          <?= $validation->getError('level');?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-lg-3">Nama Lengkap</label>
                      <div class="col-lg-9">
                        <input type="text" name="nama_lengkap" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : ''; ?>" value="<?= old('nama_lengkap'); ?>" placeholder="Masukkan Nama Lengkap" maxlength="100">
                        <div class="invalid-feedback">
                          <?= $validation->getError('nama_lengkap');?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-lg-3">Username</label>
                      <div class="col-lg-9">
                        <input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" value="<?= old('username'); ?>" placeholder="Masukkan Username" maxlength="100" >
                        <div class="invalid-feedback">
                          <?= $validation->getError('username');?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-lg-3">Password</label>
                      <div class="col-lg-9">
                        <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" value="<?= old('password'); ?>" placeholder="Masukkan Password" >
                        <div class="invalid-feedback">
                          <?= $validation->getError('password');?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-lg-3">E-mail</label>
                      <div class="col-lg-9">
                        <input type="text" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" value="<?= old('email'); ?>" placeholder="Masukan E-mail" >
                        <div class="invalid-feedback">
                          <?= $validation->getError('email');?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-lg-3">Bagian</label>
                      <div class="col-lg-9">
                        <select class="form-control <?= ($validation->hasError('id_bagian')) ? 'is-invalid' : ''; ?>" name="id_bagian" >
                          <option value="">- Pilih Bagian -</option>
                          <?php foreach($bagian as $bg){ ?>
                            <option value="<?= $bg['id_bagian']?>" <?= old('id_bagian') == $bg['id_bagian'] ? 'selected' : ''; ?>><?= $bg['nama_bagian']?></option>
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
                        <textarea name="alamat" rows="3" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Alamat" ><?= old('alamat'); ?></textarea>
                        <div class="invalid-feedback">
                          <?= $validation->getError('alamat'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-lg-3">Telepon</label>
                      <div class="col-lg-9">
                        <input type="text" name="telepon" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>" value="<?= old('telepon'); ?>" placeholder="Masukkan Telepon" maxlength="30" >
                        <div class="invalid-feedback">
                          <?= $validation->getError('telepon'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-lg-3">Foto Profile</label>
                      <div class="col-lg-2">
                        <img src="/img/profile/default.png" class="img-thumbnail img-preview">
                      </div>
                      <div class="col-lg-7">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input <?= ($validation->hasError('foto_profil')) ? 'is-invalid' : ''; ?>" name="foto_profil" id="foto_profil" onchange="previewImg()">
                          <div class="invalid-feedback">
                            <?= $validation->getError('foto_profil'); ?>
                          </div>
                          <label class="custom-file-label" for="foto_profil">Pilih Gambar...</label>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <a href="/pengguna" class="btn btn-sm btn-back">
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
        <br>
        <!-- End of Main Content -->
        <?=$this->endSection();?>