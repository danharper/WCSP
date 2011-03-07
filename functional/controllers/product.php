<?php
class Product extends Controller {
	
	function __construct() {
		parent::__construct();
		$this->set_title("Product");
		// $this->index();
	}

	function index() {
		$this->set_title("Latest Products");
		$products = DB::fetch('SELECT * FROM `products`');
		$this->add_payload("products", $products);
		$this->render();
	}

	function show() {
		$id = $_GET['id'];
		$product = DB::get('SELECT * FROM `products` WHERE `id` = '. $id);
		$this->add_payload("product", $product);
		$this->render();
	}

}
