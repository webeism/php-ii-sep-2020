<?php
// likewise: if strict_types isn't declared, return typing acts like a filter
declare(strict_types=1);
class Test
{
	public int $a;
	public int $b;
	public function add(string $str) : string
	{
		return printf($str, $this->a, $this->b, $this->a + $this->b);
	}
}

$patt = 'The sum of %d and %d is %d' . PHP_EOL;
$test = new Test();
$test->a = 2;
$test->b = 2;
var_dump($test->add($patt));
