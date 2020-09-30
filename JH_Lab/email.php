<?php
$pattern1 = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i';
$pattern2 = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
$pattern3 = '/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/';
$pattern4 = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix';

$email = 'test@test.com'; 
 
echo ( !preg_match( $pattern4, $email ) ? 'INVALID' : 'VALID' ) . ' email address (preg_match)<br />';

echo ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ? 'INVALID' : 'VALID' ) . ' email address (filter_var)';
