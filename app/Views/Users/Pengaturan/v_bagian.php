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
                <li class="breadcrumb-item"><a href="/bagian">Bagian</a></li>
                <li class="breadcrumb-item active">Home</li>
              </ol>
            </div>
          </div>
          <!--End Of Page Heading-->

          <!--Content Row-->
          <div class="row">
            <div class="col-12 mb-4">
              <div class="card card-secondary shadow">
                <div class="card-header">
                  <i class="fa fa-puzzle-piece"></i>
                  <b> Data Bagian</b>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <a href="/bagian/create" class="btn btn-sm btn-add">+ <i class="fa fa fa-puzzle-piece">
                      </i>
                      Tambah Bagian</a>
                    <hr>
                    <?php if(session()->getFlashdata('msg')) : ?>
                      <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('msg'); ?>
                      </div>
                    <?php endif; ?>
                    <table class="table table-bordered table-sm " id="dataTables" width="100%">
                      <thead class="thead-bg-gradient-info text-white text-center">
                        <tr>
                          <th width="30px;">No.</th>
                          <th>Nama Bagian</th>
                          <th class="text-center" width="130">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $i = 1; ?>
                      <?php foreach($bagian as $bg) : ?>
                        <tr>
                          <td><?= $i++ ; ?></td>
                          <td><?= $bg['nama_bagian']; ?></td>
                          <td class="text-center">
                            <a href="/bagian/edit/<?= $bg['id_bagian']; ?>" class="btn bg-gradient-info btn-sm"><i class="fa fa-pencil-alt"></i></a>
                            <form action="/bagian/<?= $bg['id_bagian']; ?>" method="post" class="d-inline">
                              <?= csrf_field(); ?>
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" class="btn bg-gradient-warning btn-sm" onclick="return confirm('Apakah Anda yakin?')">
                              <i class="fa fa-trash-alt"></i></button>
                            </form>
                            
                          </td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <!-- End of Main Content -->
        <?=$this->endSection();?>