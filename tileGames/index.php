<?php 
    session_start();
 //session_destroy();
    if(!isset($_SESSION['startGame']))
    {

        $_SESSION['heroPos']= 1;
        $_SESSION['heroX'] = 0;
        $_SESSION['heroY'] = 7;
        $_SESSION['startGame'] = 1;
        $_SESSION['heroImage'] = "images\charRight.png ";
        $_SESSION['mapLevel'] = 1;
     

    }
require_once("mapGenerator.php");


$sql ="SELECT * from mapGen where map = ".$_SESSION['mapLevel']."  ORDER BY tileNumber ASC";

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
<style>

body {
 background-image: url('bg_main.png');
 background-color: #cccccc;
 background-repeat: none;
}

table {
   border-collapse: collapse;
}

/* And this to your table's `td` elements. */
td {
   padding: 0; 
   margin: 0;
}

#mapGrid{
    margin: 0;
    padding: 0;
    position: absolute;
    background-color: #fe9800;
    width: 700px;
    height: 700px;
    left: 74px;
    top: 76px
}
.tile{
    margin: 0;
}
</style>
<body>
    <div id="map">
    <?php
      heroPosition($_SESSION['heroX'], $_SESSION['heroY'], "images\charRight.png ","covid",3);
        mapGenerator();
           ?>
    </div>
<?php 
    encounter($_SESSION['heroPos']);
    nextMap($_SESSION['heroPos']);
    if($_SESSION['left'] == false)
    {
         echo '<a href="#"><img src="images\arleft.png" opacity:0.5></a>';
      }
    else
    {
       echo '<a href="moveL.php  " onClick= moveLeft()><img src="images\arleft.png" opacity:0.5></a>';
    }
    if($_SESSION['up'] == false)
    {
         echo '<a href="#"><img src="images\arup.png" opacity:0.5></a>';
      }
    else    
    {
       echo '<a href="moveU.php  " onClick= moveUp()><img src="images\arup.png" opacity:0.5></a>';
    }
    if($_SESSION['down'] == false)
    {
           echo '<a href="#"><img src="images\ardown.png" opacity:0.5></a>';
    }
    else
    { 
          echo '<a href="movdeD.php  " onClick= moveDown()><img src="images\ardown.png" opacity:0.5></a>';
    }
       if($_SESSION['right'] == false)
      {
         echo '<a href="#"><img src="images\arright.png" opacity:0.5></a>';
  }
  else
  {
        echo '<a href="moveR.php  " onClick= moveRight()><img src="images\arright.png" opacity:0.5></a>';
  }
  echo ($_SESSION['heroPos']);
?>


</body>
</html>