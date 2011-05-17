<?php
class DB {
	private static $connection;

	static function connection() {
		if (!self::$connection) {
			self::$connection = @new mysqli (DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if (self::$connection->connect_error) {
				header('Location: '. ROOT .'/install.php');
				die();
			}
		}
		return self::$connection;
	}

	// Multiple results
	static function query($q) {
		return self::connection()->query($q);
	}

	// Single result
	static function get($q) {
		return self::connection()->query($q)->fetch_object();
	}

	// Multiple results, pre-sorted
	static function fetch($q) {
		$result = self::connection()->query($q);
		$fetch = array();
		while ($row = $result->fetch_object()) {
			$fetch[] = $row;
		}
		return $fetch;
	}

	// Search results
	static function search($q) {
		$term = "SELECT * FROM `products` WHERE `title` LIKE '%".$q."%'";
		$result = self::connection()->query($term);
		$fetch = array();
		while ($row = $result->fetch_object()) {
			$fetch[] = $row;
		}
		return $fetch;
	}

}
