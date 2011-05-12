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
	}

	function products() {
		return $this->cart;
	}

	// just number of products
	function size() {
		return sizeof($this->cart);
	}

	// products * quantity
	function total_size() {
		$total = 0;
		foreach ($this->cart as $item) {
			$total += $item['quantity'];
		}
		return $total;
	}

	function total_price() {
		$total = 0;
		foreach ($this->cart as $item) {
			if ($item['quantity'] > 0)
				$total += ($item['quantity'] * $item['price']);
		}
		// return $total;
		return number_format($total, 2);
	}

	function get($id) {
		if (isset($this->cart[$id])) return $this->cart[$id];
		return false;
	}

	function add($id, $name, $price, $quantity) {
		$status = 1;
		$item = DB::get("SELECT `stock` FROM `products` WHERE `id` = '$id' LIMIT 1");
		if (isset($this->cart[$id])) {
			if (($quantity + $this->cart[$id]['quantity']) > $item->stock) {
				$quantity = $item->stock;
				$status = 0;
			}
			else {
				$quantity += $this->cart[$id]['quantity'];
			}
		}

		if ($quantity >= $item->stock) {
			$status = 0;
		}

		$this->cart[$id] = array(
			'name' => $name,
			'price' => $price,
			'quantity' => $quantity
		);
		return $status;
	}

	function update($id, $quantity) {
		if (isset($this->cart[$id])) {
			if ($quantity > 0) {
				$this->cart[$id]['quantity'] = $quantity;
			}
			else {
				$this->remove($id);
			}
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
