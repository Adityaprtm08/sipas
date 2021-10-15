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
                <li class="breadcrumb-item active">Home</li>
              </ol>
            </div>
          </div>
          <!--End Of Page Heading-->

          <!--Content Row-->
          <div class="row justify-content-center">
            <div class="col-md-6 mb-4">
            <?php if(session()->getFlashdata('msg')) : ?>
                <div class="alert alert-success" role="alert">
                  <?= session()->getFlashdata('msg'); ?>
                </div>
            <?php endif; ?>
              <div class="card card-secondary shadow">
                <div class="card-header">
                  <i class="fa fa-user-alt"></i>
                  <b> Profile Pengguna</b>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4 mt-2">
                      <center>
                        <img src="/img/profile/<?= $pengguna['foto_profil'];?>" alt="foto-profile" class="img-tumbnail" width="176">
                      </center>
                    </div>
                    <div class="col-lg-8">
                      <div class="row">
                        <div class="table-responsive table-sm">
                          <table width="100%">
                          <tr>
                            <th width="30%"><b>Username</b></th>
                            <td width="5%"><b>:</b></td>
                            <td><?= $pengguna['username'];?></td>
                          </tr>
                          <tr>
                            <th><b>Nama Lengkap</b></th>
                            <td><b>:</b></td>
                            <td><?= $pengguna['nama_lengkap'];?></td>
                          </tr>
                          <tr>
                            <th><b>Email</b></th>
                            <td><b>:</b></td>
                            <td><?= $pengguna['email'];?></td>
                          </tr>
                          <tr>
                            <th><b>Level</b></th>
                            <td><b>:</b></td>
                            <td><?= $pengguna['level'];?></td>
                          </tr>
                          <tr>
                            <th><b>Bagian</b></th>
                            <td><b>:</b></td>
                            <td><?= $pengguna['nama_bagian'];?></td>
                          </tr>
                          <tr>
                            <th class="align-text-top"><b>Alamat</b></th>
                            <td class="align-text-top"><b>:</b></td>
                            <td class="align-text-top"><?= $pengguna['alamat'];?></td>
                          </tr>
                          <tr>
                            <th><b>Telepon</b></th>
                            <td><b>:</b></td>
                            <td><?= $pengguna['telepon'];?></td>
                          </tr>
                          </table>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 mb-1">
                          <a href="/profile/edit" class="btn btn-block btn-sm btn-submit" >
                            <i class="fas fa-user-edit  fa-sm fa-fw mr-2"></i>
                            Edit Profile
                          </a>
                        </div>
                        <div class="col-lg-6">
                          <a href="/profile/editpassword" class="btn btn-block btn-sm btn-submit">
                            <i class="fas fa-lock fa-sm fa-fw mr-2"></i>
                            Ganti Password
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <!-- End of Main Content -->
        <?=$this->endSection();?>