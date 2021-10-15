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
                <li class="breadcrumb-item"><a href="/sm/edit/<?= $suratmasuk['id_sm']; ?>">Edit</a></li>
                <li class="breadcrumb-item active">No surat : <?= $suratmasuk['nomor_surat']; ?></li>
              </ol>
            </div>
          </div>
          <!--End Of Page Heading-->

          <!--Content Row-->
          <div class="row justify-content-center">
            <div class="col-md-6 mb-4">
              <div class="card card-secondary shadow">
                <div class="card-header">
                  <i class="fa fa-file-download"></i>
                  <b> Edit Surat Masuk</b>
                </div>
                <div class="card-body">
                <form class="form-horizontal" action="/sm/update/<?= $suratmasuk['id_sm'] ;?>" enctype="multipart/form-data" method="post">
                    <?= csrf_field(); ?>  
                    <input type="hidden" name="lampiranLama" value="<?= $suratmasuk['lampiran'];?>">
                      <div class="form-group row">
                        <label class="control-label col-lg-3">Nomor Surat</label>
                        <div class="col-lg-9">
                          <input type="text" name="nomor_surat" id="nomor_surat" class="form-control <?= ($validation->hasError('nomor_surat')) ? 'is-invalid' : ''; ?>" value="<?= $suratmasuk['nomor_surat']; ?>" placeholder="Masukkan Nomor Surat">
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
                            <input type="date" name="tanggal_surat" class="form-control <?= ($validation->hasError('tanggal_surat')) ? 'is-invalid' : ''; ?> daterange-single" value="<?= ($suratmasuk['tanggal_surat']); ?>" maxlength="10" placeholder="Masukkan Tanggal Surat">
                            <div class="invalid-feedback">
                              <?= $validation->getError('tanggal_surat');?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-lg-3">Tanggal Terima</label>
                        <div class="col-lg-9">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar-o"></i></div>
                            <input type="date" name="tanggal_terima" class="form-control <?= ($validation->hasError('tanggal_terima')) ? 'is-invalid' : ''; ?> daterange-single" value="<?= ($suratmasuk['tanggal_terima']); ?>" maxlength="10" placeholder="Masukkan Tanggal Terima Surat">
                            <div class="invalid-feedback">
                              <?= $validation->getError('tanggal_terima');?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-lg-3">Nomor Agenda</label>
                        <div class="col-lg-9">
                          <input type="text" name="nomor_agenda" id="nomor_agenda" class="form-control <?= ($validation->hasError('nomor_agenda')) ? 'is-invalid' : ''; ?>" value="<?= $suratmasuk['nomor_agenda']; ?>" placeholder="Masukkan Nomor Agenda">
                          <div class="invalid-feedback">
                            <?= $validation->getError('nomor_agenda'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-lg-3">Sifat Surat</label>
                        <div class="col-lg-9">
                          <select class="form-control <?= ($validation->hasError('sifat_surat')) ? 'is-invalid' : ''; ?>" name="sifat_surat" id="sifat_surat">
                            <option value="<?= $suratmasuk['sifat_surat']; ?>">
                              <?php 
                              if ($suratmasuk['sifat_surat'] == 'Biasa')
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
                          <input type="text" name="pengirim" id="pengirim" class="form-control <?= ($validation->hasError('pengirim')) ? 'is-invalid' : ''; ?>" value="<?= $suratmasuk['pengirim']; ?>" placeholder="Masukkan Pengirim Surat">
                          <div class="invalid-feedback">
                            <?= $validation->getError('pengirim');?>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-lg-3">Perihal</label>
                        <div class="col-lg-9">
                          <input type="text" name="perihal" id="perihal" class="form-control <?= ($validation->hasError('perihal')) ? 'is-invalid' : ''; ?>" value="<?= $suratmasuk['perihal']; ?>" placeholder="Masukkan Perihal Surat">
                          <div class="invalid-feedback">
                            <?= $validation->getError('perihal');?>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-lg-3">Disposisi Ke</label>
                        <div class="col-lg-9">
                          <select class="form-control <?= ($validation->hasError('id_bagian')) ? 'is-invalid' : ''; ?>" name="id_bagian" >
                            <option value="<?= $suratmasuk['id_bagian']?>"><?= $suratmasuk['nama_bagian']?></option>
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
                        <label class="control-label col-lg-3">Isi Disposisi</label>
                        <div class="col-lg-9">
                          <textarea name="isi_disposisi" rows="3" class="form-control <?= ($validation->hasError('isi_disposisi')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan Isi Disposisi" ><?= $suratmasuk['isi_disposisi']; ?></textarea>
                          <div class="invalid-feedback">
                            <?= $validation->getError('isi_disposisi'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-lg-3">Lampiran</label>
                        <div class="col-lg-9">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('lampiran')) ? 'is-invalid' : ''; ?>" id="lampiran" name="lampiran" onchange="previewFile()">
                            <label class="custom-file-label" for="customFile"><?= $suratmasuk['lampiran']; ?></label>
                            <div class="invalid-feedback">
                              <?= $validation->getError('lampiran');?>
                            </div>
                          </div>
                        </div>
                      </div>
                    <hr>
                    <a href="/sm" class="btn btn-sm btn-back">Kembali</a>
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