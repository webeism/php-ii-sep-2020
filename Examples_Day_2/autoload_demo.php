<?php
/**
 * Application Entry
 */

//require '../vendor/autoload.php';
/**
 * @todo: revise this
 */
/*
spl_autoload_register(
    function ($class) {
        $file = str_replace('\\', '/', $class) . '.php';
        require BASE . '/src/' . $file;
    }
);
*/
define('BASE', __DIR__);
require __DIR__ . '/Loader.php';
// technique 1: relying up __invoke()
// spl_autoload_register(new \OrderApp\Loader\Loader());
// technique 2: use static
// spl_autoload_register('\OrderApp\Loader\Loader::autoLoad');
// technique 3: have the class self-register
$loader = new \OrderApp\Loader\Loader();
