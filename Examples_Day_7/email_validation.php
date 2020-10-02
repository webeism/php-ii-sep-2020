<?php
// from Jay
$list = [
	'something@gmail.com',
	'bad',
	'xxx@xxx',
	'invalid?char@something.whatever',
	'is_this_a_bad@domain.info',
	'ทดสอ@ทดสอบ@ทดสอบ.com',
	'ทดสอ@ทดสอบทดสอบ.com',
]; 
$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/iu'; 
foreach ($list as $email) {
	if (preg_match($regex, $email)) {
	 echo $email . " is a valid email. We can accept it.";
	} else { 
	 echo $email . " is an invalid email. Please try again.";
	}
	echo "\n";
}
