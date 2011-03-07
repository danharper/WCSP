<?php
class Category extends Controller {
	
	function __construct() {
		parent::__construct();
		$this->set_title("Category");
		$this->index();
		$this->render();
	}

	function index() {
		$id = $_GET['cat'];
		$products = DB::fetch('SELECT * FROM `products` WHERE `category_id` = '. $id);
		$this->add_payload("products", $products);
	}

}
