<?php
class NavigationItem {
	public $id, $name, $title, $current;

	function __construct($row) {
		$this->id = $row->id;
		$this->name = $row->name;
		$this->title = $row->title;
		$this->current = (isset($_GET['cat']) && $_GET['cat'] == $this->id) ? true : false;
	}
}
