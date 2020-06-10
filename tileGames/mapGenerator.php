<?php 
     
    require_once("config.php");
function heroDetails(){
    foreach($_SESSION['heroData'] as $rows){
        $heroDetails = $rows['heroName'];
            $heroH;
            $heroD;
            $heroN;
            if($heroDetails == "Kevin"){
               
               $heroN = $rows['heroName'];
               $heroD = $rows['heroDamage'];
               $heroH = $rows['heroHealth'];
             }
                
    
    }

    $_SESSION['heroName'] = $heroN;

    $_SESSION['heroHealth'] = $heroH;

    $_SESSION['heroDamage'] = $heroD;
}
function mapGenerator(){
    
    $mapGrid = '<table border ="1.5" ><tr>';
    $colomn = 0;
    foreach($_SESSION['mapaDatabase'] as $rows)
    {
        $tileBlock = $rows["tileBlock"];

           if($colomn % 8 == 0){
            if($tileBlock == 'passable')
                $mapGrid.='<tr><td><div class="tile">'.'<img src="images\0.png" height="90" width="90" >'.'</div></td>';
            else if ($tileBlock=='portal')
                  $mapGrid.='<tr><td><div class="tile">'.'<img src="images\2.png" height="90" width="90" >'.'</div></td>';
            else if ($tileBlock=='infection')
                  $mapGrid.='<tr><td><div class="tile">'.'<img src="images\infection.png" height="90" width="90" >'.'</div></td>';
            else if ($tileBlock=='virus')
                  $mapGrid.='<tr><td><div class="tile">'.'<img src="images\virus.png" height="90" width="90" >'.'</div></td>';
            else
                $mapGrid.='<tr><td><div class="tile">'.'<img src="images\1.png"  height="90" width="90">'.'</div></td>';
        }
        else{
            if($tileBlock == 'passable')
                $mapGrid.='<td><div class="tile">'.'<img src="images\0.png"  height="90" width="90"> '.'</div></td>';
            else if ($tileBlock=='portal')
                 $mapGrid.='<td><div class="tile">'.'<img src="images\2.png"  height="90" width="90"> '.'</div></td>';
            else if ($tileBlock=='infection')
                 $mapGrid.='<td><div class="tile">'.'<img src="images\infection.png"  height="90" width="90"> '.'</div></td>';
            else if ($tileBlock=='virus')
                 $mapGrid.='<td><div class="tile">'.'<img src="images\virus.png"  height="90" width="90"> '.'</div></td>';
            else
                $mapGrid.='<td><div class="tile">'.'<img src="images\1.png"  height="90" width="90"> '.'</div></td>';
        }
        $colomn++;
    }
$mapGrid.='</tr></table>';
echo $mapGrid;
}
function heroPosition($x, $y, $heroImage, $name, $index){
  

    $left = ($x*90);
    $top = (90*7) - ($y*90);
    $css = "<style> #".$name."{
        margin: 10px;
        padding: 0;
        position: absolute;
        width: 90px;
        height: 90px;
         left:".$left."px;
         top: ".$top."px;
        z-index:".$index.";
    }</style>";
    $heroPosition = '<div id="'.$name.'"><img src="'.$heroImage.'"height="90px" width="90px"></div>';
    echo $css.$heroPosition;
}

function encounter($mapTileNumber){
    $data;
    $mapDetails;
    $right=$mapTileNumber+1;
    $left=$mapTileNumber-1;
    $up=$mapTileNumber-8;
    $down=$mapTileNumber+8;
    

    if($up<0){
        $up=false;
    }
    else{
        $data = getTileData($up);

             if($data['tileBlock']=='obstruction')
                $up=false;
            else
                $up=true;
    }


    if($down>64)
    {
        $down = false;
    }
        else{
            $data = getTileData($down);

            if($data['tileBlock']=='obstruction')
                $down= false;
            else
                $down = true;
        }
      
        if($right%8==1){
            $right = false;
        }
      
        else{
                   

            $data = getTileData($right);
            
                if($data['tileBlock']=='obstruction')
                {
                    
                    $right=false;
                   
                }

                else   {
                   
                    $right=true;
                   
                }
    
        }
    

    if($left%8==0){
        $left = false;
    }
        else{
            $data = getTileData($left);
            
                if($data['tileBlock']=='obstruction')
                    $left=false;
                else
                    $left=true;
            
        }


       
    
        $_SESSION['up']=$up;
        $_SESSION['down']=$down;
        $_SESSION['left']=$left;
        $_SESSION['right']=$right;
        

}

function nextMap($mapTileNumber){

$data=getTileData($mapTileNumber);
$cnt=111;
if($data['tileBlock']=='portal'){
    $_SESSION['heroX']=0;
    $_SESSION['heroY']=7;
    $_SESSION['heroPos']= 1 ;

    if($_SESSION['mapLevel']<3){
        $_SESSION['mapLevel']++;
        $cnt++;
    
        echo '<script>window.location.reload()</script>';
    }
}

}
function getTileData($mapTileNumber){
    $cnt=1;
  
        foreach($_SESSION['mapaDatabase'] as $rows){
            if($cnt==$mapTileNumber) 
            return $rows;
            $cnt++;
        }
    }

    function getHeroData($heroData){
        
      
            foreach($_SESSION['heroData'] as $rows){
                if($_SESSION['heroData']=='Kevin') 
            return $rows;
            }
        }

function combat($mapTileNumber){
    $data=getTileData($mapTileNumber);
    if($data['tileBlock']=='infection'){
 echo 'Found Infection';
 //echo '<script>window.location.reload()</script>';
 header('Location: combatDisplay.php');

      
    }

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

