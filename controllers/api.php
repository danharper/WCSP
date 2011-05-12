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

}
