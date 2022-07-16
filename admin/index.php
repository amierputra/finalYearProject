<?php

include 'config.php';
session_start();

error_reporting(0);

if (isset($_SESSION['sessionid'])) {
    $useremail = $_SESSION['email'];
    $names = $_SESSION['name'];
} else {
    echo "<script>alert('Sila daftar atau log masuk')</script>";
    echo "<script> window.location.replace('login.php')</script>";
}

?>

<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com/css?family=Montserrat|Poppins|Roboto">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/jscript/script.js"></script>
    <script src="https://kit.fontawesome.com/5ad7690836.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="/images/favicon.png">
    <title>Admin MSB</title>
</head>

<body>
    <section class="bg-image" style="background-image: url('/images/masjid.jpg'); background-size: cover;">
        <!--Navbar-->
        <nav class="navbar navbar-default  navbar-expand-lg p-3 navbar-light bg-light" style="border-bottom-style:solid; border-color:lightblue; border-width:2px">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1"><a class="text-primary" href="index.php" style="text-decoration:none;">ADMINISTRATOR SITE</a></span>
                <!-- Toggle button -->
                <button class="navbar-toggler bg-lightblue text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbar">
                    <!-- Left links -->
                    
                    <ul class="navbar-nav ms-auto my-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="btn btn-danger" href="logout.php" role="button">Log Keluar</a>
                        </li>
                    </ul>
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <div class="py-4">

        </div>
        <div class="d-flex align-items-center h-100" style="height: 900px;">
            <div class="container h-100 pb-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 py-2">
                        <div class="shadow card bg-lightblue round-corner border-danger text-danger text-center">
                            <div class="card-body p-5 d-grid">
                                <h5 class="card-title text-uppercase">Daftar Admin</h5>
                                <p class="card-text">Sila tekan butang di bawah untuk mendaftar akaun admin yang baharu.</p>
                                <a href="register.php" class="btn btn-block shadow-lg btn-danger text-uppercase rounded-pill">Klik</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 py-3">
                        <div class="shadow card bg-lightblue round-corner border-primary text-primary text-center">
                            <div class="card-body p-5 d-grid">
                                <h5 class="card-title text-uppercase">Akaun Pengguna</h5>
                                <p class="card-text">Sila tekan butang di bawah untuk melihat senarai akaun pengguna yang berdaftar.</p>
                                <a href="list.php" class="btn btn-block shadow-lg btn-primary text-uppercase rounded-pill">Klik</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 py-2">
                        <div class="shadow card bg-lightblue round-corner border-success text-success text-center">
                            <div class="card-body p-5 d-grid">
                                <h5 class="card-title text-uppercase">Tetapkan Tarikh</h5>
                                <p class="card-text">Sila tekan butang di bawah untuk menetapkan bulan dan tarikh untuk solat Jumaat.</p>
                                <a href="setquota.php" class="btn btn-block shadow-lg btn-success text-uppercase rounded-pill">Klik</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <footer class="container-fluid pt-3 center bg-dark" style="text-align: center; ">
            <p class="text-light">
                    &copy; Designed by
                    <a href="https://amputra.com" class="text-primary" style="text-decoration:none;"><b>Amier Putra</b></a>.
                    <!--<b>DISCLAIMER: This is for learning purpose only.</b><br>-->All Rights Reserved.
            </p>
        </footer>
    </section>
</body>

</html>