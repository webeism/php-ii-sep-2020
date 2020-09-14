<?php
function fallback($class)
{
	echo __FUNCTION__ . PHP_EOL;
	$fn = str_replace('\\', '/', $class) . '.php';
	require_once __DIR__ . '/' . $fn;
}

function superAuto($class)
{
	echo __FUNCTION__ . PHP_EOL;
	$classes = [
		'TestModelTest' => __DIR__ . '/Test/Model/Test.php',
	];
	$key = str_replace('\\', '', $class);
	if (isset($classes[$key])) {
		require_once $classes[$key];
		return TRUE;
	}
}

spl_autoload_register('superAuto');
spl_autoload_register('fallback');

use Test\Model\Test as TestModel;
use Test\Services\Test as TestSvc;

$mod = new TestModel();
$svc = new TestSvc();
echo $mod->test;
echo PHP_EOL;
echo $svc->test;
echo PHP_EOL;
