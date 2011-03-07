<?php
class Site {

	public $db;
	private $payload;
	private $default_route, $routes, $current_page, $is_home;

	function __construct() {
		include ('routes.php');
		$this->db = new mysqli (DB_HOST, DB_USER, DB_PASS, DB_NAME); //need to handle $db->connect_error

		$this->payload = array(
			"title" => SITE_TITLE,
			"navigation" => new Navigation,
			"content" => ""
		);

		$this->is_home = (sizeof($_GET) == 0) ? true : false;
		$this->current_page = ($this->is_home) ? $this->default_route : "404";

		foreach ($this->routes as $get => $page) {
			if (isset($_GET[$get])) {
				$this->current_page = $page;
				break;
			}
		}

		require ('controllers/' . $this->current_page . '.php');
	}

	function set_title($title) {
		$this->payload["title"] = $title . ' | ' . SITE_TITLE;
	}

	function set_content($content) {
		$this->payload["content"] = $content;
	}

	function add_payload($key, $value) {
		$this->payload[$key] = $value;
	}

	function render($page = '') {
		$page = ($page == '') ? $this->current_page : $page;
		extract($this->payload);
		include ('partials/header.php');
		require ('views/' . $page . '.php');
		include ('partials/sidebar.php');
		include ('partials/footer.php');
	}

};
