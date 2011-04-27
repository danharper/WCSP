<?php
class Basket extends Controller {

	function __construct() {
		parent::__construct();
		$this->set_title("Basket");
	}

	function index() {
		// show items in Basket
		$images = array();
		foreach ($this->cart->products() as $id => $product) {
			$images[$id] = $this->get_main_image($id);
		}
		$this->add_payload("images", $images);
		$this->render();
	}

	function add() {
		// add a new/update an item
		if ($_POST['id'] == '') $this->redirect('basket');
		$id = $_POST['id'];

		$this->cart->add(
			$id,
			$_POST['name'],
			$_POST['price'],
			$_POST['quantity']
		);

		$this->redirect('basket');
	}

	function update() {
		if ($_POST['id'] == '') $this->redirect('basket');
		$id = $_POST['id'];
		$quantity = $_POST['quantity'];
		$this->cart->update($id, $quantity);
		$this->redirect('basket');
	}

	function increase() {
		if ($_GET['id'] == '') $this->redirect('basket');
		$id = $_GET['id'];
		$item = $this->cart->get($id);
		$quantity = $item['quantity'] + 1;
		$this->cart->update($id, $quantity);
		$this->redirect('basket');
	}

	function decrease() {
		if ($_GET['id'] == '') $this->redirect('basket');
		$id = $_GET['id'];
		$item = $this->cart->get($id);
		$quantity = $item['quantity'] - 1;
		if ($quantity > 0)
			$this->cart->update($id, $quantity);
		else
			$this->cart->remove($id);
		$this->redirect('basket');
	}

	function delete() {
		// remove an item
		if ($_POST['id'] == '') $this->redirect('basket');
		$id = $_POST['id'];
		$this->cart->remove($id);
		$this->redirect('basket');
	}

	function destroy() {
		// clear basket
		$this->cart->clear();
	}

}
