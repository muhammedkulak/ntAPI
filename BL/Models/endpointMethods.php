<?php
require_once dirname ( dirname ( dirname ( __FILE__ ) ) ) . "/DL/DAL.php";
use data\TableItem;
class endpointMethods extends TableItem {
	// fields
	public $ID;
	public $method;
	
	// Counctructor
	function __construct($ID = NULL) {
		parent::__construct ();
		$this->ID = $ID;
		$this->settable ( "endpointMethods" );
		$this->refresh ( $ID );
	}
	function __set($property, $value) {
		$this->$property = $value;
	}
	function __get($property) {
		if (isset ( $this->$property )) {
			return $this->$property;
		}
	}
	
	public static function getMethodFromName ($method) {
	    $intc = new self();
	    $intc->refreshProcedure("select * from endpointMethods where method='$method'");
	    return $intc;
	}
	
}
?>
