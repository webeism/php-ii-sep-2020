<?php
$a = new stdClass();
$a->test = 'TEST';
var_dump($a);

$b = 'TEST';
$b = (object) $b;
var_dump($b);

$c = new ArrayObject([1,2,3]);
$json = json_encode($c);
$obj = json_decode($json);
echo $json . "\n";
var_dump($obj);

