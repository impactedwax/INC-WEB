<?php
    class infection{

        public $name ="Covid 19";
        public $health = 100;
        public $damage = 15;


        public function __construct(){
                $this->name= $this->name;
                self:: getInfectionHealth();
                $this->damage = $this->damage;
        }

        public function getDamage(){
          return $this->damage;
         
        }
        public function name($name){
            $this->name=$name;
        }
    public  function getInfectionName(){
       
        return $this->name;
    }
    public function health($health){
        $this->health = $health;
    }
    public function getInfectionHealth(){
            return $this->health;
    }
    }