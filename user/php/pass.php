<?php

include 'config.php';
session_start();
//error_reporting(0);

if (isset($_SESSION['sessionid'])) {
    $uemail = $_SESSION['email'];
    $uname = $_SESSION['name'];
} else {
    echo "<script>alert('Sila log masuk atau daftar.')</script>";
    echo "<script> window.location.replace('login.php')</script>";
}

$sqlselect = "SELECT * FROM users WHERE useremail ='$uemail'  AND username = '$uname' ";
try {
    $stmt = $conn->prepare($sqlselect);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();
    foreach ($rows as $user) {
        $name = $user['username'];
        $fname = $user['userfname'];
        $matricno = $user['usermatricno'];
        $inasis = $user['userinasis'];
        $school = $user['userschool'];
        $tel = $user['usertelno'];
    }
    $_SESSION['name'] = $name;
    $_SESSION['fname'] = $fname;
    $_SESSION['matricno'] = $matricno;
    $_SESSION['inasis'] = $inasis;
    $_SESSION['school'] = $school;
    $_SESSION['telno'] = $tel;
    //echo "<script>alert('success.')</script>";
    echo "<script> window.location.replace('profile.php')</script>";
} catch (PDOException $e) {
    echo "<script>alert('Harap maaf. Terdapat masalah semasa pemprosesan.')</script>";
    echo "Error: " . $e->getMessage();
}
