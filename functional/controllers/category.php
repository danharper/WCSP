<?php
class Category extends Controller {
	
	function __construct() {
		parent::__construct();
		$this->set_title("Category");
		$this->render();
	}

}
