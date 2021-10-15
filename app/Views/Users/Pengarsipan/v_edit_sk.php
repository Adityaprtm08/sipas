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
                <li class="breadcrumb-item"><a href="/sk/edit/<?= $suratkeluar['id_sk']; ?>">Edit</a></li>
                <li class="breadcrumb-item active">No surat : <?= $suratkeluar['nomor_surat']; ?></li>
              </ol>
            </div>
          </div>
          <!--End Of Page Heading-->

          <!--Content Row-->
          <div class="row justify-content-center">
            <div class="col-md-6 mb-4">
              <div class="card card-secondary shadow">
                <div class="card-header">
                  <i class="fa fa-file-upload"></i>
                  <b> Edit Surat Keluar</b>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" action="/sk/update/<?= $suratkeluar['id_sk'] ;?>" enctype="multipart/form-data" method="post">
                    <?= csrf_field(); ?>  
                    <input type="hidden" name="lampiranLama" value="<?= $suratkeluar['lampiran'];?>">
                      <div class="form-group row">
                        <label class="control-label col-lg-3">Nomor Surat</label>
                        <div class="col-lg-9">
                          <input type="text" name="nomor_surat" id="nomor_surat" class="form-control <?= ($validation->hasError('nomor_surat')) ? 'is-invalid' : ''; ?>" value="<?= $suratkeluar['nomor_surat']; ?>" placeholder="Masukkan Nomor Surat">
                          <div class="invalid-feedback">
                            <?= $validation->getError('nomor_surat'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-lg-3">Tanggal Surat</label>
                        <div class="col-lg-9">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar-o"></i></div>
                            <input type="date" name="tanggal_surat" class="form-control <?= ($validation->hasError('tanggal_surat')) ? 'is-invalid' : ''; ?> daterange-single" value="<?= ($suratkeluar['tanggal_surat']); ?>" maxlength="10" placeholder="Masukkan Tanggal Surat">
                            <div class="invalid-feedback">
                              <?= $validation->getError('tanggal_surat');?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-lg-3">Tanggal Kirim</label>
                        <div class="col-lg-9">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar-o"></i></div>
                            <input type="date" name="tanggal_kirim" class="form-control <?= ($validation->hasError('tanggal_kirim')) ? 'is-invalid' : ''; ?> daterange-single" value="<?= ($suratkeluar['tanggal_kirim']); ?>" maxlength="10" placeholder="Masukkan Tanggal Kirim Surat">
                            <div class="invalid-feedback">
                              <?= $validation->getError('tanggal_kirim');?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-lg-3">Nomor Agenda</label>
                        <div class="col-lg-9">
                          <input type="text" name="nomor_agenda" id="nomor_agenda" class="form-control <?= ($validation->hasError('nomor_agenda')) ? 'is-invalid' : ''; ?>" value="<?= $suratkeluar['nomor_agenda']; ?>" placeholder="Masukkan Nomor Agenda">
                          <div class="invalid-feedback">
                            <?= $validation->getError('nomor_agenda'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-lg-3">Sifat Surat</label>
                        <div class="col-lg-9">
                          <select class="form-control <?= ($validation->hasError('sifat_surat')) ? 'is-invalid' : ''; ?>" name="sifat_surat" id="sifat_surat">
                            <option value="<?= $suratkeluar['sifat_surat']; ?>">
                              <?php 
                              if ($suratkeluar['sifat_surat'] == 'Biasa')
                              {
                                echo 'Biasa';
                              }
                              else{
                                echo 'Penting';
                              }?></option>
                            <option value="Biasa">Biasa</option>
                            <option value="Penting">Penting</option>
                          </select>
                          <div class="invalid-feedback">
                            <?= $validation->getError('sifat_surat');?>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-lg-3">Pengirim</label>
                        <div class="col-lg-9">
                          <select class="form-control <?= ($validation->hasError('id_bagian')) ? 'is-invalid' : ''; ?>" name="id_bagian" >
                            <option value="<?= $suratkeluar['id_bagian']?>"><?= $suratkeluar['nama_bagian']?></option>
                            <?php foreach($bagian as $key => $value){ ?>
                              <option value="<?= $value['id_bagian']?>"><?= $value['nama_bagian']?></option>
                            <?php } ?>
                          </select>
                          <div class="invalid-feedback">
                            <?= $validation->getError('id_bagian'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-lg-3">Penerima</label>
                        <div class="col-lg-9">
                          <input type="text" name="penerima" id="penerima" class="form-control <?= ($validation->hasError('penerima')) ? 'is-invalid' : ''; ?>" value="<?= $suratkeluar['penerima']; ?>" placeholder="Masukkan Penerima Surat">
                          <div class="invalid-feedback">
                            <?= $validation->getError('penerima');?>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-lg-3">Perihal</label>
                        <div class="col-lg-9">
                          <input type="text" name="perihal" id="perihal" class="form-control <?= ($validation->hasError('perihal')) ? 'is-invalid' : ''; ?>" value="<?= $suratkeluar['perihal']; ?>" placeholder="Masukkan Perihal Surat">
                          <div class="invalid-feedback">
                            <?= $validation->getError('perihal');?>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-lg-3">Lampiran</label>
                        <div class="col-lg-9">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('lampiran')) ? 'is-invalid' : ''; ?>" id="lampiran" name="lampiran" onchange="previewFile()">
                            <label class="custom-file-label" for="customFile"><?= $suratkeluar['lampiran']; ?></label>
                            <div class="invalid-feedback">
                              <?= $validation->getError('lampiran');?>
                            </div>
                          </div>
                        </div>
                      </div>
                    <hr>
                    <a href="/sk" class="btn btn-sm btn-back">Kembali</a>
                    <button type="submit" class="btn btn-sm btn-submit" style="float:right;">Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <!-- End of Main Content -->
        <?= $this->endSection(); ?>