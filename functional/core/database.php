<?php
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
