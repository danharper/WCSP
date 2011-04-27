<?php
class NavigationItem {
	public $id, $name, $title, $current;

	function __construct($row) {
		$this->id = $row->id;
		$this->name = $row->name;
		$this->title = $row->title;
		$this->current = (
			Router::$route == "category" &&
			Router::$action == "show" &&
			Router::$id == $row->id
		) ? true : false;
	}
}
