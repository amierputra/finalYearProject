<?php
error_reporting();

include_once("config.php");
$id = $_GET['id'];
$sqldelete = "DELETE FROM users WHERE id=$id";
$stmt = $conn->prepare($sqldelete);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

echo "<script> window.location.replace('list.php')</script>";

?>