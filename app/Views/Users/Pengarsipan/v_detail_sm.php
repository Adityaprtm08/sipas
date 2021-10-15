        <?=$this->extend("Users/Layout/v_header_footer");?>

        <?= $this->section("page-content"); ?>

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
                <li class="breadcrumb-item"><a href="/sm/detail/<?= $suratmasuk['id_sm']; ?>">Detail</a></li>
                <li class="breadcrumb-item active">No surat : <?= $suratmasuk['nomor_surat']; ?></li>
              </ol>
            </div>
          </div>
          <!--End Of Page Heading-->

          <!--Content Row-->
          <div class="row justify-content-center">
            <div class="col-md-7 mb-4">
              <div class="card card-secondary shadow">
                <div class="card-header">
                  <i class="fa fa-file-download"></i>
                  <b> Detail Surat Masuk</b>
                </div>
                <div class="card-body">
                  <div class="row" align="center">
                    <div class="col-lg-3 mt-2">
                      <div class="panel-body">
                        <a href="/sm/download/<?= $suratmasuk['id_sm']; ?>" target="_blank" title="<?= $suratmasuk['lampiran'] ;?>" class="btn btn-lg btn-outline-secondary">
                        <i class="fa fa-file-alt fa-4x text-primary"></i>
                        </a>							
                      </div>
                      <div class="mt-2">
                        <a href="/sm/download/<?= $suratmasuk['id_sm']; ?>" class="btn btn-block btn-sm btn-outline-secondary"><?= $suratmasuk['nomor_surat']; ?></a>
                      </div>
                    </div>
                    <div class="col-lg-9">
                      <div class="row justify-content-center">
                        <div class="table-responsive table-sm">
                          <table width="95%">
                            <thead>
                              <tr>
                                <th width="30%"><span class="badge badge-pill badge-dark pull-right"># Detail Surat Masuk</span></th>
                                <th width="2%"><b></b></th>
                                <th >
                                  <h4><?= $suratmasuk['nomor_surat']; ?></h4>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="highlight">
                                <th class="pull-right text-gray-700">Tanggal Surat</th>
                                <td></td>
                                <td><i class="fa fa-calendar-alt fa-lg m-r-5 text-warning"></i> <?= tanggal_default($suratmasuk['tanggal_surat']); ?></td>
                              </tr>
                              <tr>
                                <th class="pull-right text-gray-700">Tanggal Terima</th>
                                <td></td>
                                <td><i class="fa fa-calendar-alt fa-lg m-r-5 text-warning"></i> <?= tanggal_default($suratmasuk['tanggal_terima']); ?></td>
                              </tr>
                              <tr>
                                <th class="pull-right text-gray-700">Nomor Agenda</th>
                                <td></td>
                                <td><?= $suratmasuk['nomor_agenda']; ?></td>
                              </tr>
                              <tr>
                                <th class="pull-right text-gray-700"><b>Sifat Surat</b></th>
                                <td></td>
                                <td><?= $suratmasuk['sifat_surat']; ?></td>
                              </tr>
                              <tr>
                                <th class="pull-right text-gray-700"><b>Pengirim</b></th>
                                <td></td>
                                <td><?= $suratmasuk['pengirim']; ?></td>
                              </tr>
                              <tr>
                                <th class="pull-right text-gray-700"><b>Perihal</b></th>
                                <td></td>
                                <td><?= $suratmasuk['perihal']; ?></td>
                              </tr>
                              <tr>
                                <th class="pull-right text-gray-700"><b>Disposisi Ke</b></th>
                                <td></td>
                                <td><?= $suratmasuk['nama_bagian']; ?></td>
                              </tr>
                              <tr>
                                <th class="pull-right text-gray-700"><b>Isi Disposisi</b></th>
                                <td></td>
                                <td><?= $suratmasuk['isi_disposisi']; ?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <a href="/sm" class="btn btn-sm btn-back">Kembali</a>
                  <?php if(($suratmasuk['id_bagian'] != 0) && (session()->get('level') == 'admin')){ ?>
                    <a class="btn btn-sm btn-submit" href="#" style="float:right;" data-toggle="modal" data-target="#disposisimodal">Lihat Disposisi</a>
                  <?php }  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <!-- End of Main Content -->
        <!-- Modal Disposisi -->
        <div class="modal fade" id="disposisimodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Disposisi Surat Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              </div>
              <form class="" action="" method="post">
                <div class="modal-body">
                  <div class="invoice">
                    <div class="invoice-company">
                      <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;No. Surat : <?= $suratmasuk['nomor_surat']; ?></div>
                    <div class="invoice-header">
                      <div class="invoice-col1">
                        <address class="m-t-5 m-b-5">
                          Asal Surat<br />
                          <b><?= $suratmasuk['pengirim']; ?></b>
                        </address>
                        <address class="m-t-5 m-b-5">
                          Tanggal Surat<br/>
                          <b><?= tanggal_default($suratmasuk['tanggal_surat']); ?></b>
                        </address>
                        <address class="m-t-5 m-b-5">
                          Sifat Surat<br />
                          <b><?= $suratmasuk['sifat_surat']; ?></b>
                        </address>
                      </div>
                      <div class="invoice-col2">
                        <address class="m-t-5 m-b-5">
                          Tanggal Terima<br />
                          <b><?= tanggal_default($suratmasuk['tanggal_terima']); ?></b>
                        </address>
                        <address class="m-t-5 m-b-5">
                          Nomor Agenda<br />
                          <b><?= $suratmasuk['nomor_agenda']; ?></b>
                        </address>
                        <address class="m-t-5 m-b-5">
                          Perihal<br />
                          <b><?= $suratmasuk['perihal']; ?></b>
                        </address>
                      </div>
                      <div class="invoice-col3">
                        <address class="m-t-5 m-b-5">
                          Disposisi ke<br />
                          <b><?= $suratmasuk['nama_bagian']; ?></b>
                        </address>
                        <address class="m-t-5 m-b-5">
                          Isi Disposisi<br />
                          <b><?= $suratmasuk['isi_disposisi']; ?></b>
                        </address>
                      </div>
                    </div>
                    <div class="invoice-footer text-muted">
                      <p class="text-center mt-1">-- SELAMAT BERTUGAS --</p>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <a href="/sm/cetak_disposisi/<?= $suratmasuk['id_sm'];?>" name="btndisposisi" class="btn btn-sm btn-submit" target="_blank"><i class="fa fa-print"></i> Cetak Lembar Disposisi</a>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End of Modal Disposisi -->
        <?= $this->endSection(); ?>