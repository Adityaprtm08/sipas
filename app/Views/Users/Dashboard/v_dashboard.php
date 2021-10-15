        <?=$this->extend("Users/Layout/v_header_footer");?>

        <?=$this->section("page-content");?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!--Page Banner-->
          <?php if(session()->getFlashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('success'); ?>
            </div>
          <?php endif; ?>
          <!--End Of Page Banner-->

          <!-- Page Heading -->
          <div class="row">
            <div class="col-sm-6">
              <h4 class="m-0 text-gray-700">Dashboard</h4>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Home</li>
              </ol>
            </div>
          </div>
          <!--End Of Page Heading-->

          <!-- Content Row 1-->
          <div class="row justify-content-center">
            <!-- Bagian Card -->
            <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
              <div class="card bg-gradient-primary h-100 py-2 ">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                      <h6><b>Bagian</b></h6></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-100"><span class="counter-value"><?= $totalbagian ?></span></span></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-puzzle-piece fa-3x text-gray-100"></i>
                    </div>
                    <a class="stretched-link" href="/bagian"></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pengguna Card -->
            <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
              <div class="card bg-gradient-info py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="font-weight-bold text-white text-uppercase mb-1">
                        <h6><b>Pengguna</b></h6></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-100"><span class="counter-value"><?= $totalpengguna ?></span></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-users fa-3x text-gray-100"></i>
                    </div>
                    <a class="stretched-link" href="/pengguna"></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Surat Masuk Card -->
            <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
              <div class="card bg-gradient-success h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="font-weight-bold text-white text-uppercase mb-1">
                      <h6><b>Surat Masuk</b></h6></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-100"><span class="counter-value"><?= $totalsm ?></span></span></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-envelope fa-3x text-gray-100"></i>
                    </div>
                    <a class="stretched-link" href="/sm"></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Surat Keluar Card -->
            <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
              <div class="card bg-gradient-warning h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="font-weight-bold text-white text-uppercase mb-1">
                        <h6><b>Surat Keluar</b></h6></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-100"><span class="counter-value"><?= $totalsk ?></span></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-envelope-open fa-3x text-gray-100"></i>
                    </div>
                    <a class="stretched-link" href="/sk"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row 2-->
          <div class="row justify-content-center">
            <!-- Chart 1 -->
            <div class="col-xl-6 col-md-12 mb-4">
              <div class="card">
                <div class="card-header hcard-secondary">
                  <b>Total Pengguna Per Level</b>
                </div>
                <div class="card-body">
                  <canvas id="User_Chart" width="400" height="300"></canvas>
                  <script>
                    var user = ['Admin','User'];
                    var ctx = document.getElementById('User_Chart').getContext('2d');

                    var background_1 = ctx.createLinearGradient(0, 0, 0, 600);
                    background_1.addColorStop(0, '#18F4BA');
                    background_1.addColorStop(0.3, '#10A1EA');

                    var background_2 = ctx.createLinearGradient(0, 0, 0, 600);
                    background_2.addColorStop(0, '#FFCF6E');
                    background_2.addColorStop(0.8, '#FF5E59');

                    var User_Chart = new Chart(ctx, {
                      type: 'pie',
                      data: {
                        labels: user,
                        datasets: [{
                          data: [
                            <?= $totaladmin; ?>, <?= $totaluser; ?>
                          ],
                          backgroundColor: [
                            background_1,
                            background_2,
                          ],
                          borderWidth:1,
                          borderColor: [
                            '#18F4BA',
                            '#FFCF6E',
                          ],
                          hoverBackgroundColor: [
                            background_1,
                            background_2,
                          ],
                          hoverBorderWidth: 2,
                          hoverBorderColor: [
                            '#18F4BA',
                            '#FFCF6E',
                          ],
                  
                          borderWidth: 1
                        }]
                      },
                      options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                          legend: {
                            position: 'top',
                          }
                        },
                        scales: {
                          y: {
                            beginAtZero: true
                          }
                        }
                      }
                    });
                  </script>
                </div>
              </div>
            </div>

            <!-- Chart 2 -->
            <div class="col-xl-6 col-md-12 mb-4">
              <div class="card">
                <div class="card-header hcard-secondary">
                  <b>Total Arsip Surat</b>
                </div>
                <div class="card-body">
                  <canvas id="Arsip_Chart" width="400" height="300"></canvas>
                  <script>
                    var arsip = ['Surat Masuk','Surat Keluar'];
                    var pie2_ctx = document.getElementById('Arsip_Chart').getContext('2d');

                    var background_1 = pie2_ctx.createLinearGradient(0, 0, 0, 600);
                    background_1.addColorStop(0, '#18F4BA');
                    background_1.addColorStop(0.3, '#10A1EA');

                    var background_2 = pie2_ctx.createLinearGradient(0, 0, 0, 600);
                    background_2.addColorStop(0, '#FFCF6E');
                    background_2.addColorStop(0.8, '#FF5E59');

                    var Arsip_Chart = new Chart(pie2_ctx, {
                      type: 'pie',
                      data: {
                        labels: arsip,
                        datasets: [{
                          data: [
                            <?= $totalsm; ?>,<?= $totalsk; ?>
                          ],
                          backgroundColor: [
                            background_1,
                            background_2,
                          ],
                          borderWidth: 1,
                          borderColor: [
                            '#18F4BA',
                            '#FFCF6E',
                          ],
                          hoverBackgroundColor: [
                            background_1,
                            background_2,
                          ],
                          hoverBorderWidth: 2,
                          hoverBorderColor: [
                            '#18F4BA',
                            '#FFCF6E',
                          ],
                  
                          borderWidth: 1
                        }]
                      },
                      options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                          legend: {
                            position: 'top',
                          }
                        },
                        scales: {
                          y: {
                            beginAtZero: true
                          }
                        }
                      }
                    });
                  </script>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row 3-->
          <div class="row justify-content-center">
            <!-- Chart 1 -->
            <div class="col-xl-6 col-md-12 mb-4">
              <div class="card">
                <div class="card-header hcard-secondary">
                  <b>Statistik Jumlah Surat Masuk <?= date('Y'); ?></b>
                </div>
                <div class="card-body">
                  <canvas id="Sm_Chart" width="400" height="300"></canvas>
                  <script>
                    var bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                    var bar1_ctx = document.getElementById('Sm_Chart').getContext('2d');
                    var background_1 = bar1_ctx.createLinearGradient(0, 0, 0, 600);
                    background_1.addColorStop(0, '#18F4BA');
                    background_1.addColorStop(0.3, '#10A1EA');

                    var Sm_Chart = new Chart(bar1_ctx, {
                      type: 'bar',
                      data: {
                        labels: bulan,
                        datasets: [{
                          label : 'Surat Masuk',
                          data: [
                            <?= $smjan; ?>, <?= $smfeb; ?>, <?= $smmar; ?>, <?= $smapr; ?>,
                            <?= $smmei; ?>, <?= $smjun; ?>, <?= $smjul; ?>, <?= $smagu; ?>,
                            <?= $smsep; ?>, <?= $smokt; ?>, <?= $smnov; ?>, <?= $smdes; ?>,
                          ],
                          backgroundColor: background_1,
                          borderWidth: 1,
                          borderColor: '#18F4BA',
                          hoverBackgroundColor: background_1,
                          hoverBorderWidth: 2,
                          hoverBorderColor: '#18F4BA',
                        }]
                      },
                      options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                          legend: {
                            position: 'top',
                          }
                        },
                        scales: {
                          y: {
                            beginAtZero: true
                          }
                        }
                      }
                    });
                  </script>
                </div>
              </div>
            </div>

            <!-- Chart 2 -->
            <div class="col-xl-6 col-md-12 mb-4">
              <div class="card">
                <div class="card-header hcard-secondary">
                  <b>Statistik Jumlah Surat Keluar <?= date('Y'); ?></b>
                </div>
                <div class="card-body">
                  <canvas id="Sk_Chart" width="400" height="300"></canvas>
                  <script>
                    var bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                    var bar2_ctx = document.getElementById('Sk_Chart').getContext('2d');
                    var background_2 = bar2_ctx.createLinearGradient(0, 0, 0, 600);
                    background_2.addColorStop(0, '#FFCF6E');
                    background_2.addColorStop(0.8, '#FF5E59');

                    var Sk_Chart = new Chart(bar2_ctx, {
                      type: 'bar',
                      data: {
                        labels: bulan,
                        datasets: [{
                          label : 'Surat Keluar',
                          data: [
                            <?= $skjan; ?>, <?= $skfeb; ?>, <?= $skmar; ?>, <?= $skapr; ?>,
                            <?= $skmei; ?>, <?= $skjun; ?>, <?= $skjul; ?>, <?= $skagu; ?>,
                            <?= $sksep; ?>, <?= $skokt; ?>, <?= $sknov; ?>, <?= $skdes; ?>,
                          ],
                          backgroundColor: background_2,
                          borderWidth: 1,
                          borderColor: '#FFCF6E',
                          hoverBackgroundColor: background_2,
                          hoverBorderWidth: 2,
                          hoverBorderColor: '#FFCF6E',
                        }]
                      },
                      options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                          legend: {
                            position: 'top',
                          }
                        },
                        scales: {
                          y: {
                            beginAtZero: true
                          }
                        }
                      }
                    });
                  </script>
                </div>
              </div>
            </div>
          </div>
          <!-- Content Row 4-->
          <div class="row justify-content-center">
            <div class="col-xl-10 col-md-12 mb-4">
              <div class="card">
                <div class="card-header hcard-secondary">
                  <b>Statistik Jumlah Arsip Per Bulan Tahun <?= date('Y'); ?></b>
                </div>
                <div class="card-body">
                  <canvas id="Arsip2_Chart" height="300"></canvas>
                  <script>
                    var bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                    var bar3_ctx = document.getElementById('Arsip2_Chart').getContext('2d');
                    
                    var background_1 = bar3_ctx.createLinearGradient(0, 0, 0, 600);
                    background_1.addColorStop(0, '#18F4BA');
                    background_1.addColorStop(0.3, '#10A1EA');
                      
                    var background_2 = bar3_ctx.createLinearGradient(0, 0, 0, 600);
                    background_2.addColorStop(0, '#FFCF6E');
                    background_2.addColorStop(0.8, '#FF5E59');

                    var Arsip2_Chart = new Chart(bar3_ctx, {
                      type: 'bar',
                      data: {
                        labels: bulan,
                        datasets: [
                          {
                            label : 'Surat Masuk',
                            data: [
                              <?= $smjan; ?>, <?= $smfeb; ?>, <?= $smmar; ?>, <?= $smapr; ?>,
                              <?= $smmei; ?>, <?= $smjun; ?>, <?= $smjul; ?>, <?= $smagu; ?>,
                              <?= $smsep; ?>, <?= $smokt; ?>, <?= $smnov; ?>, <?= $smdes; ?>,
                            ],
                            backgroundColor: background_1,
                            borderWidth: 1,
                            borderColor: '#18F4BA',
                            hoverBackgroundColor: background_1,
                            hoverBorderWidth: 2,
                            hoverBorderColor: '#18F4BA',
                          },
                          {
                            label : 'Surat Keluar',
                            data: [
                              <?= $skjan; ?>, <?= $skfeb; ?>, <?= $skmar; ?>, <?= $skapr; ?>,
                              <?= $skmei; ?>, <?= $skjun; ?>, <?= $skjul; ?>, <?= $skagu; ?>,
                              <?= $sksep; ?>, <?= $skokt; ?>, <?= $sknov; ?>, <?= $skdes; ?>,
                            ],
                            backgroundColor: background_2,
                            borderWidth: 1,
                            borderColor: '#FFCF6E',
                            hoverBackgroundColor: background_2,
                            hoverBorderWidth: 2,
                            hoverBorderColor: '#FFCF6E',
                          },
                        ]
                      },
                      options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                          legend: {
                            position: 'top',
                          }
                        },
                        scales: {
                          y: {
                            beginAtZero: true
                          }
                        }
                      }
                    });
                  </script>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--End of Container Fluid-->
      </div>
      <!-- End of Main Content -->
      <?=$this->endSection();?>