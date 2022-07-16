<?php

include 'config.php';

error_reporting(0);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = sha1($_POST['password']);
    
    $sqlregister = "INSERT INTO admin (name, email, password) VALUES ('$name', '$email', '$pass')";
        try {
            $result = $conn->exec($sqlregister);
            if ($result) {
                echo "<script>alert('Pendaftaran berjaya.')</script>";
                $user = "";
                $email = "";
                $_POST['password'] = "";
                echo "<script>window.location.replace('index.php')</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('Pendaftaran gagal.')</script>";
            //echo $sql . "<br>" . $e->getMessage();
        }
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
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../jscript/script.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <title>Daftar - MSBUUM</title>
</head>

<body>

    <section class="bg-image" style="background-image: url('../images/masjidzayed.jpg'); background-size: cover;">
        
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
        
        <div class="container-fluid text-center py-4">
            <img src="../images/favicon.png" class="rounded-circle" style="width: 70px; background-color:white; padding:6px;"><br><br>
            <h2 class="text-uppercase text-light text-center">Daftar Admin</h2>
        </div>
        <div class="mask d-flex align-items-center h-100 ">
            <div class="container h-100 pb-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-11 col-md-9 col-lg-7 col-xl-7">
                        <div class="card text-black bg-lightblue" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h3 class="text-center text-primary mb-5"><b>Masjid Sultan Badlishah, UUM</b></h3>

                                <form action="register.php" method="POST" enctype="multipart/form-data">
                                    
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="name">Nama</label>
                                        <input type="text" id="name" name="name" placeholder="Nama" class="form-control" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" name="email" placeholder="Email" class="form-control" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="password">Kata Laluan</label>
                                        <input type="password" id="password" name="password" placeholder="Kata laluan" class="form-control" required />
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" name="submit" class="btn btn-primary btn-block fw-bold text-white">Daftar</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="container-fluid pt-3 center bg-dark" style="text-align: center; ">
            <p class="text-light">
                    &copy; Designed by
                    <a href="https://amierputra.work" class="text-danger" style="text-decoration:none;"><b>Amier Putra</b></a>
                    <!--<b>DISCLAIMER: This is for learning purpose only.</b><br>-->All Rights Reserved.
            </p>
        </footer>

    </section>

</body>

</html>