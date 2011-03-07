<?php
class Controller {
	private $payload;

	function __construct() {
		$payload = array(
			"title" => SITE_TITLE,
			"navigation" => new Navigation
		);
	}
}
