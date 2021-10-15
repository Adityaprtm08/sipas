<?=$this->extend("Users/Layout/v_header_footer");?>

        <?= $this->section("page-content"); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="row">
            <div class="col-sm-6">
              <h4 class="m-0 text-gray-700">Rekapitulasi Surat Masuk</h4>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/rekapsm">Rekapitulasi Surat Masuk</a></li>
                <li class="breadcrumb-item active"><?= tanggal_default($tglawal);?> s.d <?= tanggal_default($tglakhir);?></li>
              </ol>
            </div>
          </div>

          <!--Content Row-->
          <div class="row">
            <div class="col-12">
              <div class="card card-secondary shadow">
                <div class="card-header">
                  <i class=" card-title fa fa-database"></i>
                  <b> Data Rekapitulasi Surat Masuk</b>
                </div>
                <div class="card-body">
                  <form action="/rekapsm/cetak_pdf" method="post" target="_blank" > 
                    <input name="tglawal" value="<?=$tglawal;?>" hidden>
                    <input name="tglakhir" value="<?=$tglakhir;?>" hidden>
                    <button type="submit" name="submitcetak" class="btn btn-sm btn-cetak-pdf"><i class="fa fa-file-pdf"></i> Cetak PDF</button>
                  </form>
                  <hr>
                  <div class="table-responsive">
                  <table class="table table-bordered table-sm " id="dataTables" width="100%">
                      <thead class="thead-bg-gradient-info text-white text-center">
                        <tr>
                          <th width="4%">No.</th>
                          <th width="12%">Nomor surat</th>
                          <th width="12%">Tanggal Surat</th>
                          <th width="12%">Tanggal Terima</th>
                          <th width="12%">Nomor Agenda</th>
                          <th width="10%">Sifat Surat</th>
                          <th width="12%">Pengirim</th>
                          <th width="12%">Disposisi</th>
                          <th width="14%">Perihal</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($datasm as $dsm) : ?>
                          <tr>
                            <td><?= $i++ ;?></td>
                            <td><?= $dsm['nomor_surat']; ?></td>
                            <td><?= tanggal_default($dsm['tanggal_surat']); ?></td>
                            <td><?= tanggal_default($dsm['tanggal_terima']); ?></td>
                            <td><?= $dsm['nomor_agenda']; ?></td>
                            <td><?= $dsm['sifat_surat']; ?></td>
                            <td><?= $dsm['pengirim']; ?></td>
                            <td><?= $dsm['nama_bagian']; ?></td>
                            <td><?= $dsm['perihal']; ?></td>
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
        <?= $this->endSection(); ?>