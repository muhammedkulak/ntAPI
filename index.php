<?php
use Firebase\JWT\JWT;
require_once  ( dirname ( __FILE__ ) ) . "/Library/jwt/autoload.php";

$header = array("typ"=>"JWT","alg"=>"HS256");
$payload = array("name"=>"");
$secret = "";

$jwt = new JWT();
$result = $jwt->encode($payload, $secret,"HS256");
echo var_dump($result);