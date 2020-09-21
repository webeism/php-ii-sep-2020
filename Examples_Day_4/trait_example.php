<?php
trait Test
{
	public function test() { return '111111'; }
}
trait Test2
{
	public function test2() { return 'TEST22222'; }
}
class Upper
{
	use Test2;
	public function test() { return 'UPPER'; }
}
class Lower0 extends Upper
{
}
class Lower1 extends Upper
{
	use Test;
}
class Lower2 extends Upper
{
	public function test() { return '222222'; }
	use Test;
}

$lower0 = new Lower0();
echo $lower0->test();
echo "\n";
$lower0 = new Lower0();
echo $lower0->test2();
echo "\n";
$lower1 = new Lower1();
echo $lower1->test();
echo "\n";
$lower2 = new Lower2();
echo $lower2->test();
