<?php

function attack(){
    echo'test';
$_SESSION['infectionHp']=$_SESSION['infectionHp']-$_SESSION['heroD'];
$_GET['infectionHealth']= $_SESSION['infectionHp'];
}
attack();
header('Location: combatDisplay.php');