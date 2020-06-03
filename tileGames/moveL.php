<?php 

session_start();
function moveLeft(){

              $_SESSION['heroPos'] = $_SESSION['heroPos'] - 1;
                $_SESSION['heroX'] = $_SESSION['heroX'] - 1;
                
    }
moveLeft();
  header('Location: index.php');


?>