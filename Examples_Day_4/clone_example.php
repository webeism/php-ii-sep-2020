<?php
define('FORMAT', 'Y-m-d');

$today = new DateTime();
$nextMonth = $today;
$nextMonth->add(new DateInterval('P1M'));

// same object!
echo $today->format(FORMAT);
echo "\n";
echo $nextMonth->format(FORMAT);
echo "\n";
var_dump($today, $nextMonth);

$today = new DateTime();
$nextMonth = clone $today;
$nextMonth->add(new DateInterval('P1M'));

// two different objects!
echo $today->format(FORMAT);
echo "\n";
echo $nextMonth->format(FORMAT);
echo "\n";
var_dump($today, $nextMonth);

