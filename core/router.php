<?php
class Router {
	public static $default, $route, $action, $id;
	public static $session;

	function __construct() {
		include ('routes.php');
		self::$session = new Session;

		self::$route = (isset($_GET['route'])) ? $_GET['route'] : self::$default["route"];
		self::$action = (isset($_GET['action'])) ? $_GET['action'] : self::$default["action"];
		self::$id = (isset($_GET['id'])) ? $_GET['id'] : null;

		if (!file_exists('controllers/'.self::$route.'.php')) {
			$error = 'Route Not Found: '.self::$route.'#'.self::$action.'('.self::$id.')';
			new FourOhFour($error);
			die();
		}

		if (!method_exists(self::$route, self::$action)) {
			$error = 'Action Not Found: '.self::$route.'#'.self::$action.'('.self::$id.')';
			new FourOhFour($error);
			die();
		}

		$s = new self::$route;
		$a = self::$action;
		$i = self::$id;
		$s->$a($i);
	}

}
