<?php
class Basket extends Controller {
	private $basket;
	
	function __construct() {
		parent::__construct();
		$this->set_title("Basket");

		$this->basket = (isset($_SESSION['basket'])) ? $_SESSION['basket'] : NULL;
		$this->add_payload("basket", $this->basket);

		if (isset($_GET['type']) && $_GET['type'] == 'update') {
			$this->update();
		}
		else {
			$this->index();
		}

		$this->render();
	}

	function index() {
		$new = array(
			array(
				"id" => 2,
				"quantity" => 1
			),
			array(
				"id" => 1,
				"quantity" => 3
			)
		);

	}

	function update() {
		
	}

}
