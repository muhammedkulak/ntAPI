<?php
require_once dirname ( dirname ( dirname ( __FILE__ ) ) ) . "/DL/DAL.php";
use data\TableItem;
class endpointRoleActions extends TableItem {
	// fields
	public $ID;
	public $endpointID;
	public $roleID;
	public $methodID;
	public $action;
	
	// Counctructor
	function __construct($ID = NULL) {
		parent::__construct ();
		$this->ID = $ID;
		$this->settable ( "endpointRoleActions" );
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
	
	public static function getAuth ($apiKey,$endPointID,$methodID) {
	    $intc = new self();
	    $intc->refreshProcedure("call pgetApiAuth('$apiKey',$endPointID,$methodID)");
	    return $intc;
	}
	
}
?>
