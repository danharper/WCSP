<?php
class Admin_Home extends Controller {

	function __construct() {
		parent::__construct();
		$this->set_title("Admin");
	}

	function index() {
		$this->set_title("Administrator Panel");
		$this->render();
	}

}
