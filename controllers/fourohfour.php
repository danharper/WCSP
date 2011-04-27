<?php
class FourOhFour extends Controller {
	
	function __construct($error = '') {
		parent::__construct();
		header('HTTP/1.1 404 Not Found');
		$this->set_title("404 Page Not Found");
		$this->add_payload("error", $error);
		$this->render('fourohfour', 'index');
	}

}
