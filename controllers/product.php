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
			echo $images[$p->id]->path.'<br>';
		}
		$this->add_payload("products", $products);
		$this->add_payload("images", $images);
		$this->render();
	}

	function show() {
		$id = mysql_real_escape_string($_GET['id']);		
		$product = DB::get('SELECT * FROM `products` WHERE `id` = '. $id);
		$product->lowstock = false;
		if ($product->stock <= 10) {
			$product->lowstock = true;
		}
		$images = $this->get_all_images($product->id);
		$this->add_payload("product", $product);
		$this->add_payload("images", $images);
		$this->render();
	}

	function search() {
		$query = mysql_real_escape_string($_GET['q']);
		$products = DB::search($query);
		$images = array();
		foreach ($products as $p) {
			$images[$p->id] = $this->get_main_image($p->id);
		}
		$this->add_payload("query", $query);
		$this->add_payload("products", $products);
		$this->add_payload("images", $images);
		$this->render();
	}

}
