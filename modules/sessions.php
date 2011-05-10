<?php
class Session {
	private $session;

	function __construct() {
		if (isset($_SESSION['flash'])) {
			$this->session =& $_SESSION['flash'];
		}
		else {
			$_SESSION['flash'] = array();
			$this->session =& $_SESSION['flash'];
			$this->session['error'] = array();
			$this->session['success'] = array();
		}
	}

	function add_error($message) {
		$this->session['error'][] = $message;
	}

	function add_success($message) {
		$this->session['success'][] = $message;
	}

	function get_error() {
		$x = $this->session['error'];
		$this->session['error'] = array(); // flash reset once used
		return $x;
	}

	function get_success() {
		$x = $this->session['success'];
		$this->session['success'] = array(); // flash reset once used
		return $x;
	}

}
