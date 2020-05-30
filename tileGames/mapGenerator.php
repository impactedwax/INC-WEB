<?php 

    require_once("config.php");
   
    session_start();
   

    $sql ="SELECT id, map, tileBlock FROM mapGen ORDER BY id ASC LIMIT 64";

    $query=$dbConn->prepare($sql);
    $query->execute();
    $row = $query ->fetchall(); 
    $colomn = 0;

  

    $mapGrid = '<table border ="1">';
 
        $hero=array();
        $_session['x']=0;
        $_session['y']=0;

    

    
    foreach($row as $rows)
    {
  
        $id = $rows["id"];
        $tileBlock = $rows["tileBlock"];

        if($colomn % 8 == 0){
            if($tileBlock == 'passable')
                $mapGrid.='<tr><td>'."<img src='0.png'".'</td>';
            else
                $mapGrid.='<tr><td>'."<img src='1.png'".'</td>';
        }
        else{
            if($tileBlock == 'passable')
                $mapGrid.='<td>'."<img src='0.png'".'</td>';
            else
                $mapGrid.='<td>'."<img src='1.png'".'</td>';
        }
        $colomn++;
    }
   
    $mapGrid.='</tr></table>';
?>

<html>
<body>
    <?php echo $mapGrid;
    ?>
    <?php     echo $hero[$_session['x']][$_session['y']] = "<img src='images\charLeft.png'>";?>
    
    <!-- <a href="?d=l">Left</a>
    <a href="?d=r">Right</a>
    <a href="?d=d">Down</a>
    <a href="?d=Up">Up</a> -->
</body>
</html>