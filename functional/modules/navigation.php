<?php
class Navigation {
	private $items;

	function __construct() {
		$this->items = array();

		// $db = new Database;
		$result = DB::query("SELECT * FROM `categories` WHERE `parent_id` IS NULL");
		while ($row = $result->fetch_object()) {
			$this->items[] = new NavigationItem($row);
		}
	}

	function get_items() {
		return $this->items;
	}
}
