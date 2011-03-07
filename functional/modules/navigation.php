<?php
class Navigation {
	private $items;

	function __construct() {
		$this->items = array();

		$db = new Database;
		$result = $db->query("SELECT * FROM `categories` WHERE `parent_id` IS NULL");
		while ($row = $result->fetch_object()) {
			$item = new NavigationItem;
			$item->extract($row);
			$this->items[] = $item;
		}
	}

	function get_items() {
		return $this->items;
	}
}
