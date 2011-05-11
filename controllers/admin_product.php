<?php
class Admin_Product extends Controller {

	function __construct() {
		parent::__construct();
		$this->set_title("Admin");
	}

	function index() {
		$this->set_title("Product Management - Admin");
		$products = DB::fetch('SELECT * FROM `products`');
		$images = array();
		foreach ($products as $p) {
			$images[$p->id] = $this->get_main_image($p->id);
		}
		$this->add_payload("products", $products);
		$this->add_payload("images", $images);
		$this->render();
	}

	function add() {
		$this->set_title("Add New Product - Admin");
		$this->render();
	}

	function create() {
		$title = mysql_real_escape_string($_POST['title']);
		$category_id = mysql_real_escape_string($_POST['category']);
		$description = mysql_real_escape_string($_POST['description']);
		$price = mysql_real_escape_string($_POST['price']);
		$stock = mysql_real_escape_string($_POST['stock']);

		if (!empty($title) && !empty($category_id) && !empty($description) && !empty($price) && $stock >= 0) {
			// go ahead
			DB::query("INSERT INTO `products` (`title`, `category_id`, `description`, `price`, `stock`) VALUES ('$title', '$category_id', '$description', '$price', '$stock')");
			$this->session->add_success("Product listed successfully.");
			$this->redirect('admin_product');
		}
		else {
			$this->session->add_error("All fields must be filled in correctly.");
			$this->redirect('admin_product', 'add');
		}
	}

	function edit() {
		$id = mysql_real_escape_string($_GET['id']);
		$this->set_title('Edit Product - Admin');
		$product = DB::get('SELECT * FROM `products` WHERE `id` = '.$id);
		$product->lowstock = false;
		if ($product->stock <= 10) {
			$product->lowstock = true;
		}
		$images = $this->get_all_images($product->id);
		$this->add_payload("product", $product);
		$this->add_payload("images", $images);
		$this->render();
	}

	function update() {
		$id = mysql_real_escape_string($_POST['id']);
		$title = mysql_real_escape_string($_POST['title']);
		$category_id = mysql_real_escape_string($_POST['category']);
		$description = mysql_real_escape_string($_POST['description']);
		$price = mysql_real_escape_string($_POST['price']);
		$stock = mysql_real_escape_string($_POST['stock']);
		if (!empty($id) && !empty($title) && !empty($category_id) && !empty($description) && !empty($price) && $stock >= 0) {
			DB::query("UPDATE `products` SET `title` = '$title', `category_id` = '$category_id', `description` = '$description', `price` = '$price', `stock` = '$stock' WHERE `id` = '$id'");
			$this->session->add_success("Product updated successfully.");
			$this->redirect('admin_product');
		}
		else {
			$this->session->add_error("All fields must be filled in correctly.");
			$this->redirect('admin_product', 'edit', $id);
		}
	}
}
