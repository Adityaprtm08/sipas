        <?=$this->extend("Users/Layout/v_header_footer");?>

        <?= $this->section("page-content"); ?>

        <!--Page Content-->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="row">
            <div class="col-sm-6">
              <h4 class="m-0 text-gray-700">Surat Keluar</h4>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/sk">Surat Keluar</a></li>
                <li class="breadcrumb-item"><a href="/sk/detail/<?= $suratkeluar['id_sk']; ?>">Detail</a></li>
                <li class="breadcrumb-item active">No surat : <?= $suratkeluar['nomor_surat']; ?></li>
              </ol>
            </div>
          </div>
          <!--End Of Page Heading-->

          <!--Content Row-->
          <div class="row justify-content-center">
            <div class="col-md-7 mb-4">
              <div class="card card-secondary shadow">
                <div class="card-header">
                  <i class="fa fa-file-upload"></i>
                  <b> Detail Surat Keluar</b>
                </div>
                <div class="card-body">
                  <div class="row" align="center">
                    <div class="col-lg-3 mt-2">
                      <div class="panel-body">
                        <a href="/sk/download/<?= $suratkeluar['id_sk']; ?>" target="_blank" title="<?= $suratkeluar['lampiran'] ;?>" class="btn btn-lg btn-outline-secondary">
                        <i class="fa fa-file-alt fa-4x text-primary"></i>
                        </a>							
                      </div>
                      <div class="mt-2">
                        <a href="/sk/download/<?= $suratkeluar['id_sk']; ?>" class="btn btn-block btn-sm btn-outline-secondary"><?= $suratkeluar['nomor_surat']; ?></a>
                      </div>
                    </div>
                    <div class="col-lg-9">
                      <div class="row justify-content-center">
                        <div class="table-responsive table-sm">
                          <table width="95%">
                            <thead>
                              <tr>
                                <th width="30%"><span class="badge badge-pill badge-dark pull-right"># Detail Surat Keluar</span></th>
                                <th width="2%"><b></b></th>
                                <th >
                                  <h4><?= $suratkeluar['nomor_surat']; ?></h4>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="highlight">
                                <th class="pull-right text-gray-700">Tanggal Surat</th>
                                <td></td>
                                <td><i class="fa fa-calendar-alt fa-lg m-r-5 text-warning"></i> <?= tanggal_default($suratkeluar['tanggal_surat']); ?></td>
                              </tr>
                              <tr>
                                <th class="pull-right text-gray-700">Tanggal Kirim</th>
                                <td></td>
                                <td><i class="fa fa-calendar-alt fa-lg m-r-5 text-warning"></i> <?= tanggal_default($suratkeluar['tanggal_kirim']); ?></td>
                              </tr>
                              <tr>
                                <th class="pull-right text-gray-700">Nomor Agenda</th>
                                <td></td>
                                <td><?= $suratkeluar['nomor_agenda']; ?></td>
                              </tr>
                              <tr>
                                <th class="pull-right text-gray-700"><b>Sifat Surat</b></th>
                                <td></td>
                                <td><?= $suratkeluar['sifat_surat']; ?></td>
                              </tr>
                              <tr>
                                <th class="pull-right text-gray-700"><b>Pengirim</b></th>
                                <td></td>
                                <td><?= $suratkeluar['nama_bagian']; ?></td>
                              </tr>
                              <tr>
                                <th class="pull-right text-gray-700"><b>Penerima</b></th>
                                <td></td>
                                <td><?= $suratkeluar['penerima']; ?></td>
                              </tr>
                              <tr>
                                <th class="pull-right text-gray-700"><b>Perihal</b></th>
                                <td></td>
                                <td><?= $suratkeluar['perihal']; ?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <a href="/sk" class="btn btn-sm btn-back">Kembali</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <!-- End of Main Content -->
        <?= $this->endSection(); ?>