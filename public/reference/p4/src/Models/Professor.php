<?php
namespace Models;
 
class Professor extends Person {
	//public function __construct($name) {
	//	parent::__construct($name);
	//}
	
	public function getName() {
		var_dump($this);
		return 'prof. ' . $this->name;
	}
}