<?php
class FourOhFour extends Controller {
	
	function __construct() {
		parent::__construct();
		$this->set_title("404 Page Not Found");
		$this->render();
	}

}
