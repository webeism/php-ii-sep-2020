<?php
/**
 * Application Entry
 */

// error reporting
error_reporting(E_ALL);
define('BASE', realpath(__DIR__ . '/../'));


/**
 * Autoload starting point
 */

spl_autoload_register(
  function ($class) {
    $file = str_replace('\\', '/', $class) . '.php';
    require BASE . '/src/' . $file;
  }
);

// "use" the Site classes
use DashApp\Site;
use DashApp\ServicedSite;

// instantiate
$site = new Site(1);
//$site = new ServicedSite(0);

// call a method
//$site->setName("Another Site Name");

// call a method
//echo $site->getName();

// string output magic method
echo $site;

// call object like a function magic method
//echo $site();



?>