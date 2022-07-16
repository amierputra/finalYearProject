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

$sqlquery = "SELECT * FROM users";
$stmt = $conn->prepare($sqlquery);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com/css?family=Montserrat|Poppins|Roboto">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css" integrity="sha384-eoTu3+HydHRBIjnCVwsFyCpUDZHZSFKEJD0mc3ZqSBSb6YhZzRHeiomAUWCstIWo" crossorigin="anonymous">
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
                <button class="navbar-toggler bg-light text-black" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbar">
                    <!-- Left links -->
                    <ul class="navbar-nav ms-auto">
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
        
        
        <div class="p-5" style="overflow-x:auto;">
             <table class="table table-striped table-bordered border-dark" style="width:100%;">
                <thead>
                    <tr class="table-primary">
                        <th>Nama</th>
                        <th>Nama Akaun</th>
                        <th>Email</th>
                        <th>No Telefon</th>
                        <th style="text-align:center">No Matrik</th>
                        <th style="text-align:center">Inasis</th>
                        <th>School</th>
                        <th>Tarikh Lahir</th>
                        <th style="text-align:center">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    foreach ($rows as $user) {
                        $id = $user['id'];
                        $email = $user['useremail'];
                        $name = $user['username'];
                        $fname = $user['userfname'];
                        $matricno = $user['usermatricno'];
                        $inasis = $user['userinasis'];
                        $school = $user['userschool'];
                        $usertel = $user['usertelno'];
                        $birthday = $user['userbirth'];
                    
                    echo "
                        <tr class='align-middle'>
                            <td>$fname</td>
                            <td>$name</td>
                            <td>$email</td>
                            <td>$usertel</td>
                            <td style='text-align: center;'>$matricno</td>
                            <td style='text-align: center;'>$inasis</td>
                            <td>$school</td>
                            <td>$birthday</td>
                            <td style='text-align: center;'>
                                <a href='deleteuser.php?id=$id'>
                                    <i class='bi bi-trash3-fill' style='color: red'></i>
                                </a>
                            </td>
                        </tr>
                    
                    ";}
                    ?>
                    
                </tbody>
            </table>
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