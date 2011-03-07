<?php
class NavigationItem {
	public $id, $name, $title, $current;

	function __construct($id = '', $name = '', $title = '') {
		$this->id = $id;
		$this->name = $name;
		$this->title = $title;
		$this->current = $this->check_if_current();
	}

	function extract($row) {
		$this->id = $row->id;
		$this->name = $row->name;
		$this->title = $row->title;
		$this->current = $this->check_if_current();
	}

	function check_if_current() {
		return (isset($_GET['cat']) && $_GET['cat'] == $this->id) ? true : false;
	}
}
