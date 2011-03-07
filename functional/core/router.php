<?php
class Router {
	public static $default, $routes, $current_page, $is_home; // shouldn't be using...
	public static $route, $action, $id;

	function __construct() {
		include ('routes.php');

		// self::$is_home = (sizeof($_GET) == 0) ? true : false;
		// self::$current_page = (self::$is_home) ? self::$default : "fourohfour";

		// self::$is_home = (sizeof($_GET) == 0 || $_GET['route'] == "home") ? true : false;
		// self::$current_page = (self::$is_home) ? self::$default : "fourohfour";

		self::$route = (isset($_GET['route'])) ? $_GET['route'] : self::$default["route"];
		self::$action = (isset($_GET['action'])) ? $_GET['action'] : self::$default["action"];
		self::$id = (isset($_GET['id'])) ? $_GET['id'] : null;

		$s = new self::$route;
		$a = self::$action;
		$i = self::$id;
		$s->$a($i);

		// self::$current_page = self::$route;


		// foreach (self::$routes as $get => $page) {
			// if (isset($_GET[$get])) {
				// self::$current_page = $page;
				// break;
			// }
		// }
	}

}
