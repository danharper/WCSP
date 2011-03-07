<?php
class Home extends Controller {

	function __construct() {
		parent::__construct();
		$this->set_title("Latest Products");
		$this->render();
	}

}
