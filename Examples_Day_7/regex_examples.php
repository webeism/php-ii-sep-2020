<?php
$urls = [
	'http://php.net/preg_match/',
	'htts://zend.com/courses',
	'https://unlikelysource.com/',
	'ftp://whatever.com/',
];
$pattern = '!(http|https|ftp)://(.*?)/.*!';
foreach ($urls as $item) {
	echo $item . ':';
	if (preg_match($pattern, $item, $matches)) {
		echo "Valid URL scheme\n";
	} else {
		echo "Invalid URL scheme\n";
	}
	var_dump($matches);
}

// same thing, but using "?"
$pattern = '!(http(s)?|ftp)://(.*?)/.*!';
foreach ($urls as $item) {
	echo $item . ':';
	if (preg_match($pattern, $item, $matches)) {
		echo "Valid URL scheme\n";
	} else {
		echo "Invalid URL scheme\n";
	}
	// NOTE: the DNS name is now the 3rd sub-match!
	var_dump($matches);
}

$path = __DIR__ . '/../../Zend/workspaces/DefaultWorkspace/orderapp';
$iter = new RecursiveDirectoryIterator($path);
$outer = new RecursiveIteratorIterator($iter);
$pattern = '/.*php$/S';
foreach ($outer as $name => $obj) {
	if (preg_match($pattern, $name)) echo $name . "\n";
}
