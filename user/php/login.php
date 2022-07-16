<?php

include 'config.php';

error_reporting(0);

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $userpass = sha1($_POST['userpass']);
    $stmt = $conn->prepare("SELECT * FROM users where username = '$username' AND userpass='$userpass'");
    $stmt->execute();
    $number_of_rows = $stmt->rowCount();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();
    if ($number_of_rows  > 0) {
        foreach ($rows as $user) {
            $useremail = $user['useremail'];
            $userfname = $user['userfname'];
            $usermatricno = $user['usermatricno'];
            $userinasis = $user['userinasis'];
            $userschool = $user['userschool'];
            $userbirth = $user['userbirth'];
        }
        session_start();
        $_SESSION['sessionid'] = session_id();
        $_SESSION['id'] = $userid;
        $_SESSION['email'] = $useremail;
        $_SESSION['password'] = $userpass;
        $_SESSION['name'] = $username;
        $_SESSION['fname'] = $userfname;
        $_SESSION['matricno'] = $usermatricno;
        $_SESSION['inasis'] = $userinasis;
        $_SESSION['school'] = $userschool;
        $_SESSION['telno'] = $usertelno;
        $_SESSION['birthday'] = $userbirth;

        echo "<script> window.location.replace('home.php')</script>";
    } else {
        echo "<script>alert('Log masuk gagal. Sila pastikan email dan kata laluan diisi dengan tepat.');</script>";
        echo "<script> window.location.replace('login.php')</script>";
        echo "Connection failed: " . $e->getMessage();
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|Poppins|Roboto|Bebas+Neue">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="../jscript/script.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/logouum.png">
    <title>Log Masuk</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center bg-1 bg-gradient">
        <h1 class="text-white text-center mt-2">MASJID SULTAN BADLISHAH, UUM</h1>
    </nav>
    <section class="bg-light bg-gradient">
        <div class="container-fluid">
            <div class="container-fluid py-4">
                <div class="text-center">
                    <img src="../images/logouum.png" class="rounded-circle" style="width: 60px; padding:6px;"><br><br>
                </div>
            </div>
            <div class="d-flex align-items-center h-100">
                <div class="container pb-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-6 col-xl-4">
                            <div class="card shadow border-1 text-white bg-black bg-gradient">
                                <div class="card-body p-4">
                                    <h5 class="text-center mb-4"><b>LOG MASUK</b></h5>

                                    <form action="login.php" method="POST" enctype="multipart/form-data">

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="username"><b>Username</b></label>
                                            <input type="text" id="username" name="username" placeholder="Username" class="form-control px-3" required />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password"><b>Kata Laluan</b></label>
                                            <input type="password" id="userpass" name="userpass" placeholder="Kata laluan" class="form-control  px-3" required />
                                        </div>

                                        <div class="d-grid pb-3">
                                            <button type="submit" name="submit" class="btn btn-1 btn-block fw-bold rounded-2 text-white bg-gradient">Log Masuk</button>
                                        </div>

                                        <p class="text-center text-white mt-3 mb-0">Belum mendaftar? <a href="register.php" class="text-warning" style="text-decoration:none; font-style: italic;">Daftar di sini</a></p>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="container-fluid pt-3 pb-1 text-center text-white adjust bg-1 bg-gradient" style="position:relative">
        <p>
            &copy; Developed by
            <a href="https://amputra.com" class="text-warning" style="text-decoration:none;">Amier Putra</a>
            | All Rights Reserved | Version Release: v1.0 | THIS IS FOR EDUCATION PURPOSE ONLY.
        </p>
    </footer>
</body>

</html>