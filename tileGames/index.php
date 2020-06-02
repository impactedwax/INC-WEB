<?php 
    session_start();
   
    if(!isset($_SESSION['startGame']))
    {

        $_SESSION['heroPos']=1;
        $_SESSION['heroX']=7;
        $_SESSION['heroY']=7;
        $_SESSION['startGame']=1;

    }
require_once("mapGenerator.php");

$sql ="SELECT id, map, tileBlock FROM mapGen ORDER BY id ASC LIMIT 64";

$query=$dbConn->prepare($sql);
$query->execute();
$_SESSION['mapaDatabase'] = $query ->fetchall(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="map">
    <?php
      heroPosition($_SESSION['heroX'], $_SESSION['heroY'], "images\charRight.png","covid",3);
        mapGenerator();
           ?>
    </div>
</body>
</html>