<?php 
ob_start();
session_start();



function moveRight(){

      $_SESSION['heroPos'] = $_SESSION['heroPos'] + 1;
                $_SESSION['heroX'] = $_SESSION['heroX'] + 1;
               
                $_SESSION['heroImage'] = 'images\cright.png ';
  
}


  moveRight();
  header('Location: index.php');
  ob_enf_fluch();

  
?>