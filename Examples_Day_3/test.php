<?php
interface TestInterface
{
	public function test(string $test);
}
class Base implements TestInterface
{
	public function test(string $test) 
	{
		return strtolower($test);
	}
}
class Joe extends Base
{
	public $name = 'JOE';
}
class Whatever implements TestInterface
{
	public function test(string $test) 
	{
		return strtoupper($test);
	}
}
class Deviant implements TestInterface
{
	public function test(int $test) 
	{
		return $test * 100;
	}
}
function something(TestInterface $obj, $str)
{
	echo $obj->test($str);
}
something(new Base(), 'Hello');
something(new Joe(), 'Joe');
something(new Whatever(), 'Whatever');
something(new Deviant(), 12345);

