<?php

include 'config.php';
session_start();

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
    $fweek = $quota['fweek'];
    $sweek = $quota['sweek'];
    $tweek = $quota['tweek'];
    $foweek = $quota['foweek'];
    $fvweek = $quota['fvweek'];
}


$sqlquery2 = "SELECT COUNT(id) FROM users";
$stmt = $conn->prepare($sqlquery2);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rowCount = $stmt->fetchColumn(0);

        
try {
    for ($i = 0; $i <= $rowCount; $i++) {
        if(!$fvweek){
            $a=array($fweek, $sweek, $tweek, $foweek);
            $rand_date = array_rand($a,2);
            
            $first = $a[$rand_date[0]];
            $second = $a[$rand_date[1]];
            
            $sqlupdate1 = "UPDATE users SET date='$first', date2='$second' WHERE id='$i'";
            $result1 = $conn->exec($sqlupdate1);
        }else{
            $a=array($fweek, $sweek, $tweek, $foweek, $fvweek);
            $rand_date = array_rand($a,3);
            
            $first = $a[$rand_date[0]];
            $second = $a[$rand_date[1]];
            $third = $a[$rand_date[2]];
            
            $sqlupdate2 = "UPDATE users SET date='$first', date2='$second', date3='$third' WHERE id='$i'";
            $result2 = $conn->exec($sqlupdate2);
        }
    }
} catch (PDOException $e) {
    echo "<script>alert('Ralat.')</script>";
    //echo "Error: " . $e->getMessage();
}
echo "<script> window.location.replace('setquota.php')</script>";

