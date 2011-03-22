<?php
class Cart {
	private $cart;

	function __construct() {
		if (isset($_SESSION['cart'])) {
			$this->cart =& $_SESSION['cart'];
		}
		else {
			$_SESSION['cart'] = array();
			$this->cart =& $_SESSION['cart'];
		}
		echo '<pre>' . print_r($this->cart) . '</pre>';
	}

	function size() {
		return sizeof($this->cart);
	}

	function total_price() {
		$total = 0;
		foreach ($this->cart as $item) {
			if ($item['quantity'] > 0)
				$total += ($item['quantity'] * $item['price']);
		}
		return $total;
	}
		

	function get($id) {
		return $cart[$id];
	}

	function add($id, $name, $price, $quantity) {
		$this->cart[$id] = array(
			'name' => $name,
			'price' => $price,
			'quantity' => $quantity
		);
	}

	function update($id, $quantity) {
		if (isset($this->cart[$id])) {
			$this->cart[$id]['quantity'] = $quantity;
			return true;
		}
		return false;
	}

	function remove($id) {
		unset($this->cart[$id]);
	}

	function clear() {
		$this->cart = array();
	}
		
		

}
