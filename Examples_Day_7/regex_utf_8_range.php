<?php
// is it possible to specify a range of UTF-8 chars?
// range == first - last chars in Thai alphabet:
$pattern = '/[ก-ฮ]+/u';
$test = [
	'12345ท7890',
	'ABCDEF',
	'123456789',
	'สวัสดี',
];
foreach ($test as $str) {
	echo "Testing $str\n";
	echo 'Thai Characters: ';
	echo (preg_match($pattern, $str)) ? 'FOUND' : 'NOT FOUND';
	echo "\n";
}


