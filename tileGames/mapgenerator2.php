<?php
         require_once("config.php");
      session_start();
 
  
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure of Cerdon</title>
</head>
<body >
    <?php
     
     
     // $sql ="SELECT id, tileBlock FROM map1 ORDER BY id ASC LIMIT 64";
      $sql ="SELECT id, map, tileBlock FROM mapGen ORDER BY id ASC LIMIT 64";
      $query=$dbConn->prepare($sql);
      $query->execute();
      $row = $query ->fetchall(); 
      $colomn = 0;
 
//  var_dump($row);
        $grid = array();
        $data =array();
        $width= 8;
        $height = 8;
        for($x = 0; $x < $width; $x++){
            
            for($y = 0; $y < $height; $y++)
            {
                
                $grid[$x][] ="<img src='1.png'>";
                
            }
        }
        
        if(!isset($_SESSION['x']))
            $_SESSION['x'] = (int)($width / 0);
        if(!isset($_SESSION['y']))
            $_SESSION['y'] = (int)($height / 0);
         
           

        if(isset($_REQUEST['d'])){
            if($_REQUEST['d'] == "l"){
                if($_SESSION['x'] > 0)
                    {
                        $_SESSION['x'] -= 1;
                    }
                $grid[$_SESSION['x']][$_SESSION['y']] = "<img src='images\charLeft.png'>";
             
            }
            if($_REQUEST['d'] == "r"){
                if($_SESSION['x'] <7)
                    {
                        $_SESSION['x'] += 1;
                    }
               
                $grid[$_SESSION['x']][$_SESSION['y']] = "<img src='images\charRight.png'>";
            }
            if($_REQUEST['d'] == "u"){
                if($_SESSION['y'] >0)
                    {
                        $_SESSION['y'] -= 1;
                    }
                $grid[$_SESSION['x']][$_SESSION['y']] = "<img src='images\charUp.png'>";
            }
            if($_REQUEST['d'] == "d"){
                if($_SESSION['y'] < 7)
                    {
                        $_SESSION['y'] += 1;
                    }
                $grid[$_SESSION['x']][$_SESSION['y']] = "<img src='images\charDown.png'>";
            }
        }
      

        echo '<table border="1">';
        for($y = 0; $y < $height; $y++){
            echo '<tr>';
            for($x = 0; $x < $width; $x++)
                echo '<td>'.$grid[$x][$y].'</td>';
            echo '</tr>';
        }
        echo '</table>';
    ?>

    <a href="?d=l"><img src='images\arleft.png'></a> 
    <a href="?d=u"><img src='images\arup.png'></a> 
    <a href="?d=d"><img src='images\ardown.png'></a> 
    <a href="?d=r"><img src='images\arright.png'></a> 
    <?php echo '<h1>'.$_SESSION['x'].' '. $_SESSION['y'].'</h1>'?>
</body>
</html>
