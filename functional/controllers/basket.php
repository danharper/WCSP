<?php
class Basket extends Controller {

	function __construct() {
		parent::__construct();
		$this->set_title("Basket");
	}

	function index() {
		// show items in Basket
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
