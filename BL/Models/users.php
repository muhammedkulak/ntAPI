<?php
require_once dirname ( dirname ( dirname ( __FILE__ ) ) ) . "/DL/DAL.php";
use data\TableItem;
class users extends TableItem {
	// fields
	public $ID;
	public $providerID;
	public $email;
	public $fullName;
	public $password;
	public $userType;
	public $userRoleType;
	public $_createdDate;
	public $isActive;
	
	// Counctructor
	function __construct($ID = NULL) {
		parent::__construct ();
		$this->ID = $ID;
		$this->settable ( "users" );
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
	
	public static function checkUser ($up) {
	    $intc = new self();
	    $intc->refreshProcedure("call pcheckUser('$up')");
	    return $intc;
	}
	
}
?>