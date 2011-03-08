<?php
class Router {
	public static $default, $route, $action, $id;

	function __construct() {
		include ('routes.php');

		self::$route = (isset($_GET['route'])) ? $_GET['route'] : self::$default["route"];
		self::$action = (isset($_GET['action'])) ? $_GET['action'] : self::$default["action"];
		self::$id = (isset($_GET['id'])) ? $_GET['id'] : null;

		$s = new self::$route;
		$a = self::$action;
		$i = self::$id;
		$s->$a($i);
	}

}
