<?php
class Test
{
	const ERROR_METH = 'ERROR: this method %s is not supported';
	public $pdo;
	public function __call($name, $args)
	{
		$msg = sprintf(self::ERROR_METH, $name);
		throw new BadMethodCallException($msg);
	}
}
// if this were not implemented, code above would cause
// PHP Fatal Error: Uncaught PDOException
try {
	$test = new Test();
	echo $test->doesntExist();
} catch (Exception $e) {
	//echo get_class($e) . ':' . ':' . $e->getMessage() . ':' . $e->getTraceAsString();
	// or, more simply:
	echo $e;
}
