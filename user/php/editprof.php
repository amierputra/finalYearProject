<?php

include 'config.php';
session_start();

error_reporting(0);

if (isset($_SESSION['sessionid'])) {
    $userid = $_SESSION['id'];
    $useremail = $_SESSION['email'];
    $username = $_SESSION['name'];
    $userfname = $_SESSION['fname'];
    $usermatricno = $_SESSION['matricno'];
    $userinasis = $_SESSION['inasis'];
    $userschool = $_SESSION['school'];
    $usertel = $_SESSION['usertelno'];
    $userbirth = $_SESSION['birthday'];
} else {
    echo "<script>alert('Sila daftar atau log masuk.')</script>";
    echo "<script> window.location.replace('login.php')</script>";
}

$sqlquery = "SELECT * FROM `users` WHERE useremail='$useremail'";
$stmt = $conn->prepare($sqlquery);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();

foreach ($rows as $user) {
    $id = $user['id'];
    $email = $user['useremail'];
    $name = $user['username'];
    $fname = $user['userfname'];
    $matricno = $user['usermatricno'];
    $inasis = $user['userinasis'];
    $school = $user['userschool'];
    $tel = $user['usertelno'];
    $birthday = $user['userbirth'];
}

if (isset($_POST['submit'])) {

    $uname = $_POST['uname'];
    $ufname = $_POST['ufname'];
    $umatricno = $_POST['umatricno'];
    $uinasis = $_POST['uinasis'];
    $uschool = $_POST['uschool'];
    $utel = $_POST['utel'];
    $ubirthday = $_POST['birthday'];

    $sqlinsert = "UPDATE `users` SET username='$uname', userfname='$ufname', usermatricno='$umatricno', userinasis='$uinasis', userschool='$uschool', usertelno='$utel', userbirth='$ubirthday' WHERE useremail='$useremail'";
    try {
        $conn->exec($sqlinsert);
        //echo "<script>alert('Butiran berjaya disimpan.')</script>";
        //echo "<script>window.location.replace('pass.php')</script>";
        include 'pass.php';
    } catch (PDOException $e) {
        echo "<script>alert('Harap maaf. Terdapat masalah semasa pemprosesan.')</script>";
        echo "<script>window.location.replace('editprof.php')</script>";
        echo "Connection failed: " . $e->getMessage();
        
    }
}

if (isset($_POST['logout'])) {
    session_destroy();
}
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
    <title>Edit Profil</title>
</head>

<body>
    <nav class="navbar navbar-default navbar-expand-sm navbar-light bg-1 bg-gradient fixed-top p-3">
        <div class="container-fluid">
            <span><a class="navbar-brand text-white" href="home.php" style="text-decoration:none;">
                    <img src="../images/logouum.png" alt="UUM logo" height="30" class="d-inline-block align-text-top">
                    MSB UUM
                </a></span>

            <!-- Toggle button -->
            <button class="navbar-toggle navbar-toggler bg-white text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <!-- Toggle button -->

            <div class="collapse navbar-collapse" id="navbar">

                <ul class="navbar-nav mb-2 ms-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="home.php">Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Slot</a>
                    </li>
                    <!-- Navbar dropdown -->
                    <li class="nav-item dropdown">
                    <?php
                            echo "<a class='nav-link dropdown-toggle text-white' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <img src='../images/profiles/$id.jpg' alt='Avatar Logo' style='height:30px;' class='rounded-pill'>
                        </a>";
                        
                        ?>
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
                                <a class="dropdown-item text-white" href="profile.php">Profile</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider text-white" />
                            </li>

                            <li>
                                <a class="dropdown-item text-white" href="logout.php">Logout</a>
                            </li>


                        </ul>
                        <!-- Dropdown menu -->
                    </li>
                    <!-- Navbar dropdown -->
                </ul>

            </div>
        </div>
    </nav>

    <div class="container-fluid p-4">
    </div>

    <div class="p-5">
        <h3 class="text-center" style="font-family:Montserrat; font-weight:900;">Edit Profil Anda</h3><br>

        <form action="editprof.php" method="POST" enctype="multipart/form-data">

            <div class="form-outline mb-4">
                <label class="form-label" for="umur">Nama Akaun</label>
                <input type="text" id="uname" name="uname" placeholder="" value="<?php echo $name; ?>" class="form-control" />
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="telno">Nama</label>
                <input type="text" id="ufname" name="ufname" placeholder="" value="<?php echo $fname; ?>" class="form-control" />
            </div>

            <!--END ROW-->
            <div class="form-outline mb-4">
                <label class="form-label" for="umatric">Nombor Matrik</label>
                <input type="text" id="umatricno" name="umatricno" placeholder="" value="<?php echo $matricno; ?>" class="form-control" />
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="uschool">School</label>
                <input type="text" id="uschool" name="uschool" placeholder="Contoh: School of Education" value="<?php echo $school; ?>" class="form-control" />
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="uinasis">Inasis</label>
                <select id="uinasis" name="uinasis" class="form-control">
                    <option value="<?php echo $inasis; ?>" hidden selected><?php echo $inasis; ?></option>
                    <option value="Proton">Proton</option>
                    <option value="Tradewinds">Tradewinds</option>
                    <option value="TNB">TNB</option>
                    <option value="MAS">MAS</option>
                    <option value="Petronas">Petronas</option>
                    <option value="Sime Darby">Sime Darby</option>
                    <option value="Grant">Grant</option>
                    <option value="TM">TM</option>
                    <option value="MISC">MISC</option>
                    <option value="BSN">BSN</option>
                    <option value="Muamalat">Muamalat</option>
                    <option value="YAB">YAB</option>
                    <option value="Bank Rakyat">Bank Rakyat</option>
                    <option value="SME">SME</option>
                    <option value="Maybank">Maybank</option>
                </select>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="telno">Nombor Telefon</label>
                <input type="tel" id="utel" name="utel" placeholder="Contoh: 012-3456789" pattern="[0-9]{3}-[0-9]{7-8}" value="<?php echo $tel; ?>" class="form-control" />
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="birthday">Tarikh Lahir</label>
                <input type="date" id="birthday" name="birthday"value="<?php echo $birthday; ?>" class="form-control" />
            </div>
            
            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-warning btn-block fw-bold text-body">Simpan</button>
            </div>
        </form>
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