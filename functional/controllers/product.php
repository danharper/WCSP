<?php
class Product extends Controller {
	
	function __construct() {
		parent::__construct();
		$this->set_title("Product");
		$this->render();
	}

}
