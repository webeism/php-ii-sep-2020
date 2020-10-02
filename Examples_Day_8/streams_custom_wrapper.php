<?php
class DataStream{
	
	public $position;
	public $data;

	public function stream_open( $path, $mode){
		$this->data = parse_url( $path )['host'];
		$this->position = 0;
		return true;
	}

	public function stream_write( $input ){
		global $data;
		$length = strlen( $input );
		$data = substr( $input, 0, $this->position ) . $input . substr( $input, $this->position += $length );
		return $length;
	}

}


// register
stream_wrapper_register( 'teststream', 'DataStream' );

// init
$data = '';

// open
$fh = fopen( 'teststream://data','r+' );

// write
fwrite( $fh, 'blah blah blah' );

// close
fclose( $fh );

// dump
var_dump( $data );
