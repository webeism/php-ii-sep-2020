<?php
// if you don't add this declare, strict typing only acts as a filter
declare(strict_types=1);
class Test
{
	public function add(string $str, int $a, int $b)
	{
		return sprintf($str, $a, $b, $a + $b);
	}
}

$patt = 'The sum of %d and %d is %d' . PHP_EOL;
$patt2 = 'The sum of %.f and %.f is %.f' . PHP_EOL;
$test = new Test();
echo $test->add($patt, 2, 2);
echo $test->add($patt2, 2.2, 2.2);
echo $test->add($patt, 'a', 'b');

