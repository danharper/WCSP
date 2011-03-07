<?php
class Product extends Controller {
	
	function __construct() {
		parent::__construct();
		$this->set_title("Product");
		$this->index();
		$this->render();
	}

	function index() {
		$id = $_GET['product'];
		$product = DB::get('SELECT * FROM `products` WHERE `id` = '. $id);
		$this->add_payload("product", $product);
	}

}
