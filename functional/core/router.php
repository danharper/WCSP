<?php
class Router {
	public static $default, $routes, $current_page, $is_home;

	function __construct() {
		include ('routes.php');

		self::$is_home = (sizeof($_GET) == 0) ? true : false;
		self::$current_page = (self::$is_home) ? self::$default : "404";

		foreach (self::$routes as $get => $page) {
			if (isset($_GET[$get])) {
				self::$current_page = $page;
				break;
			}
		}
	}

}
