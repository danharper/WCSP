<?php
class Admin_Category extends Controller {

	function __construct() {
		parent::__construct();
		$this->set_title("Admin");
	}

	function index() {
		$this->set_title("Category Management - Admin");
		$this->render();
	}

	function create() {
		$name = mysql_real_escape_string($_POST['name']);
		DB::query("INSERT INTO `categories` (name) VALUES('$name')");
		$this->redirect('admin_category');
	}

	function edit() {
		$id = mysql_real_escape_string($_GET['id']);
		$this->set_title('Edit Category - Admin');
		$category = DB::get('SELECT * FROM `categories` WHERE `id` = '.$id);
		$this->add_payload("category", $category);

		if ($category->parent_id) {
			$parent = DB::get('SELECT * FROM `categories` WHERE `id` = '.$category->parent_id);
			$this->add_payload("parent", $parent);
		}

		$this->render();
	}

	function update() {
		$id = mysql_real_escape_string($_POST['id']);
		$name = mysql_real_escape_string($_POST['name']);
		$parent = mysql_real_escape_string($_POST['parent']);
		if ($parent == 0) {
			DB::query("UPDATE `categories` SET `name` = '$name', `parent_id` = NULL WHERE `id` = $id");
		}
		else {
			DB::query("UPDATE `categories` SET `name` = '$name', `parent_id` = '$parent' WHERE `id` = $id");
		}
		$this->redirect('admin_category');
	}

}
