<?php
error_reporting(0);

if (isset($_POST['submit'])) {
    include_once("config.php");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = sha1($_POST['password']);
    $cpass = sha1($_POST['cpassword']);
    //$otp = rand(10000, 99999);

    if ($pass == $cpass) {
        $sqlregister = "INSERT INTO users (username, useremail, userpass) VALUES ('$name', '$email', '$pass')";

        try {
            $result = $conn->exec($sqlregister);
            //sendMail($email, $otp);
            if ($result) {
                echo "<script>alert('Sila lihat email anda.')</script>";
                $user = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                echo "<script>window.location.replace('login.php')</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('Pendaftaran gagal.')</script>";
            echo $sql . "<br>" . $e->getMessage();
        }
    } else {
        echo "<script>alert('Kata laluan tidak sepadan.')</script>";
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
    <title>Daftar Akaun</title>
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

                                    <form action="register.php" method="POST" enctype="multipart/form-data">

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example1cg">Nama Akaun</label>
                                            <input type="text" id="text" name="name" placeholder="Nama" value="<?php echo $name; ?>" class="form-control" required />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example3cg">Email</label>
                                            <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" class="form-control" required />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password">Kata Laluan</label>
                                            <input type="password" id="password" name="password" placeholder="Kata laluan" value="<?php echo $_POST['password']; ?>" class="form-control" required />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password">Sahkan Kata Laluan</label>
                                            <input type="password" id="cpassword" name="cpassword" placeholder="Sahkan kata laluan" value="<?php echo $_POST['cpassword']; ?>" class="form-control" required />
                                        </div>

                                        <div class="d-grid">
                                            <button type="submit" name="submit" class="btn btn-1 btn-block fw-bold rounded-2 text-white bg-gradient">Daftar</button>
                                        </div>

                                        <p class="text-center text-white mt-3 mb-0">Sudah mempunyai akaun? <a href="login.php" class="text-warning" style="text-decoration:none; font-style: italic;">Klik di sini</a></p>

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