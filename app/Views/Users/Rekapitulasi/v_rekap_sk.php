        <?= $this->extend("Users/Layout/v_header_footer"); ?>

        <?= $this->section("page-content"); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="row">
            <div class="col-sm-6">
              <h4 class="m-0 text-gray-700">Rekapitulasi Surat Keluar</h4>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/rekapsk">Rekapitulasi Surat Keluar</a></li>
                <li class="breadcrumb-item active">Home</li>
              </ol>
            </div>
          </div>

          <!--Content Row-->
          <div class="row">
            <div class="col-12">
              <div class="card card-secondary shadow">
                <div class="card-header">
                  <i class="fa fa-print"></i>
                  <b> Rekapitulasi Surat Keluar</b>
                </div>
                <div class="card-body">
                  <form class="form-inline" action="/rekapsk/data_sk" method="post">
                    <?= csrf_field(); ?>  
                    <div class="col-sm">
                      <div class="form-group">Dari Tanggal : 
                        <div class="input-group">
                          <div class="input-group-addon"><i class="icon-calendar22"></i></div>
                          <input type="date" name="tanggalawal" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="form-group">Sampai Tanggal : 
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar-o"></i></div>
                          <input type="date" name="tanggalakhir" class="form-control " required>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm">
                      <button type="submit" name="datalaporan" class="btn btn-sm btn-block btn-submit">Cari</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--End of Container Fluid-->
        </div>
        <!-- End of Main Content -->
        <?= $this->endSection(); ?>