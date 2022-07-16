<?php
error_reporting(0);
include_once("config.php");
$email = $_GET['email'];
$otp = $_GET['otp'];
$sqlverify = "SELECT * FROM users WHERE useremail = '$email' AND userotp = '$otp'";
$stmt = $conn->prepare($sqlverify);
$stmt->execute();
$number_of_rows = $stmt->fetchColumn();

if ($number_of_rows  > 0) {
   $newotp = '1';
   $sqlupdate = "UPDATE users SET userotp = '$newotp' WHERE useremail = '$email'";
  try {
        $conn->exec($sqlupdate);
        //echo "<script>alert('Berjaya')</script>";
        echo "<script>window.location.replace('login.php')</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Gagal')</script>";
        echo "<script> window.location.replace('register.php')</script>";
    }
}else{
     echo "<script>alert('Gagal')</script>";
     echo "<script> window.location.replace('register.php')</script>";
}