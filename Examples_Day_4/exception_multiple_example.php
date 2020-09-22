<?php
class Test
{
	const LOG_FILE = __DIR__ . '/error.log';
	public $pdo;
	public function __construct()
	{
		$this->pdo = new PDO('a', 'b', 'c');
	}
}
// if this were not implemented, code above would cause
// PHP Fatal Error: Uncaught PDOException
$message = 'All OK';
try {
	$test = new Test();
} catch (PDOException $e) {
	echo "\nPDO Exception\n";
	echo $e;
	$message = $e->getMessage();
} catch (Exception $e) {
	echo "\nException\n";
	echo $e;
	$message = $e->getMessage();
} finally {
	error_log($message, 3, Test::LOG_FILE);
}
