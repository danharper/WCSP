<?php
class Admin_Css extends Controller {

	function __construct() {
		parent::__construct();
		$this->set_title("Admin");
	}

	function index() {
		$this->set_title("Customise - Admin");
		$css = DB::get("SELECT `css` FROM `options` WHERE `id` = '1'");
		// $this->add_payload("css", $css->css);
		$this->render();
	}

	function update() {
		$css = mysql_real_escape_string($_POST['css']);
		DB::query("UPDATE `options` SET `css` = '$css'");
		$this->session->add_success("CSS styles updated successfully.");
		$this->redirect('admin_css');
	}

}
