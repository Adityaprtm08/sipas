<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1, user-scalable=no">
  <!--Judul Halaman-->
  <title><?= $title ; ?></title>

  <!--Font-->
  <link href="<?=base_url();?>/assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

  <!--Custom CSS-->
  <link rel="stylesheet" href="<?=base_url();?>/css/custom-style.css">

  <!--Bootstrap CSS-->
  <link rel="stylesheet" href="<?=base_url();?>/assets/bootstrap/dist/css/bootstrap.min.css">

  <!--Datatable CSS-->
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/DataTables/datatables.css"/>

    <!--JQuery Js-->
    <script src="<?=base_url();?>/assets/jquery/jquery.min.js"></script>

    <!--Bootstrap Js-->
    <script src="<?=base_url();?>/assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!--Core plugin JavaScript-->
    <srcipt src="<?=base_url();?>/assets/jquery-easing/jquery.easing.min.js"></script>

    <!--Chart Js-->
    <script src="<?=base_url();?>/assets/chartjs/dist/chart.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url();?>/js/dashboard_custom.min.js"></script>

    <!--Datatable Js-->
    <script type="text/javascript" src="<?=base_url();?>/assets/DataTables/datatables.min.js"></script>



</head>

<body id="page-top">

  <?php $this->fungsi = new App\Libraries\Fungsi(); ?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon">
          <img src="<?=base_url();?>/img/logo_brand_sipas.png" width="90%" alt="logo_brand_sipas">
        </div>
        <div class="sidebar-brand-text mx-3">SIPAS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="/dashboard">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!-- Nav Item - Pengaturan -->
      <?php if (session()->get('level') == 'admin') { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw  fa fa-cogs"></i>
          <span>Pengaturan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Submenu</h6>
            <a class="collapse-item" href="/bagian">Bagian</a>
            <a class="collapse-item" href="/pengguna">Pengguna</a>
          </div>
        </div>
      </li>
      <?php } ?>
      <!-- Nav Item - Pengarsipan -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw  fa fa-archive"></i>
          <span>Pengarsipan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Submenu</h6>
            <a class="collapse-item" href="/sm">Surat Masuk</a>
            <a class="collapse-item" href="/sk">Surat Keluar</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Laporan -->
      <?php if (session()->get('level') == 'admin') { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa fa-print"></i>
          <span>Rekapitulasi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Submenu</h6>
            <a class="collapse-item" href="/rekapsm">Surat Masuk</a>
            <a class="collapse-item" href="/rekapsk">Surat Keluar</a>
          </div>
        </div>
      </li>
      <?php } ?>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fa fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-700 small"><?= $this->fungsi->getUserData(session()->get('id_user'))[0] ['nama_lengkap']?></span>
                <img class="img-profile rounded-circle" src="/img/profile/<?= $this->fungsi->getUserData(session()->get('id_user'))[0] ['foto_profil']?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/Profile">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <?=$this->renderSection("page-content");?>

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="text-muted text-center small">Copyright 2021 &copy; <a href="">SIPAS Kantor Pemerintah Desa Kalisalak</a></div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded-circle" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Anda Yakin ingin Keluar?</h6>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">Tekan "Logout" jika Anda ingin keluar.</div>
          <div class="modal-footer">
            <button class="btn btn-sm btn-back" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-sm btn-submit" href="<?=base_url('Auth/logout')?>">Logout</a>
            </div>
          </div>
        </div>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url();?>/js/dashboard_custom.min.js"></script>

    <!--Counter Angka-->
    <script>
      $(document).ready(function(){
          $('.counter-value').each(function(){
              $(this).prop('Counter',0).animate({
                  Counter: $(this).text()
              },{
                  duration: 500,
                  easing: 'swing',
                  step: function (now){
                      $(this).text(Math.ceil(now));
                  }
              });
          });
      });
    </script>

    <!--Show Datatable-->
    <script>
      $(document).ready( function () {
        $('#dataTables').DataTable();
      } );
    </script>

    <!--Js Untuk Alert Msg-->
    <script>
      window.setTimeout(function() {
        $(".alert").fadeTo(500,0).slideUp(500, function(){
          $(this).remove();
        });
      }, 1500);
    </script>

    <!--Js Untuk Preview Img-->
    <script>
      function previewImg(){
        const fotoProfil = document.querySelector('#foto_profil');
        const fotoLabel  = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        fotoLabel.textContent = fotoProfil.files[0].name;
        
        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(fotoProfil.files[0]);

        fileFoto.onload = function(e){
          imgPreview.src = e.target.result;
        }
      }
    </script>
        
    <!--Js Untuk Preview File-->
    <script>
      function previewFile(){
        const fileLampiran = document.querySelector('#lampiran');
        const fileLabel  = document.querySelector('.custom-file-label');

        fileLabel.textContent = fileLampiran.files[0].name;
      }
    </script>
    
</body>


</html>