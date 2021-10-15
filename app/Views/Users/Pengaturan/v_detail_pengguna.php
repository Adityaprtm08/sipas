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
                <li class="breadcrumb-item"><a href="/pengguna/detail/<?= $pengguna['id_user']; ?>">Detail</a></li>
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
                  <i class="fa fa-user-alt"></i>
                  <b> Detail Pengguna</b>
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
                    </div>
                  </div>
                  <hr>
                  <a href="/pengguna" class="btn bg-gradient-secondary btn-sm">Kembali</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <!-- End of Main Content -->
        <?=$this->endSection();?>