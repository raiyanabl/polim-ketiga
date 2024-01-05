<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistem Temu Janji Poliklinik</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/poliabil/poliabil/dist/css/welcome_styles.css">
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #053162;">
        <div class="container px-5">
            <a class="navbar-brand" href="index.php">Poliklinik UDINUS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        </div>
        <div class="container px-5">
        <ul class="navbar-nav ms-auto  ">
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php?page=loginAdmin">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=loginDokter">Dokter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=loginPasien">Pasien</a>
                        </li>
                    </ul>
                    </div>
    </nav>
    <?php 
        if (isset($_GET['page'])) {
            if ($_GET['page'] === 'loginAdmin') {
                include_once ('./loginAdmin.php');
            } else if ($_GET['page'] === 'loginDokter') {
                include_once ('./loginDokter.php');
            } else if ($_GET['page'] === 'loginPasien') {
                include_once ('./loginPasien.php');
            } else {
                include($_GET['page'] . ".php");
            }
        } else {
    ?>
        <!-- Header-->
        <header class="py-5" style="background-color: #0C4C93;"> <!-- Ubah Color Banner disini -->
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        <h1 class="display-5 fw-bolder text-white mb-2">Selamat Datang!<br>Sistem Temu Janji <br>Pasien - Dokter</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
   
    <div class="b-example-divider"></div>

<div class="container">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="index.php?page=loginAdmin" class="nav-link px-2 text-muted">Admin</a></li>
      <li class="nav-item"><a href="index.php?page=loginDokter" class="nav-link px-2 text-muted">Dokter</a></li>
      <li class="nav-item"><a href="index.php?page=loginPasien" class="nav-link px-2 text-muted">Pasien</a></li>
    </ul>
    <p class="text-center text-muted">&copy; 2024 UDINUS</p>
  </footer>
</div>




    <?php
        }
    ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>