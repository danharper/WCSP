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

	function render($page = '') {
		$page = ($page == '') ? Router::$current_page : $page;
		extract($this->payload);
		include ('partials/header.php');
		require ('views/' . $page . '.php');
		include ('partials/sidebar.php');
		include ('partials/footer.php');
	}

}
