<?php
// only available in PHP 7.4 and above
// likewise: if strict_types isn't declared, prop typing acts like a filter
declare(strict_types=1);
class Test
{
	public int $a;
	public int $b;
	public function add(string $str)
	{
		return sprintf($str, $this->a, $this->b, $this->a + $this->b);
	}
}

$patt = 'The sum of %d and %d is %d' . PHP_EOL;
$patt2 = 'The sum of %.f and %.f is %.f' . PHP_EOL;
$test = new Test();
$test->a = 2;
$test->b = 2;
echo $test->add($patt);
$test->a = 2.2;
$test->b = 2.2;
echo $test->add($patt2);
$test->a = 'a';
$test->b = 'b';
echo $test->add($patt);

