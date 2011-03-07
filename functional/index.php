<?php
class Site {

	public $db;
	private $content, $title, $navigation;
	private $default_route, $routes, $current_page;

	function __construct() {
		include ('inc/core.php');
		$this->db = new mysqli (DB_HOST, DB_USER, DB_PASS, DB_NAME); //need to handle $db->connect_error
		$this->content = "";
		$this->title = SITE_TITLE;
		$this->navigation = new Navigation;

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
		$this->title = $title;
	}

	function set_content($content) {
		$this->content = $content;
	}

	function render($page = '') {
		$page = ($page == '') ? $this->current_page : $page;
		include ('partials/header.php');
		require ('views/' . $page . '.php');
		include ('partials/sidebar.php');
		include ('partials/footer.php');
	}

};

class Page {
	private $title;
	private $content;

	public function set_title($title) {
		$this->title = $title;
	}

	public function get_title() {
		return $this->title;
	}

	public function set_content($content) {
		$this->content = $content;
	}

	public function get_content() {
		return $this->content;
	}
}

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


