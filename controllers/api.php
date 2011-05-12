<?php
class Api extends Controller {

	function index() {
		echo 'super epic api. boo-ya!';
	}

	function total_basket_size() {
		echo $this->cart->total_size();
	}

	function total_basket_price() {
		echo $this->cart->total_price();
	}

	function product_stock_level() {
		if (isset($_GET['id'])) {
			$id = mysql_real_escape_string($_GET['id']);
			$result = DB::get("SELECT `stock` FROM `products` WHERE `id` = '$id' LIMIT 1");
			if ($result) {
				echo $result->stock;
			}
			else {
				echo 'not found';
			}
		}
		else {
			echo 'error';
		}
	}

	function update_basket_quantity() {
		$id = mysql_real_escape_string($_POST['id']);
		$quantity = mysql_real_escape_string($_POST['quantity']);
		$item = DB::get("SELECT * FROM `products` WHERE `id` = '$id'");
		if ($quantity <= $item->stock) {
			$this->cart->update($id, $quantity);
			echo 'success';
		}
		else {
			echo $item->stock;
		}
	}

	function add_to_basket() {
		$id = mysql_real_escape_string($_POST['id']);
		$name = mysql_real_escape_string($_POST['name']);
		$price = mysql_real_escape_string($_POST['price']);
		$quantity = mysql_real_escape_string($_POST['quantity']);
		$this->cart->add($id, $name, $price, $quantity);

		$m = 'You have <span class="items">'. $this->cart->total_size() .'</span>';
		$m .= ' items in your shopping basket, totalling <span class="price">&#163;';
		$m .= $this->cart->total_price() .'</span>.';
		echo $m;
	}

	function debug_message() {
		$m = 'You have <span class="items">'. $this->cart->total_size() .'</span>';
		$m .= ' items in your shopping basket, totalling <span class="price">&#163;';
		$m .= $this->cart->total_price() .'</span>.';
		echo $m;
	}

	function debug_cart() {
		echo '<pre>';
		print_r($this->cart->products());
		echo '</pre>';
	}

}
