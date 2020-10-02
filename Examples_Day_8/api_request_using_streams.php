<?php
// Make a request for JSON	
$url = 'https://api.unlikelysource.com/api?postcode=RH19';
$response = file_get_contents($url);
var_dump(json_decode($response));

