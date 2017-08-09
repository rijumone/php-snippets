<?php

class Person{
	var $name; // propoerties
	public $height;
	protected $insurance;
	private $pin = 401;

	function __construct($name=null){
		$this->name = $name;
	}

	function set_name($name){ // method
		$this->name = $name;
	}

	function get_name(){
		return $this->name;
	}

	function get_pin(){
		return $this->pin;
	}
}

?>