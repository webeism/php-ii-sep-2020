<?php
namespace Test\Model;
use ArrayObject;
class Test
{
	public $id = 123;
	public $test = 'MODEL TEST';
	public function getObj()
	{
		return new ArrayObject(get_object_vars($this));
	}
}

