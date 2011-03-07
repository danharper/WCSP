<?php
class Home extends Controller {

	function __construct() {
		parent::__construct();
		$this->set_title("Latest Products");
		$this->index();
		$this->render();
	}

	function index() {
		$products = DB::fetch("SELECT * FROM `products` LIMIT 2");
		$this->add_payload("products", $products);
	}

}
