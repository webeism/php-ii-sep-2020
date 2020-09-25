<?php

$repl = [
	'%%TITLE%%' => 'OB Test',
	'%%LEAD%%' => 'Welcome to the Test Page',
	'%%CONTENTS%%' => 'akd ad fkajsd asdkljdf kal;sdf k;lasdfkl asdkf asdk kasfkaje kak jf'
];

// Start buffering
ob_start();

include __DIR__ . '/template.html'; 
// Okay, get the buffer contents, clean the buffer and send the contents
$contents = ob_get_clean();
foreach ($repl as $key => $val)
	$contents = str_replace($key, $val, $contents);

echo $contents;

