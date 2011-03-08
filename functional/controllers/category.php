<?php
class Category extends Controller {
	
	function __construct() {
		parent::__construct();
		$this->set_title("Category");
	}

	function index() {
		$this->redirect(); // redirect to home
	}

	function show($id = '') {
		if ($id == '') $this->redirect(); // no id? go home!
		
		$products = DB::fetch('SELECT * FROM `products` WHERE `category_id` = '. $id);
		$this->add_payload("products", $products);
		$this->render();
	}

}
