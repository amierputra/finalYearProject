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

$sqlquery = "SELECT * FROM quota";
$stmt = $conn->prepare($sqlquery);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();

foreach ($rows as $quota) {
    $bulan = $quota['month'];
    $first = $quota['fweek'];
    $sec = $quota['sweek'];
    $third = $quota['tweek'];
    $fourth = $quota['foweek'];
    $fifth = $quota['fvweek'];
}

if (isset($_POST['submit'])) {
    $month = $_POST['month'];
    $fweek = $_POST['fweek'];
    $sweek = $_POST['sweek'];
    $tweek = $_POST['tweek'];
    $foweek = $_POST['foweek'];
    $fvweek = $_POST['fvweek'];

    $sqlquery2 = "SELECT COUNT(id) FROM users";
    $stmt = $conn->prepare($sqlquery2);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rowCount = $stmt->fetchColumn(0);


    $sqlinsert = "UPDATE quota SET  month='$month', fweek='$fweek', sweek='$sweek', tweek='$tweek', foweek='$foweek', fvweek='$fvweek' WHERE id=1";
    try {
        $result = $conn->exec($sqlinsert);
        if ($result) {
            echo "<script>alert('Tarikh berjaya ditetapkan.')</script>";
                
            $fweek = "";
            $sweek = "";
            $tweek = "";
            $foweek = "";
            $fvweek = "";
            include 'calculate.php';
        }
    } catch (PDOException $e) {
        echo "<script>alert('Tarikh gagal ditetapkan.')</script>";
        echo $sql . "<br>" . $e->getMessage();
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
    <script src="https://kit.fontawesome.com/5ad7690836.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <title>Admin MSB</title>
</head>

<body>
    <section class="bg-image" style="background-image: url('../images/masjid.jpg'); background-size: cover;">
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
        <!--Navbar-->

        <div class="mask d-flex align-items-center h-100" style="height: 900px;">
            <div class="container h-100 py-5">
                <div class="shadow card bg-basic round-corner border-primary text-primary" style="border:2px solid">
                    <div class="card-body p-5 d-grid row d-flex">
                        <h5 class="card-title text-uppercase text-dark text-center"><b>Tetapkan Tarikh</h5></b><br>
                        <form action="setquota.php" method="POST" enctype="multipart/form-data">
                            <div class="form-outline mb-4 pt-3">
                                <label class="form-label center" for="month"><b>Bulan</b></label>
                                <select id="month" name="month" class="form-control text-center" required>
                                    <option value="<?php echo $bulan; ?>" disabled selected hidden><?php echo $bulan; ?></option>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Mac">Mac</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Jun">Jun</option>
                                    <option value="Julai">Julai</option>
                                    <option value="Ogos">Ogos</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Disember">Disember</option>
                                </select>
                            </div>
                            <div class="row d-flex center">
                                <div class="col-12 col-lg-6 px-3">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="fweek"><b>Minggu Pertama</b></label>
                                        <input type="date" id="fweek" name="fweek" placeholder="Masukkan tarikh Jumaat minggu pertama" value="<?php echo $first; ?>" class="form-control" required />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="sweek"><b>Minggu Ke-2</b></label>
                                        <input type="date" id="sweek" name="sweek" placeholder="Masukkan tarikh Jumaat minggu kedua" class="form-control" value="<?php echo $sec; ?>" required />
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 px-3">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="tweek"><b>Minggu Ke-3</b></label>
                                        <input type="date" id="tweek" name="tweek" placeholder="Masukkan tarikh Jumaat minggu ketiga" class="form-control" value="<?php echo $third; ?>" required />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="foweek"><b>Minggu Ke-4</b></label>
                                        <input type="date" id="foweek" name="foweek" placeholder="Masukkan tarikh Jumaat minggu keempat" class="form-control" value="<?php echo $fourth; ?>" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex center">
                                <div class="form-outline mb-4">
                                        <label class="form-label center" for="fvweek"><b>Minggu Ke-5 (pilihan)</b></label>
                                        <input type="date" id="fvweek" name="fvweek" placeholder="Masukkan tarikh Jumaat minggu kelima" class="form-control text-center" value="<?php echo $fifth; ?>"/>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary fw-bold text-white">Simpan</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="container-fluid pt-3 center bg-dark" style="text-align: center; ">
            <p class="text-light">
                &copy; Designed by
                <a href="https://amierputra.work" class="text-primary" style="text-decoration:none;"><b>Amier Putra</b></a>.
                <!--<b>DISCLAIMER: This is for learning purpose only.</b><br>-->All Rights Reserved.

            </p>
        </footer>
    </section>
</body>

</html>