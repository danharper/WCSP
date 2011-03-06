<?php
function get_nav() {
	$file = basename($_SERVER['SCRIPT_NAME']);

	$class = ($file == 'index.php') ? ' class="current"' : '';
	echo '<li' . $class . '><a href="' . ROOT . '">Home</a></li>';

	$db = new mysqli (DB_HOST, DB_USER, DB_PASS, DB_NAME); //need to handle $db->connect_error
	$q = "SELECT * FROM `categories` WHERE `parent_id` IS NULL";
	if ($result = $db->query($q)) {
		while ($row = $result->fetch_object()) {
			// $file = 'category.php';
			$file_name = explode('?', $file);
			$file_name = $file_name[0];
			$id = (isset($_GET['id'])) ? $_GET['id'] : '';
			$class = ($file_name == 'category.php' && $id == $row->id) ? ' class="current"' : '';
			$r = '<li' . $class . '><a href="' . ROOT . '/category.php?id=' . $row->id . '">' . $row->name . '</a></li>';
			echo $r;
		}
	}
	else {
		echo "nope";
	}
}
