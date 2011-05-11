<?php
class Admin_Stats extends Controller {

	function __construct() {
		parent::__construct();
		$this->set_title("Admin");
	}

	function index() {
		$this->set_title("Store Statistics - Admin");
		$lowstock = DB::fetch("SELECT * FROM `products` WHERE `stock` < '25' AND `stock` > '0'");
		$nostock = DB::fetch("SELECT * FROM `products` WHERE `stock` = '0'");
		$this->add_payload("lowstock", $lowstock);
		$this->add_payload("nostock", $nostock);
		$this->render();
	}

}
