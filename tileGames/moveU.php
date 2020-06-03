<?php 

session_start();
function moveUp(){

              $_SESSION['heroPos'] = $_SESSION['heroPos'] - 8;
                $_SESSION['heroY'] = $_SESSION['heroY'] + 1.06;
                
    }
moveUp();
  header('Location: index.php');


?>