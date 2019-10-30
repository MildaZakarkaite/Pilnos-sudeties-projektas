<?php

class Rockstar {
   public $health;
   public $drug;
   
   public function __construct() {
       $this->health = 100;
   }

    public function consumeHeroin() {
       $this->drug = new Heroin($this);
       $this->drug = consume();
    }
}

class Heroin {
    private $rockstar;
    public function __construct(Rockstar $rockstar) {
        $this->rockstar = $rockstar;
    }
    public function consume() {
        $this->rockstar->health--;
    }
}

$einikis = new Rockstar();
$einikis->consumeHeroin();

var_dump($einikis);


