<?php
require_once 'api.class.php';
require_once 'apiAuth.class.php';
require_once 'Models/users.php';
require_once 'Models/endpointRoleActions.php';
require_once 'Models/endpoints.php';
require_once 'Models/endpointMethods.php';
require_once 'functions.php';

require_once dirname ( dirname ( __FILE__ ) ) . "/DL/jwt.php";
class MyAPI extends API {
	protected $User;
	public function __construct($request, $origin) {
		parent::__construct ( $request );
		// Abstracted out for example
		
		$request_headers = apache_request_headers ();
		if (! isset ( $request_headers ['apiKey'] )) {
// 			throw new Exception ( 'No API Key provided' );
			$jwt = new \DALJWT ( "No API Key provided" );
			echo $jwt->encode ();
			exit();
		}
		
		// Key verify
		$APIKey = new apiAuth ();
		if (! $APIKey->verifyKey ( $request_headers ['apiKey'], $origin )) {
// 			throw new Exception ( 'Invalid API Key' );
			$jwt = new \DALJWT ( "Invalid API Key" );
			echo $jwt->encode ();
			exit();
		} else if (array_key_exists ( 'token', $this->request ) && ! $User->get ( 'token', $this->request ['token'] )) {
// 			throw new Exception ( 'Invalid User Token' );
			$jwt = new \DALJWT ( "Invalid User Token" );
			echo $jwt->encode ();
			exit();
		}
		
		// API Auth 
// 		$nr = GetBetween("","/",$request);
// 	    $endPoint = endpoints::getEndpointFromName($nr);
// 	    $method = endpointMethods::getMethodFromName($this->method);
// 		$APIAuth = endpointRoleActions::getAuth($request_headers ['apiKey'], $endPoint->ID, $method->ID);
// 	    if (! $APIAuth->action>0 ) {
// // 			throw new Exception ( 'No access' );
// 	    	$jwt = new \DALJWT ( "No Access" );
// 	    	echo $jwt->encode ();
// 	    	exit();
// 		}

	}
	
	

	protected function ticker() {
	    require_once dirname(dirname(__FILE__)).'/Controllers/ticker.php';
	    $nt = new tickerController($this->method, $this->args,$this->file);
	    return $nt->execute();
	}
	
	protected function auth() {
		require_once 'Models/users.php';
		switch ($this->method) {
			case "GET" :
			    $result = array();
				$user = users::checkUser ( $this->verb );
				$result = $user->toArray ();
				$userID = $user->ID;
				if ($userID == 0){
				    return 0;
				}
				return $result;
				break;
		}
	}
}
?>