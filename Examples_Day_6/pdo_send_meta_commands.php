<?php
$dsn = 'mysql:dbname=phpcourse;host=localhost';
$usr = 'vagrant';
$pwd = 'vagrant';
try {
	$pdo = new PDO($dsn, $usr, $pwd);
	// returns an interation of Test instances
	$stmt = $pdo->query('SHOW TABLES;');
	$stmt->setFetchMode(PDO::FETCH_OBJ);
	foreach ($stmt as $item) var_dump($item);
} catch (Throwable $t) {
	echo $t;
}

