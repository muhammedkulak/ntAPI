<?php
require_once dirname ( dirname ( dirname ( __FILE__ ) ) ) . "/DL/DAL.php";
use data\TableItem;
class endpoints extends TableItem {
	// fields
	public $ID;
	public $endpoint;
	
	// Counctructor
	function __construct($ID = NULL) {
		parent::__construct ();
		$this->ID = $ID;
		$this->settable ( "endpoints" );
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
	
	public static function getEndpointFromName ($endPoint) {
	    $intc = new self();
	    $intc->refreshProcedure("select * from endpoints where endpoint='$endPoint'");
	    return $intc;
	}
	
}
?>
