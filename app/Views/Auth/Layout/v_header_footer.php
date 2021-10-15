<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1, user-scalable=no">
  <!--Judul Halaman-->
  <title><?= $title ; ?></title>

  <!--Font-->
  <link href="<?= base_url(); ?>/assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!--Custom CSS-->
  <link rel="stylesheet" href="<?= base_url(); ?>/css/custom-style.css">

  <!--Bootstrap CSS-->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap/dist/css/bootstrap.min.css">

</head>

<body class="login-container bg-login-gradient">
  <!--Page Container-->
  <div class="page-container">
    <!--Page Content-->
    <div class="page-content">
      <!--Main Content-->
      <div class="content-wrapper">
        <!--Content Area-->
        <div class="content">

          <?= $this->renderSection("content"); ?>
          <!--Footer-->
          <div class=" footer py-3 bg-light" id="footer-section">
            <div class="justify-content-between small container my-auto">
              <div class="text-muted text-center">Copyright 2021 &copy; <a href="">SIPAS Kantor Pemerintah Desa Kalisalak</a></div>
            </div>
          </div>
          <!--End Of Footer-->
        </div>
        <!--End Of Content Area-->
      </div>
      <!--End Of Main Content-->
    </div>
    <!--End Of Page Content-->
  </div>
  <!--End Of Page Container-->
  <!--Jquery Js-->
  <script src="<?= base_url(); ?>/assets/jquery/jquery.min.js"></script>

  <!--Bootstrap Js-->
  <script src="<?= base_url(); ?>/assets/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>/assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500,0).slideUp(500, function(){
        $(this).remove();
      });
    }, 1500);
  </script>
</body>

</html>