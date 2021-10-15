        <?=$this->extend("Users/Layout/v_header_footer");?>

        <?=$this->section("page-content");?>


        <!--Page Content-->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="row">
            <div class="col-sm-6">
              <h4 class="m-0 text-gray-700">Bagian</h4>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/Bagian">Bagian</a></li>
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
                  <b> Tambah Bagian</b>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" action="/Bagian/Save" enctype="multipart/form-data" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                      <label class="control-label col-lg-3">Nama Bagian</label>
                      <div class="col-lg-9">
                        <input type="text" name="nama_bagian" class="form-control <?= ($validation->hasError('nama_bagian')) ? 'is-invalid' : ''; ?>" value="" placeholder="Nama Bagian" autofocus>
                        <div class="invalid-feedback">
                          <?= $validation->getError('nama_bagian');?>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <a href="/Bagian" class="btn btn-sm btn-back">
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