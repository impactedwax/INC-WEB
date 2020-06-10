<?php 


require_once("mapGenerator.php");

$_SESSION['heroName']="";
$_SESSION['heroHealth']=0;
$_SESSION['heroDamage']=0;

class hero{
    public $heroName;
    public $heroHealth;
    public $heroDamage;

    public function __construct($heroName,$heroHealth,$heroDamage)
    {
        $this->heroName= $heroName;
        $this->heroHealth= $heroHealth;
        $this->heroDamage= $heroDamage;
    }

    public function heroName($heroName){
        $this->heroName = $heroName;
    }
    public function heroHealth($heroHealth){
        $this->heroHealth = $heroHealth;
    }
    public function heroDamage($heroDamage){
        $this->heroDamage = $heroDamage;
    }
    public function getHeroName(){
        return $this->heroName;
    }
    public function getHeroDamage(){
        return $this->heroDamage;
    }
    public function getHeroHealth(){
        return $this->heroHealth;
    }
}
?>