<?php
class Basket extends Controller {
	
	function __construct() {
		parent::__construct();
		$this->set_title("Basket");
		$this->render();
	}

}
