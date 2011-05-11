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
		if (empty($name)) {
			$this->session->add_error("All fields must be filled in correctly.");
			$this->redirect('admin_category');
		}
		DB::query("INSERT INTO `categories` (name) VALUES('$name')");
		$this->session->add_success('Category created.');
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

		if (empty($name)) {
			$this->session->add_error("All fields must be filled in correctly.");
			$this->redirect('admin_category', 'edit', $id);
		}

		if ($parent == 0) {
			DB::query("UPDATE `categories` SET `name` = '$name', `parent_id` = NULL WHERE `id` = $id");
		}
		else {
			DB::query("UPDATE `categories` SET `name` = '$name', `parent_id` = '$parent' WHERE `id` = $id");
		}
		$this->session->add_success('Category modified.');
		$this->redirect('admin_category');
	}

	function remove() {
		$id = mysql_real_escape_string($_POST['id']);
		$children = DB::get("SELECT COUNT(*) AS 'count' FROM `categories` WHERE `parent_id` = '$id'");
		if ($children->count) {
			$this->session->add_error("Can't remove a category which contains sub-categories. Please remove those first.");
		}
		else {
			DB::query("DELETE FROM `categories` WHERE `id` = '$id'");
			$this->session->add_success("Category removed.");
		}
		$this->redirect('admin_category');
	}
}
