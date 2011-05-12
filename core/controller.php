<?php
class Controller {
	protected $cart;
	protected $session;
	protected $payload, $is_home; // used in views
	protected $js, $css;

	function __construct() {
		$this->cart = new Cart;
		$this->session = Router::$session;
		$this->js = array();
		$css = DB::get("SELECT `css` FROM `options` WHERE `id` = '1'");
		$this->css = $css->css;

		$this->payload = array(
			"title" => SITE_TITLE,
			"navigation" => new Navigation,
			"cart" => $this->cart,
			"session" => $this->session,
			"css" => $this->css
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

	function link_to($route = 'product', $action = 'index', $id = '') {
		$link = ROOT . '/?route='. $route .'&action='. $action;
		if ($id != '') $link .= '&id='. $id;
		return $link;
	}

	function link_to_path($path) {
		return ROOT . '/' . $path;
	}

	function redirect($route = '', $action = '', $id = '') {
		$route = ($route == '') ? Router::$default['route'] : $route;
		$action = ($action == '') ? Router::$default['action'] : $action;
		$id = ($id == '') ? '' : '&id='.$id;
		header('Location: '. ROOT .'/?route='. $route .'&action='. $action . $id);
		die();
	}

	function render($route = '', $action = '') {
		$route = ($route == '') ? Router::$route : $route;
		$action = ($action == '') ? Router::$action : $action;
		$id = Router::$id;

		extract($this->payload);

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

	function add_js($filename) {
		$this->js[] = $filename;
	}

	function get_js() {
		return $this->js;
	}

	protected function get_all_images($id) {
		$images = DB::fetch('SELECT * FROM `productimages` WHERE `product_id` = '. $id);
		if ($images) {
			foreach ($images as $image) {
				$path = ROOT.'/static/productimages/'.$id.'/'.$image->name;
				$image->path = $path;
			}
		}
		else {
			$images[] = new NoProductImage;
		}
		return $images;
	}

	protected function get_main_image($id) {
		$image = DB::get('SELECT * FROM `productimages` WHERE `product_id` = '. $id .' AND `main` = 1 LIMIT 1');
		if ($image) {
			$path = ROOT.'/static/productimages/'.$id.'/'.$image->name;
			$image->path = $path;
		}
		else {
			$image = new NoProductImage;
		}
		return $image;
	}

}
