<?php
class Test
{
	public $pdo;
	public function __construct()
	{
		$this->pdo = new PDO();
	}
}
// if this were not implemented, code above would cause
// PHP Fatal Error: Uncaught PDOException
try {
	$test = new Test();
} catch (Exception $e) {
	//echo get_class($e) . ':' . ':' . $e->getMessage() . ':' . $e->getTraceAsString();
	// or, more simply:
	echo $e;
} catch (Error $e) {
	//echo get_class($e) . ':' . ':' . $e->getMessage() . ':' . $e->getTraceAsString();
	// or, more simply:
	echo $e;
} catch (Throwable $e) {
	//echo get_class($e) . ':' . ':' . $e->getMessage() . ':' . $e->getTraceAsString();
	// or, more simply:
	echo $e;
} finally {
	echo "\nFinally\n";
}
echo "\nFinally\n";
