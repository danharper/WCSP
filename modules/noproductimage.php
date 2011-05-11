<?php
class NoProductImage {
	public $name, $path, $alt;

	function __construct() {
		$this->name = 'noimage.png';
		$this->path = ROOT.'/static/productimages/'.$this->name;
		$this->alt = "Product does not yet have an image.";
	}
}
