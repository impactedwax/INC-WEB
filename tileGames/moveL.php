<?php 
ob_start();
session_start();
function moveLeft(){

              $_SESSION['heroPos'] = $_SESSION['heroPos'] - 1;
                $_SESSION['heroX'] = $_SESSION['heroX'] - 1;
                $_SESSION['heroImage'] = 'images\cleft.png ';
                
    }
moveLeft();
header('Location: index.php');
ob_enf_fluch();

?>