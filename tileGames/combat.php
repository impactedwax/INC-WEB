<?php
    session_start();
    session_destroy();
    require_once("combatFunction.php");
    if(!isset($_SESSION['star']))
    {
        $_SESSION['heroHP']= 100;
        $_SESSION['heroATK'] = 50;
        $_SESSION['mobHP'] = 100;
        $_SESSION['mobATK'] = 25;
        $_SESSION['heal'] = 20;    

        $_SESSION['star']= 1;    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combat</title>
</head>
<style>
.jumbotron {
    padding: 2rem 1rem;
    margin-bottom: 2rem;
    background-color: #e9ecef;
    border-radius: .3rem;
    max-width:500px;
    margin-top: 15rem;
    margin-left: 33rem;}
.border1 {
    border-radius: 3px;
    background-color: white;
    padding: 1px 10px;
    color: black;
    font-size: 13px;
    border: solid #f44336;}

.btn1:hover{
    background-color: #f44336;
    border: solid #f44336;
    color: #FFFFFF;
    padding: 1px 10px;
    text-align: center;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
    text-decoration: none;
    font-size: 13px;
    cursor: pointer;}
.border2 {
    border-radius: 3px;
    background-color: white;
    padding: 1px 14px;
    color: black;
    font-size: 13px;
    border: solid #008CBA;}

.btn2:hover{
    background-color: #008CBA;
    border: solid #008CBA;
    color: #FFFFFF;
    padding: 1px 14px;
    text-align: center;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
    text-decoration: none;
    font-size: 13px;
    cursor: pointer;}
.border3 {
    border-radius: 3px;
    background-color: white;
    padding: 1px 17px;
    color: black;
    font-size: 13px;
    border: solid #4CAF50;}
.btn3:hover{
    background-color: #4CAF50;
    border: solid #4CAF50;
    color: #FFFFFF;
    padding: 1px 17px;
    text-align: center;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
    text-decoration: none;
    font-size: 13px;
    cursor: pointer;}
</style>

<body>
    <div class="jumbotron">

    <?php

        echo '<div style="width:110px; float:left;"><form action="" method="post"/><br><br><br><br>
        <input type="submit" class="btn1 border1 border33" name="user_choice" value="Attack" title="Attack"><br><br>
        <input type="submit" class="btn2 border2 border33" name="user_choice" value="Block" title="Block"><br><br>
        <input type="submit" class="btn3 border3 border33" name="user_choice" value="Heal" title="Heal"><br></div>';
    ?>
    <table>
        <tr><th>CERDON</th><th></th><th>INFECTED</th></tr>
        <tr><th></th><th> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</th><th></th></tr>
        <tr><td> &nbsp; <img src="images\cright.png" height="90" width="90" opacity:0.5></td>
        <td></td><td><img src="images\infection.png" height="90" width="90" opacity:0.5></td></tr>
    <?php


        if(isset($_POST['user_choice'])) 
        {
            $CPUChoice = array('Block', 'Heal', 'Attack');
           // shuffle($CPUChoice);
            $index=rand(0,2);
            $CPU = $CPUChoice[$index];
            $User = $_POST['user_choice'];

            $heroHP= $_SESSION['heroHP'];
            $mobHP= $_SESSION['mobHP'];
            
            echo'<tr><th>Health: '.$_SESSION['heroHP'].
            '<br>Damage: '.$_SESSION['heroATK'].
            '</th><th></th><th>Health: '.$_SESSION['mobHP'].
            '<br>Damage: '.$_SESSION['mobATK'].'</th></tr>';

            echo'<tr><th>'.$User.'ed</th><td></td><th>'.$CPU.'ed</th></tr>';

            if($User === $CPU)
            {
                if($User === "Attack")
                {
                    $heroHP= $heroHP - $_SESSION['mobATK'];
                    $mobHP= $mobHP - $_SESSION['heroATK'];
                    echo '<tr><td>Hero took '.$_SESSION['mobATK'].' damage.</td>'.
                    '<td></td><td>Mob took '.$_SESSION['heroATK'].' damage.</td></tr>';
                }
                else if($User === 'Heal')
                {
                    if($heroHP == 100 && $mobHP == 100)
                        echo '<tr><td></td><td>Hero and Mob health<br>already full.</td><td></td></tr>';
                    else if($heroHP < 100 && $mobHP == 100)
                    {
                        if($heroHP > 80)
                            $heroHP= $heroHP + (100 % $heroHP);
                        else
                            $heroHP= $heroHP + $_SESSION['heal'];
                        echo '<tr><td>Hero regained health.</td><td></td><td>Mob health already full.</td></tr>';
                    }
                    else if($heroHP == 100 && $mobHP < 100)
                    {
                        if($mobHP > 80)
                            $mobHP= $mobHP + (100 % $mobHP);
                        else
                            $mobHP= $mobHP + $_SESSION['heal'];
                        echo '<tr><td>Hero health already full.</td><td></td><td>Mob regained health.</td></tr>';
                    }
                    else{//walay full og health
                        if($heroHP > 80 && $mobHP > 80)
                        {
                            $heroHP= $heroHP + (100 % $heroHP);
                            $mobHP= $mobHP + (100 % $mobHP);
                        }
                        else if($heroHP < 81 && $mobHP > 80)
                        {
                            $heroHP= $heroHP + $_SESSION['heal'];
                            $mobHP= $mobHP + (100 % $mobHP);
                        }
                        else if($heroHP > 80 && $mobHP < 81)
                        {
                            $heroHP= $heroHP + (100 % $heroHP);
                            $mobHP= $mobHP + $_SESSION['heal'];
                        }
                        else
                        {
                            $heroHP= $heroHP + $_SESSION['heal'];
                            $mobHP= $mobHP + $_SESSION['heal'];
                        }
                        echo '<tr><td>Hero regained health.</td><td></td><td>Mob regained health.</td></tr>';
                    }
                }
                else
                    echo '<tr><td></td><td>Nothing happened.</td><td></td></tr>';
            }

            else if($User === "Block")
            {
                if($CPU === "Attack") 
                    echo '<tr><td></td><td>Hero blocked the attack!</td><td></td></tr>';
                else
                {   
                    if($CPU === "Heal")
                        if($mobHP == 100)
                            echo '<tr><td>Hero blocked nothing.</td><td></td><td>Mob health already full.</td></tr>';
                        else
                        {
                            if($mobHP > 80)
                                $mobHP= $mobHP + (100 % $mobHP);
                            else
                                $mobHP= $mobHP + $_SESSION['heal'];
                            echo '<tr><td>Hero blocked nothing.</td><td></td><td>Mob regained health.</td></tr>';
                        }
                }
            }
                            
            else if($User === "Heal") 
            {
                if($CPU === "Block")
                {
                    if($heroHP == 100)
                        echo '<tr><td>Hero health already full.</td><td></td><td>Mob blocked nothing.</td></tr>';
                    else
                    {
                        if($heroHP > 80)
                            $heroHP= $heroHP + (100 % $heroHP);
                        else
                            $heroHP= $heroHP + $_SESSION['heal'];
                        echo '<tr><td>Hero regained health.</td><td></td><td>Mob blocked nothing.</td></tr>';
                    }
                }
                else
                { 
                    if($CPU === "Attack") 
                    {
                        $heroHP= $heroHP - ($_SESSION['mobATK'] - $_SESSION['heal']);
                        echo '<tr><td></td><td>Hero took '.$_SESSION['mobATK'].' damage<br>and regained health.</td><td></td></tr>';
                    }
                }
            }
                            
            else if($User === "Attack") 
            {
                if($CPU === "Block")
                    echo '<tr><td></td><td>Mob blocked the attack!</td><td></td></tr>';
                else 
                {
                    if($CPU === "Heal") 
                    {
                        $mobHP= $mobHP - ($_SESSION['heroATK'] - $_SESSION['heal']);
                        echo '<tr><td></td><td>Mob took '.$_SESSION['heroATK'].' damage<br>and regained health.</td><td></td></tr>';
                    }
                }
            }
          
            $_SESSION['heroHP']= $heroHP;
            $_SESSION['mobHP'] = $mobHP;
        }   
    ?>
    </table>
    </div>
</body>
</html>