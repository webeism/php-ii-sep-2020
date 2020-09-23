<?php
class Hydrator
{
	public function hydrate(array $arr)
	{
		$obj = new ArrayObject($arr);
		return $obj;
	}
	public function extract(ArrayObject $obj)
	{
		return $obj->getArrayCopy();
	}
}

$hydrator = new Hydrator();
$arr = ['A', 'B', 'C'];
$obj = $hydrator->hydrate($arr);
var_dump($obj);
$new = $hydrator->extract($obj);
var_dump($new);
