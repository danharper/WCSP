<!DOCTYPE html>
<html lang="en" class="no-js">
<head> 
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $this->title; ?></title>
	<link rel="stylesheet" href="<?php echo ROOT; ?>/static/css/reset.css">
	<link rel="stylesheet" href="<?php echo ROOT; ?>/static/css/style.css">
</head> 
<body>

	<header>
		<h1>The Super Mega <b>Awesome</b> Shopping Site</h1>
	</header>
	
	<nav>
		<ul>
			<?php
			$current = 'class="current"';
			$class = ($this->current_page = "home") ? $current : ''; ?>

			<li <?php echo $class; ?>>
				<a href="<?php echo ROOT; ?>">Home</a>
			</li>

			<?php
			foreach ($this->navigation->get_items() as $nav) {
				$class = (isset($_GET['cat']) && $_GET['cat'] == $nav->id) ? $current : '';
				echo '<li ' . $class . '>';
				echo '<a href="' . ROOT . '/?cat=' . $nav->id . '">' . $nav->name . '</a>';
				echo '</li>';
			}
			?>
		</ul>
	</nav>
	
	<section id="main">
