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
                <li class="breadcrumb-item active">Ganti Password</li>
              </ol>
            </div>
          </div>
          <!--End Of Page Heading-->

          <!--Content Row-->
          <div class="row justify-content-center">
            <div class="col-md-6 mb-4">
            <?php if(session()->getFlashdata('msg')) : ?>
                <div class="alert alert-danger" role="alert">
                  <?= session()->getFlashdata('msg'); ?>
                </div>
            <?php endif; ?>
              <div class="card card-secondary shadow">
                <div class="card-header">
                  <i class="fa fa-key"></i>
                  <b> Ganti Password</b>
                </div>
                <div class="card-body">
                  <form action="/profile/updatepassword/<?= $pengguna['id_user']?>" method="post">
                    <div class="form-group">
                      <label for="password" class="form-label">Password Lama</label>
                      <input type="password" class="form-control<?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" value="<?= old('password') ?>" placeholder="Masukkan Password">
                      <div class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                      </div>  
                    </div>
                    <div class="form-group">
                      <label for="newpassword" class="form-label">Password Baru</label>
                      <input type="password" class="form-control<?= ($validation->hasError('newpassword')) ? 'is-invalid' : ''; ?>" name="newpassword" value="<?= old('newpassword') ?>" placeholder="Masukkan Password Baru">
                      <div class="invalid-feedback">
                        <?= $validation->getError('newpassword'); ?>
                      </div>  
                    </div>
                    <div class="form-group">
                      <label for="confirmpassword" class="form-label">Ulangi Password Baru</label>
                      <input type="password" class="form-control<?= ($validation->hasError('confirmpassword')) ? 'is-invalid' : ''; ?>" name="confirmpassword" value="<?= old('confirmpassword') ?>" placeholder="Masukkan Ulang Password Baru">
                      <div class="invalid-feedback">
                        <?= $validation->getError('confirmpassword'); ?>
                      </div>  
                    </div>
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