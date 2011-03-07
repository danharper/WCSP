<?php
class Site {

	public $db;
	private $payload;
	private $default_route, $routes, $current_page;

	function __construct() {
		include ('inc/core.php');
		$this->db = new mysqli (DB_HOST, DB_USER, DB_PASS, DB_NAME); //need to handle $db->connect_error

		$this->payload = array(
			"title" => SITE_TITLE,
			"navigation" => new Navigation,
			"content" => ""
		);

		$this->current_page = (sizeof($_GET) == 0) ? $this->default_route : "404";

		foreach ($this->routes as $get => $page) {
			if (isset($_GET[$get])) {
				$this->current_page = $page;
				break;
			}
		}

		require ('controllers/' . $this->current_page . '.php');
	}

	function set_title($title) {
		$this->payload["title"] = $title;
	}

	function set_content($content) {
		$this->payload["content"] = $content;
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

class Navigation {
	private $items;

	function __construct() {
		$this->items = array();

		$db = new Database;
		$result = $db->query("SELECT * FROM `categories` WHERE `parent_id` IS NULL");
		while ($row = $result->fetch_object()) {
			$this->items[] = $row;
		}
	}

	function add_item($item) {
		$this->items[] = $item;
	}

	function get_items() {
		return $this->items;
	}
}

class Database {
	private $connection;

	function __construct() {
		$this->connection = new mysqli (DB_HOST, DB_USER, DB_PASS, DB_NAME);
		return $this->connection;
	}

	function query($q) {
		return $this->connection->query($q);
	}

	function __destruct() {
		$this->connection->close();
	}
}

$s = new Site;


