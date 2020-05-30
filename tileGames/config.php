<?php


$dbHost = '127.0.0.1';
$dbPort = '3307';
$dbName = 'tileGame';
$dbUser = 'root';
$dbPass = '';

try{
    $dbConn = new PDO("mysql:host=".$dbHost.";dbname=".$dbName.";port=".$dbPort."};",$dbUser,$dbPass);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo $e->getMessage();
}

?>