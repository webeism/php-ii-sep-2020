<?php
namespace OrderApp\Loader;
class Loader
{
	// if you use this, don't use __invoke()
	public function __construct()
	{
		spl_autoload_register('\OrderApp\Loader\Loader::autoLoad');
	}
	// if you use this, don't use __construct()
    public function __invoke($class)
    {
		self::autoLoad($class);
	} 
    public static function autoLoad($class) 
    {
        $file = str_replace('\\', '/', $class) . '.php';
        require BASE . '/src/' . $file;
    }
}
