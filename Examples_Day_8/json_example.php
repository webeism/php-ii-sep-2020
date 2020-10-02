<?php
// Get the JSON
$json = file_get_contents('user.json');
 
// Decode as a standard class object
$userObject = json_decode( $json );
var_dump( $userObject ). PHP_EOL;
 
// Decode as an associated array
$userArray = json_decode( $json , true );
var_dump( $userArray );

$str = json_encode($userArray, JSON_PRETTY_PRINT);
echo $str;
