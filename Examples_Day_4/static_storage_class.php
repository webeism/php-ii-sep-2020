<?php
class Storage
{
	public static $values = [];
	public static function set($key, $value)
	{
		self::$values[$key] = $value;
	}
	public static function get($key)
	{
		return self::$values[$key] ?? NULL;
	}	
	public static function dump()
	{
		return self::$values;
	}	
}

Storage::set('first', 'Doug');
Storage::set('last', 'Bierer');
Storage::set('role', 'Instructor');

var_dump(Storage::dump());

