<?php 

session_start();



function moveRight(){

      $_SESSION['heroPos'] = $_SESSION['heroPos'] + 1;
                $_SESSION['heroX'] = $_SESSION['heroX'] + 1;
               
  
  
}


  moveRight();
  header('Location: index.php');



  
?>