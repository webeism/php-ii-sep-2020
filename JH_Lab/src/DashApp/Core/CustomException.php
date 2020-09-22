<?php

namespace DashApp\Core;

use \Exception;

/**
 * Session 4 | Lab 1
 * Lab: Build Custom Exception Class
 * Complete the following:
 * 1. Create a file and build a custom exception class with a constructor that accepts parameters.
 * 2. Call the parent Exception constructor.
 * 3. Add some new functionality in the custom exception constructor.
 * 4. Add a try/catch/catch/finally block set.
 * 5. In the try portion, throw an instance of the Exceptions object, and an instance of the custom exception class.
 * 6. Handle both by logging in the associated catch blocks.
 * 7. Echo something in the finally block
 */

class CustomException extends Exception{

 public function __construct( $message, $code = 0, Exception $previous = null ) {
    $message = date( "m-d-y H:i:s" ) . " | " . $message;
    parent::__construct( $message, $code, $previous );
	}
}
