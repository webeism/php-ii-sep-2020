<?php
class Base
{
	public static $table = 'table';
	public static function getEarly()
	{
		// this binds "early":
		return self::$table;
	}
	public static function getLate()
	{
		// this binds "late":
		return static::$table;
	}
}

class Users extends Base
{
	public static $table = 'users';
}

echo Users::getEarly();
echo "\n";
echo Users::getLate();
