<?php 

    require_once("config.php");
   
function mapGenerator(){
    
    $mapGrid = '<table border ="1.5" >';
    $colomn = 0;
    foreach($_SESSION['mapaDatabase'] as $rows)
    {
        $tileBlock = $rows["tileBlock"];

           if($colomn % 8 == 0){
            if($tileBlock == 'passable')
                $mapGrid.='<tr><td>'.'<img src="0.png" height="90" width="90" >'.'</td>';
            else
                $mapGrid.='<tr><td>'.'<img src="1.png"  height="90" width="90">'.'</td>';
        }
        else{
            if($tileBlock == 'passable')
                $mapGrid.='<td>'.'<img src="0.png"  height="90" width="90"> '.'</td>';
            else
                $mapGrid.='<td>'.'<img src="1.png"  height="90" width="90"> '.'</td>';
        }
        $colomn++;
    }
    $mapGrid.='</tr></table>';
    echo $mapGrid;
}
function heroPosition($x, $y, $heroImage, $name, $index){
    $html='';
    $left = ($x*90);
    $top = (90*7) - ($y*90);
    $css = "<style> #".$name."{
        margin: 0;
        padding: 0;
        position: absolute;
        width: 90;
        height: 90;
        left:".$left."px;
        top: ".$top."px;
        z-index:".$index.";
    }</style>";
    $heroPosition = '<div id="'.$name.'"><img src="'.$heroImage.'"></div>';
    echo $css.$heroPosition;
}
    
    // foreach($row as $rows)
    // {
  
    //     $id = $rows["id"];
    //     $tileBlock = $rows["tileBlock"];

    //     if($colomn % 8 == 0){
    //         if($tileBlock == 'passable')
    //             $mapGrid.='<tr><td>'."<img src='0.png'".'</td>';
    //         else
    //             $mapGrid.='<tr><td>'."<img src='1.png'".'</td>';
    //     }
    //     else{
    //         if($tileBlock == 'passable')
    //             $mapGrid.='<td>'."<img src='0.png'".'</td>';
    //         else
    //             $mapGrid.='<td>'."<img src='1.png'".'</td>';
    //     }
    //     $colomn++;
    // }


?>

