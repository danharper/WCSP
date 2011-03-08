<?php
class Controller {
	protected $payload, $is_home; // used in views

	function __construct() {
		$this->payload = array(
			"title" => SITE_TITLE,
			"navigation" => new Navigation
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

}
