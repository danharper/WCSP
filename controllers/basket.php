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
		$item = DB::get("SELECT * FROM `products` WHERE `id` = '$id'");
		if ($quantity <= $item->stock) {
			$this->cart->update($id, $quantity);
		}
		else {
			$this->session->add_error("There are only ".$item->stock." of that product left in stock.");
		}
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
		$this->session->add_success("Product removed from your basket.");
		$this->redirect('basket');
	}

	function destroy() {
		// clear basket
		$this->cart->clear();
		echo 'hey';
	}

	function checkout() {
		$this->render();
	}

	function order() {
		$fname = mysql_real_escape_string($_POST['fname']);
		$lname = mysql_real_escape_string($_POST['lname']);
		$address = mysql_real_escape_string($_POST['address']);
		$town = mysql_real_escape_string($_POST['town']);
		$postcode = mysql_real_escape_string($_POST['postcode']);
		$tel = mysql_real_escape_string($_POST['tel']);
		$email = mysql_real_escape_string($_POST['email']);
		$created_at = time();

		if (!empty($fname) && !empty($lname) && !empty($address) && !empty($town) && !empty($postcode) && !empty($email)) {
			// create new order record
			DB::query("INSERT INTO `orders` (`user_id`, `fname`, `lname`, `address`, `town`, `postcode`, `tel`, `email`, `created_at`) VALUES ('1', '$fname', '$lname', '$address', '$town', '$postcode', '$tel', '$email', '$created_at')");
			$order = DB::get("SELECT `id` FROM `orders` WHERE `user_id` = '1' ORDER BY `id` DESC LIMIT 1");
			$order_id = $order->id;

			// add order rows
			foreach ($this->cart->products() as $id => $product) {
				$quantity = $product['quantity'];
				DB::query("INSERT INTO `orderrows` (`order_id`, `product_id`, `quantity`) VALUES ('$order_id', '$id', '$quantity')");
			}

			// success
			$this->session->add_success("Order placed successfully.");
			$this->cart->clear();
			$this->redirect('product');
		}
		else {
			$this->session->add_error("Please fill out all required fields.");
			$this->redirect('basket', 'checkout');
		}
	}

}
