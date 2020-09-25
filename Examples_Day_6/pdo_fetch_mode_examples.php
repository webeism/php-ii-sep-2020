<?php
$dsn = 'mysql:dbname=phpcourse;host=localhost';
$usr = 'vagrant';
$pwd = 'vagrant';
class Test extends ArrayObject
{
	public function getFullName()
	{
		return $this->firstname . ' ' . $this->lastname . "\n";
	}
}	
try {
	$pdo = new PDO($dsn, $usr, $pwd);
	// returns an interation of Test instances
	$stmt = $pdo->query('SELECT * FROM customers');
	$stmt->setFetchMode(PDO::FETCH_CLASS, Test::class);
	foreach ($stmt as $item) echo $item->getFullName();
	// using a stored procedure
	$stmt = $pdo->prepare('CALL newCustomer(:first,:last)');
	$stmt->execute(['first' => 'Wilma', 'last' => 'Flintstone']);
	// returns an iterations of assoc arrays
	$stmt = $pdo->query('SELECT * FROM customers');
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	while ($item = $stmt->fetch()) var_dump($item);
} catch (Throwable $t) {
	echo $t;
}

