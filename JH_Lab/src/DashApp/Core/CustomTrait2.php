<?php

namespace DashApp\Core;

/**
 * Session 4 | Lab 2
 * Lab: Traits
 * Complete the following:
 * 1. In separate files, create two traits, each with two methods, one of the methods named the same in both traits.
 * 2. In another file, create a class that uses the two traits.
 * 3. Resolve the naming collision, and change the method visibilities.
 * 4. Instantiate an instance of the class and execute the trait methods.
 * This lab is complete.
 */

trait CustomTrait2{

	public $traitType = "Trait Type 2";
	public $traitTest = "Trait Test 2";

  public function getTraitType(){
  	return $this->traitType;
  }

  public function setTraitTest( string $mx = "" ){
  	$this->traitTest = $mx;
  }

}
