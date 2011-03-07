<?php
class Category extends Controller {
	
	function __construct() {
		parent::__construct();
		$this->set_title("Category");
	}

	function index() {
		// redirect to home
		$this->redirect();
	}

	function show($id = '') {
		// no id? go home!
		if ($id == '') $this->redirect();
		
		$products = DB::fetch('SELECT * FROM `products` WHERE `category_id` = '. $id);
		$this->add_payload("products", $products);
		$this->render();
	}

}
