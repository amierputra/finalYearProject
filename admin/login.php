<?php

include 'config.php';

error_reporting(0);

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $pass = sha1($_POST['password']);
    //$otp = '1';
    $stmt = $conn->prepare("SELECT * FROM admin WHERE email = '$email' AND password = '$pass'");
    $stmt->execute();
    $number_of_rows = $stmt->rowCount();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();
    if ($number_of_rows  > 0) {
        foreach ($rows as $admin) {
            $user_name = $admin['name'];
            $email = $admin['email'];
        }
        session_start();
        $_SESSION['sessionid'] = session_id();
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $user_name;

        echo "<script>alert('Berjaya.');</script>";
        echo "<script> window.location.replace('index.php')</script>";
    } else {
        echo "<script>alert('Log masuk gagal. Sila pastikan email dan kata laluan diisi dengan tepat.');</script>";
        echo "<script> window.location.replace('login.php')</script>";
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
    <script src="/jscript/script.js"></script>
    <link rel="icon" type="image/x-icon" href="/images/favicon.png">
    <title>Log Masuk - MSBADMIN</title>
</head>

<body>

    <section class="bg-image" style="background-image: url('/images/masjidzayed.jpg'); background-size: cover;">
        <div class="container-fluid text-center py-5">
            <img src="../images/favicon.png" class="rounded-circle" style="width: 70px; background-color:white; padding:6px;"><br><br>
            <h2 class="text-uppercase text-light text-center">Log Masuk</h2>
        </div>
        <div class="mask d-flex align-items-center h-100 ">
            <div class="container h-100 pb-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-11 col-md-9 col-lg-7 col-xl-7">
                        <div class="card text-black bg-lightblue" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h3 class="text-center text-primary mb-5"><b>Masjid Sultan Badlishah, UUM</b></h3>

                                <form action="login.php" method="POST" enctype="multipart/form-data">

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" name="email" placeholder="Email" class="form-control" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="password">Kata Laluan</label>
                                        <input type="password" id="password" name="password" placeholder="Kata laluan" class="form-control" required />
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" name="submit" class="btn btn-primary btn-block fw-bold text-white">Log Masuk</button>
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
                    <a href="https://amputra.com" class="text-danger" style="text-decoration:none;"><b>Amier Putra</b></a>
                    <!--<b>DISCLAIMER: This is for learning purpose only.</b><br>-->All Rights Reserved.
            </p>
        </footer>

    </section>

</body>

</html>