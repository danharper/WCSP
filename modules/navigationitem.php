<?php
class NavigationItem {
	public $id, $name, $title, $current, $children;

	function __construct($row) {
		$this->id = $row->id;
		$this->name = $row->name;
		$this->title = $row->title;
		$this->current = (
			Router::$route == "category" &&
			Router::$action == "show" &&
			Router::$id == $row->id
		) ? true : false;

		$this->children = array();
		$result = DB::query('SELECT * FROM `categories` WHERE `parent_id` = '.$this->id);
		while ($row = $result->fetch_object()) {
			$this->children[] = new NavigationItem($row);
		}
	}
}
