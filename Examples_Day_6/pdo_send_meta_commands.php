<?php
function runQuery($pdo, $sql)
{
	$stmt = $pdo->query($sql);
	$stmt->setFetchMode(PDO::FETCH_OBJ);
	return $stmt->fetchAll();
}
$dsn = 'mysql:dbname=phpcourse;host=localhost';
$usr = 'vagrant';
$pwd = 'vagrant';
$test = [
	'SHOW TABLES',
	'SHOW CREATE TABLE customers',
	'HELP',
];
try {
	$pdo = new PDO($dsn, $usr, $pwd);
	foreach ($test as $sql) {
		echo "\n$sql\n";
		var_dump(runQuery($pdo, $sql));
	}
} catch (Throwable $t) {
	echo $t;
}

