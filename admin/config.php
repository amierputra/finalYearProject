<?php

$server = 'localhost';
$user = 'root';
$pass = ''; 
$dbname = 'masjiddb';

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

?>