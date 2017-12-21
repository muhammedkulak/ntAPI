<?php
require_once 'Models/apiKeys.php';
class apiAuth {
	public function verifyKey($key, $origin) {
		$ak = apiKeys::getApiKey($key);
		if ($ak->ID>0){
			return true;
		} else {
			return false;
		}
	}
}
?>