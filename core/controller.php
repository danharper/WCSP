<?php
class Controller {
	protected $cart;
	protected $payload, $is_home; // used in views

	function __construct() {
		$this->cart = new Cart;

		$this->payload = array(
			"title" => SITE_TITLE,
			"navigation" => new Navigation,
			"cart" => $this->cart
		);

		$this->is_home = (
			Router::$route == Router::$default["route"] &&
			Router::$action == Router::$default["action"]
		) ? true : false;
	}

	function set_title($title) {
		$this->payload["title"] = $title . ' | ' . SITE_TITLE;
	}

	function add_payload($key, $value) {
		$this->payload[$key] = $value;
	}

	function link_to($route, $action = 'index', $id = '') {
		$link = ROOT . '/?route='. $route .'&action='. $action;
		if ($id != '') $link .= '&id='. $id;
		return $link;
	}

	function link_to_path($path) {
		return ROOT . '/' . $path;
	}

	function redirect($route = '', $action = '') {
		$route = ($route == '') ? Router::$default['route'] : $route;
		$action = ($action == '') ? Router::$default['action'] : $action;
		header('Location: '. ROOT .'/?route='. $route .'&action='. $action);
		die();
	}

	function render($route = '', $action = '') {
		$route = ($route == '') ? Router::$route : $route;
		$action = ($action == '') ? Router::$action : $action;
		$id = Router::$id;

		extract($this->payload);

		echo "<div id='debug'><span>Debug Bar:</span> $route#$action($id)</div>";
		include ('partials/header.php');
		require ('views/'. $route .'/'. $action .'.php');
		include ('partials/sidebar.php');
		include ('partials/footer.php');
	}

	function partial($file, $payload = '') {
		if (isset($payload))
			extract($payload);
		require 'partials/'. $file .'.php';
	}

	protected function get_all_images($id) {
		return DB::fetch('SELECT * FROM `productimages` WHERE `product_id` = '. $id);
	}

	protected function get_main_image($id) {
		return DB::get('SELECT * FROM `productimages` WHERE `product_id` = '. $id .' AND `main` = 1 LIMIT 1');
	}

}
