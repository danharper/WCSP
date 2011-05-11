<?php
class Session {
	private $session, $error, $success;

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
		$this->error =& $this->session['error'];
		$this->success =& $this->session['success'];
	}

	function add_error($message) {
		$this->error[] = $message;
	}

	function add_success($message) {
		$this->success[] = $message;
	}

	function count_errors() {
		return count($this->error);
	}

	function get_errors() {
		$x = $this->error;
		$this->error = array(); // flash reset once used
		return $x;
	}

	function count_successes() {
		return count($this->success);
	}

	function get_successes() {
		$x = $this->success;
		$this->success = array(); // flash reset once used
		return $x;
	}

}
