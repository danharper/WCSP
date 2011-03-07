<?php
class DB {
	private static $connection;

	static function connection() {
		if (!self::$connection) {
			self::$connection = new mysqli (DB_HOST, DB_USER, DB_PASS, DB_NAME);
		}
		return self::$connection;
	}

	static function query($q) {
		return self::connection()->query($q);
	}

	static function fetch($q) {
		$result = self::connection()->query($q);
		while ($row = $result->fetch_object()) {
			$fetch[] = $row;
		}
		return $fetch;
	}

}
