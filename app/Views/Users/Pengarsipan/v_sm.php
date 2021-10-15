        <?=$this->extend("Users/Layout/v_header_footer");?>

        <?=$this->section("page-content");?>

        <!--Page Content-->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="row">
            <div class="col-sm-6">
              <h4 class="m-0 text-gray-700">Surat Masuk</h4>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/sm">Surat Masuk</a></li>
                <li class="breadcrumb-item active">Home</li>
              </ol>
            </div>
          </div>
          <!--End Of Page Heading-->

          <!--Content Row-->
          <div class="row">
            <div class="col-12">
              <div class="card card-secondary shadow">
                <div class="card-header">
                  <i class="fas fa-mail-bulk mr-1"></i>
                  <b> Data Surat Masuk</b>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                  <?php if(session()->get('level') == 'admin') { ?>
                    <a href="/sm/create" class="btn btn-sm btn-add">+ <i class="fa fa-file-download"> </i>
                      Tambah Surat Masuk</a>
                    <hr>
                    <?php if(session()->getFlashdata('msg')) : ?>
                      <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('msg'); ?>
                      </div>
                    <?php endif; ?>
                  <?php } ?>
                    <table class="table table-bordered table-sm" id="dataTables" width="100%">
                      <thead class="thead-bg-gradient-info text-white text-center">
                        <tr>
                          <th width="30px;">No.</th>
                          <th>Nomor surat</th>
                          <th>Tanggal Surat</th>
                          <th>Tanggal Terima</th>
                          <th>Nomor Agenda</th>
                          <th>Sifat Surat</th>
                          <th>Pengirim</th>
                          <th>Disposisi Ke</th>
                          <th class="text-center" width="130">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $i = 1; ?>
                      <?php foreach($suratmasuk as $sm) : ?>
                        <tr>
                          <td><?= $i++ ;?></td>
                          <td><?= $sm['nomor_surat']; ?></td>
                          <td><?= tanggal_default($sm['tanggal_surat']); ?></td>
                          <td><?= tanggal_default($sm['tanggal_terima']); ?></td>                   
                          <td><?= $sm['nomor_agenda']; ?></td>
                          <td><?= $sm['sifat_surat']; ?></td>
                          <td><?= $sm['pengirim']; ?></td>
                          <td><?= $sm['nama_bagian']; ?></td>
                          <td class="text-center">
                            <a href="/sm/detail/<?= $sm['id_sm']; ?>" class="btn bg-gradient-secondary btn-sm"><i class="fa fa-eye"></i></a>
                            <?php if(session()->get('level') == 'admin') { ?>
                              <a href="/sm/edit/<?= $sm['id_sm']; ?>" class="btn bg-gradient-info btn-sm"><i class="fa fa-pencil-alt"></i></a>
                              <form action="/sm/<?= $sm['id_sm']; ?>" method="post" class="d-inline">
                              <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn bg-gradient-warning btn-sm" onclick="return confirm('Apakah Anda yakin?')">
                                <i class="fa fa-trash-alt"></i></button>
                              </form>
                            <?php } ?>
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