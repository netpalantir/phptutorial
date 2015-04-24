<?php 

class User {
  public $id;
  public $userName;
  public $pippo = 'OOPS';

  function __construct($id, $userName) {
    $this->id = $id;
    $this->userName = $userName;
  }

  public function sayHello() {
    $userName = 'pippo';
    echo("Hello " . $this->$userName . "\n");
  }
}

$u = new User(1, 'pippo');
$u->sayHello();