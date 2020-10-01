<?php

class RestRequest{

	public const ENDPOINT = 'https://api.unlikelysource.com/api';
	protected $url = '';
	protected $arrVars = [];
	protected $rawResponse = '';
	protected $decodedResponse = '';

	public function __construct( $args = array() ){
		if( isset( $args['city'] ) && $args['city'] != '' ){
			$this->arrVars['city'] =  $args['city'];
		}
		if( isset( $args['country'] ) && $args['country'] != '' ){
			$this->arrVars['country'] =  $args['country'];
		}
		if( isset( $args['postcode'] ) && $args['postcode'] != '' ){
			$this->arrVars['postcode'] =  $args['postcode'];
		}
	}

	public function getURL() : string {
		
		// Generate url
		$url = self::ENDPOINT . '?';
		$url .= http_build_query( $this->arrVars );		
	    return $url;
	}

	public function doRequest( string $requestType = '' ) : void {

		// URL
		$this->url = $this->getURL();

		// init
		$this->rawResponse = '';
		$this->decodedResponse = '';		

		// Request
		switch (true){
			case $requestType == 'guzzle';
				
				// init
				require __DIR__ . '/vendor/autoload.php';
				$client = new GuzzleHttp\Client();
				
				// make the request
				$rawResponse = $client->request( 'GET', self::ENDPOINT, [
					'query' => $this->arrVars
				]);

				// return status
				if ( $rawResponse->getStatusCode() === 200 ) {
					$rawResponse  = $rawResponse->getBody();
				}
				
			break;

				// Any number of other services	

			default;
				// get_file_contents
				$rawResponse = file_get_contents( $this->url );
			break;
		
		}

		$this->rawResponse = $rawResponse;

	}

	public function getResponse( string $responseType = '' ) : array {

		// Format response
		switch( true ){
			case ( $responseType == 'array' ):
				// array
				$this->decodedResponse = json_decode( $this->rawResponse, true);
			break;
			default;
				// object
				$this->decodedResponse = json_decode( $this->rawResponse );
			break;
		}
		
		// Return array
		return [
			'url' => $this->url,
			'rawResponse' => $this->rawResponse,
			'decodedResponse' => print_r( $this->decodedResponse, true ),
		];
	}

}


// parameters
$arrParams = [
	'country' => 'GB',
	'postcode' => 'RH19 3DD',
	'city' => '',
];

// new object
$oRestRequest = new RestRequest( $arrParams );

// do the request
$oRestRequest->doRequest( 'guzzle' );

// get the response
$responseArray = $oRestRequest->getResponse( 'array' );

// display response array
var_dump( $responseArray );

//array(1) {
//  'data' =>
//  array(1) {
//    [0] =>
//    array(13) {
//      'id' =>
//      string(7) "3119319"
//      'country' =>
//      string(2) "GB"
//      'postcode' =>
//      string(8) "RH19 3DD"
//      'city' =>
//      string(24) "East Grinstead Town Ward"
//      'state_prov_name' =>
//      string(7) "England"
//      'state_prov_code' =>
//      string(3) "ENG"
//      'locality_name' =>
//      string(11) "West Sussex"
//      'locality_code' =>
//      string(9) "E10000032"
//      'region_name' =>
//      string(19) "Mid Sussex District"
//      'region_code' =>
//      string(9) "E07000228"
//      'latitude' =>
//      string(7) "51.1240"
//      'longitude' =>
//      string(7) "-0.0051"
//      'accuracy' =>
//      string(1) "6"
//    }
//  }
//}
