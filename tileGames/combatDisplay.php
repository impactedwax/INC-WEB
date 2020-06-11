<?php 
    require_once('infection.php');
    require_once('hero.php');
    require_once('mapGenerator.php');
  session_start();
//session_destroy();
$_SESSION['win']='you win';
  $isAtacked = false;
 
  $infection = new infection();
   
  heroDetails();
  $hero = new hero($_SESSION['heroName'],$_SESSION['heroHealth'],$_SESSION['heroDamage']);  

    if(isset($_GET['infectionHealth']))
    {
        $infection->health($_GET['infectionHealth']);
    }
    if(isset($_GET['hero'])){
        
        $hero->heroHealth($_GET['hero']);
    }
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<title>Battle</title>
<style>
    	.background{
			background-color: black ;
		}
	h2,p{
		color: black;
	}
	.win{
		color: yellow;
	}
	.lose{
		color: red;
	}
	.battle {
		color: blue;
	}
	table tr td { color :#fff; }
    input[type=submit]{
        width: 100px;
        height: 50px;
    }
</style>
</head>
<body class="background">
    <center>
        <table cellpadding= "20" cellspacing= "20" border= "0">
        <tbody>
        <th>
            <td><a href=""><img src="images\cright.png" height="300" width="300"></a></td>
            <td>
            <?php echo 'Name: '.$hero->getHeroName()."<br><br>";
                echo 'Health: '.$hero->getHeroHealth()."<br><br>";
                 echo 'Damag: '.$hero->getHeroDamage()."<br>";
               
            ?></td>
            
          <td><a href=""><img src="images\infection.png" height="300" width="300"></a></td>
           <?php echo '<td>Name: '.$infection->getInfectionName()."<br><br>";
            echo 'Health: '.$infection->getInfectionHealth()."<br><br>";
            echo 'Damag: '.$infection->getDamage()."<br>";
         
            ?></td>

     
              
          
        </th>
        <?php
            $_SESSION['heroH'] = $hero->getHeroHealth();
            $_SESSION['heroD'] = $hero->getHeroDamage();

            $_SESSION['infectionHp']= $infection->getInfectionHealth();
            $_SESSION['infectionD'] = $infection->getDamage();



            
            $_SESSION['infectionHp']=$_SESSION['infectionHp']-$_SESSION['heroD'];
            
            $_SESSION['heroH']=$_SESSION['heroH']-$_SESSION['infectionD'];

        ?>
        </tbody>
        </table>
    
    </center>
    <center>
    <table cellpadding= "20" cellspacing= "20" border= "0">
        <tbody>
            <th>
            <td>
                    <?php 
                          
                            if($infection->getInfectionHealth()<20)
                            {
                                echo 'You win';
                                echo '<a href="continue.php  " onClick= continueM()><img src="images\continue.png" height="120" width="120" opacity:0.5></a>';
                                // sleep(5);
                                // header('Location: index.php');
                            }
                    ?>
              </td>
              <tr>  
                <a href="<?php echo "?infectionHealth=".$_SESSION['infectionHp']."&hero=".$_SESSION['heroH']; ?>"><img src="images\attack.png"  height="120" width="120" opacity:0.5></a>
           </tr>
            </th>
        </tbody>
     </table>
        </center>
    
</body>
 
<body>
    
</body>
</html>