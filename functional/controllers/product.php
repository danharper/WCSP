<?php
class Product extends Controller {
	
	function __construct() {
		parent::__construct();
		$this->set_title("Product");
	}

	function index() {
		$this->set_title("Latest Products");
		$products = DB::fetch('SELECT * FROM `products`');
		$images = array();
		foreach ($products as $p) {
			$images[$p->id] = $this->get_main_image($p->id);
		}
		$this->add_payload("products", $products);
		$this->add_payload("images", $images);
		$this->render();
	}

	function show() {
		$id = $_GET['id'];
		$product = DB::get('SELECT * FROM `products` WHERE `id` = '. $id);
		$this->add_payload("product", $product);
		$this->render();
	}

	private function get_all_images($id) {
		return DB::fetch('SELECT * FROM `productimages` WHERE `product_id` = '. $id);
	}

	private function get_main_image($id) {
		return DB::get('SELECT * FROM `productimages` WHERE `product_id` = '. $id .' AND `main` = 1 LIMIT 1');
	}

}
