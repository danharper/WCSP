<?php
class Controller {
	protected $payload, $current_page; // used in views

	function __construct() {
		$this->payload = array(
			"title" => SITE_TITLE,
			"navigation" => new Navigation
		);
		$this->current_page = Router::$current_page;
	}

	function set_title($title) {
		$this->payload["title"] = $title . ' | ' . SITE_TITLE;
	}

	function add_payload($key, $value) {
		$this->payload[$key] = $value;
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

		include ('partials/header.php');
		echo "$route#$action($id)<br>";
		require ('views/'. $route .'/'. $action .'.php');
		include ('partials/sidebar.php');
		include ('partials/footer.php');
	}

	function link_to($route, $action = 'index', $id = '') {
		$link = ROOT . '/?route='. $route .'&action='. $action;
		if ($id != '') $link .= '&id='. $id;
		return $link;
	}

}
