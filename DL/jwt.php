<?php
use Firebase\JWT\JWT;
require_once dirname ( dirname ( __FILE__ ) ) . "/Library/jwt/autoload.php";

class DALJWT 
{
	private $data;
	private $alg;
	private $key;
	function __construct($data) {
		$this->data=$data;
		$this->alg = "HS256";
		$this->key=project::secret;
	}
	
	function encode () {
		$jwt = new JWT();
		return $jwt->encode($this->data, $this->key,$this->alg);
	}
	
	function decode () {
		$jwt = new JWT();
		return $jwt->decode(str_replace('"','',$this->data),$this->key,array('HS256'));
	}
	
}



