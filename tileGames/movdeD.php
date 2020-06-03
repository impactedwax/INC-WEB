<?php 

session_start();
function moveDown(){

              $_SESSION['heroPos'] = $_SESSION['heroPos'] + 8;
                $_SESSION['heroY'] = $_SESSION['heroY'] - 1.06;
                
    }
moveDown();
  header('Location: index.php');


?>