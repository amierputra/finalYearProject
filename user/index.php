<?php

include 'php/config.php';
session_start();

error_reporting(0);

?>

<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css" integrity="sha384-eoTu3+HydHRBIjnCVwsFyCpUDZHZSFKEJD0mc3ZqSBSb6YhZzRHeiomAUWCstIWo" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|Poppins|Roboto|Bebas+Neue">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="../jscript/script.js"></script>

    <link rel="icon" type="image/x-icon" href="../images/logouum.png">
    <title>Halaman Utama</title>
</head>

<body>
    <nav class="navbar navbar-default navbar-expand-sm navbar-light bg-1 bg-gradient fixed-top p-3">
        <div class="container-fluid">
            <span><a class="navbar-brand text-white" href="index.php" style="text-decoration:none;">
                    <img src="images/logouum.png" alt="UUM logo" height="30" class="d-inline-block align-text-top">
                    MSB UUM
                </a></span>

            <!-- Toggle button -->
            <button class="navbar-toggle navbar-toggler bg-white text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <!-- Toggle button -->

            <div class="collapse navbar-collapse" id="navbar">

                <ul class="navbar-nav mb-2 mt-2 ms-auto mb-lg-0 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white active fw-bold" aria-current="page" href="index.php">Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Slot</a>
                    </li>
                    <!-- Navbar dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                        </a>

                        <!-- Dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end  bg-black" aria-labelledby="navbarDropdown">
                            <li>
                                <div class="form-check form-switch justify-content-center mx-3">
                                    <label class="form-check-label" for="lightSwitch">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon text-light" viewBox="0 0 16 16">
                                            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z" />
                                        </svg>
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="lightSwitch" />
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider text-white" />
                            </li>
                            <li>
                                <a class="dropdown-item text-white" href="php/profile.php">Profile</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider text-white" />
                            </li>

                            <li>
                                <a class="dropdown-item text-white" href="php/login.php">Login</a>
                            </li>


                        </ul>
                        <!-- Dropdown menu -->
                    </li>
                    <!-- Navbar dropdown -->
                </ul>

            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="py-5 px-md-5 bg-light" id="main">
                <div class="pt-5">
                    <h3>Selamat Datang</h3>
                    <?php echo "<h6>$userfname</h6>" ?>

                </div>
                <hr style="height:2px">
                <div class="mt-4 p-5 bg-grey bg-gradient text-center rounded-max">
                    <h2 class="text-primary text-uppercase">Kewajipan Solat Lima Waktu</h2> <br>
                    <p class="text-black" style="font-style:italic">“Dan dirikanlah kamu akan sembahyang dan keluarkanlah zakat, dan rukuklah kamu semua (berjemaah) bersama-sama orang-orang yang rukuk.”</p>
                    <p class="text-black" style="font-style:italic">"Establish prayer, pay alms-tax, and bow down with those who bow down."</p>
                </div>
                <div class="mt-4 p-5 bg-light text-center rounded-max">
                    <h2 class="text-primary text-uppercase">Kepentingan</h2> <br>
                    <p style="font-style:italic">Abu Hurairah RA meriwayatkan beliau mendengar Rasulullah SAW bersabda: "Andai kata di hadapan pintu seseorang di antara kamu ada sebuah sungai dan dia mandi di situ sebanyak lima kali dalam sehari, apakah masih ada kekotoran tertinggal di badannya?" Sahabat menjawab: "Tidak ada kekotoran sedikitpun tertinggal di badannya."
                        Baginda bersabda: "Demikianlah bandingan solat lima waktu, dengan mengerjakan semua itu Allah akan menghapuskan semua dosanya dan kesalahan."<br> (Hadis riwayat Bukhari dan Muslim)</p>
                </div>
            </div>

        </div>
    </div>
    <footer id="footer" class="container-fluid pt-3 pb-1 text-center text-white adjust bg-1 bg-gradient" style="position:relative;">
        <p>
            &copy; Developed by
            <a href="https://amputra.com" class="text-warning" style="text-decoration:none;">Amier Putra</a>
            | All Rights Reserved | Version Release: v1.0
        </p>
    </footer>
    <script src="../jscript/switch.js"></script>
</body>

</html>