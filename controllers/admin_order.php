<?php
class Admin_Order extends Controller {

	function __construct() {
		parent::__construct();
		$this->set_title("Admin");
	}

	function index() {
		$this->set_title("View Orders - Admin");
		$orders = DB::fetch("SELECT * FROM `orders` ORDER BY `id` DESC");
		foreach ($orders as $order) {
			$order->items = DB::fetch("SELECT * FROM `orderrows` WHERE `order_id` = '$order->id'");
			foreach($order->items as $item) {
				$item->details = DB::get("SELECT * FROM `products` WHERE `id` = '$item->id'");
			}
		}
		$this->add_payload("orders", $orders);
		$this->render();
	}

}
