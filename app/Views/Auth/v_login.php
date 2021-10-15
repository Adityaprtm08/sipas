        <?=$this->extend("Auth/Layout/v_header_footer");?>

        <?=$this->section("content");?>

        <!--Login Form-->
        <div class="card mb-3 my-5 py-3 px-3" id="card-login" style="max-width: 600px;">
          <div class="row no-gutters">
            <div class="col-md-5">
              <img class="card-img" src="<?=base_url();?>/img/logo_sipas.png" alt="gambar_login">
            </div>
            <div class="col-md-7">
              <div class="card-body">
                <h4 class="card-title" style="text-align: center;"><b>LOGIN</b></h4>
                <h6 style="text-align: center;">Selamat Datang!</h6>
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif;?>
                <?php if(session()->getFlashdata('scs')):?>
                    <div class="alert alert-success"><?= session()->getFlashdata('scs') ?></div>
                <?php endif;?>
                <form class="form-horizontal" action="/Auth/ceklogin" method="post">
                  <div class="form-group">
                    <label for="InputUsername">Username</label>
                    <input type="username" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Username" value="<?= old('username')?>" autofocus>
                    <div class="invalid-feedback">
                      <?= $validation->getError('username');?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Password" >
                    <div class="invalid-feedback">
                      <?= $validation->getError('password');?>
                    </div>
                  </div>
                  <button type="submit" class="btn" id="login-btn">Masuk <i class="fas fa-arrow-right"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <br>
        <br>
        <!--End Of Login Form-->

        <?=$this->endSection();?>