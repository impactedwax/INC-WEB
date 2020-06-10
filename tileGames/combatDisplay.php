<?php 
    require_once('infection.php');
    require_once('hero.php');
    require_once('mapGenerator.php');
  session_start();
//session_destroy();
if(!isset($_SESSION['startGame']))
{
     

    $_SESSION['startGame']= 1;  

}
  $isAtacked = false;
 
  $infection = new infection();
   
  heroDetails();
  $hero = new hero($_SESSION['heroName'],$_SESSION['heroHealth'],$_SESSION['heroDamage']);  

    if(isset($_GET['infectionHealth']))
    {
        $infection->health($_GET['infectionHealth']);
    }
    if(isset($_GET['hero'])){
        $_GET['hero']=$hero->getHeroHealth();
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
        ?>
        </tbody>
        </table>
    
    </center>
    <center>
    <?php
   
              
                echo '<div style="width:110px; float:left;"><form action="" method="post"/><br><br><br><br>
                <a href="attack.php.  " onClick= attack()>ATTACK</a><br><br>
                <input type="submit" class="btn2 border2 border33" name="user_choice" value="Block" title="Block"><br><br>
                <input type="submit" class="btn3 border3 border33" name="user_choice" value="Heal" title="Heal"><br></div>';
        
        ?>
        <?php 
    ?>
     
        </center>
    
</body>
 
<body>
    
</body>
</html>