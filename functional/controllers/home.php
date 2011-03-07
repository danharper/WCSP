<?php
$this->set_title("Latest Products");
$this->render();

class Home extends Controller {
	private $title;

	function __construct() {
		// $this->set_title("Latest Products");
	}

}

new Home;
