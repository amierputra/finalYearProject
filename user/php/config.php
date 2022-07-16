<?php

$server = 'localhost';
$username = '';
$password = '';
$database = 'amierputra_msbuum';

try {
    $conn = new PDO("mysql:host=$server;dbname=amierputra_msbuum", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  ?>