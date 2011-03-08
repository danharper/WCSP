<?php
class Basket extends Controller {
	private $basket;

	////////// An example: //////////
	// $basket[$product_id] = array(
	//   "name" => "Bowl of Rice",
	//   "quantity" => "2",
	//   "price" => "12.99"
	// );

	function __construct() {
		parent::__construct();
		$this->set_title("Basket");
		$this->basket = (isset($_SESSION['basket'])) ? $_SESSION['basket'] : NULL;
		$this->add_payload("basket", $this->basket);
	}

	function index() {
		// show items in Basket
		$this->render();
	}

	function create() {
		// add a new/update an item
		if ($_POST['id'] == '') $this->redirect('basket');
		$id = $_POST['id'];

		$product = array(
			"name" => $_POST['name'],
			"quantity" => ($_POST['quantity'] > 0) ? $_POST['quantity'] : 1,
			"price" => $_POST['price']
		);
		$_SESSION['basket'][$id] = $product;

		$this->redirect('basket');
	}

	function update() {
		if ($_POST['id'] == '') $this->redirect('basket');
		$id = $_POST['id'];
		$quantity = $_POST['quantity'];
		$_SESSION['basket'][$id]['quantity'] = $quantity;
		$this->redirect('basket');
	}

	function delete() {
		// remove an item
		if ($_POST['id'] == '') $this->redirect('basket');
		$id = $_POST['id'];
		unset($_SESSION['basket'][$id]);
		$this->redirect('basket');
	}

	function destroy() {
		// clear basket
		session_destroy();
		$this->redirect('basket');
	}

}
