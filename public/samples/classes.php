<?php

class Person {
  public $name;
  public function __construct($name) {
    $this->name = $name;
  }
  public function getName() { return $this->name; }
}

class Professor extends Person {
  public $title;
  
  public function __construct($title, $name) {
	$this->title = $title;
	parent::__construct($name);
  }
  
  public function getName() { 
    $res = $this->title . ' ' . $this->name;
    return $res;
  }
}

function setName($myPerson, $newName) {
	$myPerson->name = $newName;
}

$p = new Professor('dott.', 'Pippo');
setName($p, 'Pluto');
echo($p->getName() . "\n\n");