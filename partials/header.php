<!DOCTYPE html>
<html lang="en" class="no-js">
<head> 
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo ROOT; ?>/static/css/reset.css">
	<link rel="stylesheet" href="<?php echo ROOT; ?>/static/css/style.css">
</head> 
<body>

	<div id="debug">
		<span>Debug Bar:</span> <?php echo "$route#$action($id)"; ?>
		<span class="links">
			<a href="<?php echo $this->link_to(); ?>">Front Page</a> &bull;
			<a href="<?php echo $this->link_to('admin_home'); ?>">Administrator Dashboard</a>
	</div>

	<header>
		<h1><a href="<?php echo ROOT; ?>">The Super Mega <b>Awesome</b> Shopping Site</a></h1>
	</header>
	
	<nav>
		<ul>
			<?php
			$current = 'class="current"';
			$class = ($this->is_home) ? $current : ''; ?>

			<li <?php echo $class; ?>>
				<a href="<?php echo ROOT; ?>">Home</a>
			</li>

			<?php
			foreach ($navigation->get_items() as $nav) {
				$class = ($nav->current) ? $current : '';
				echo '<li ' . $class . '>';
				echo '<a href="'. $this->link_to('category', 'show', $nav->id) .'" title="'. $nav->title .'">'. $nav->name .'</a>';
				if ($nav->children) {
					echo '<ul>';
						foreach ($nav->children as $cnav) {
							echo '<li ' . $class . '>';
							echo '<a href="'. $this->link_to('category', 'show', $cnav->id) .'" title="'. $cnav->title .'">'. $cnav->name .'</a>';
							echo '</li>';
						}
					echo '</ul>';
				}
				echo '</li>';
			}
			?>
		</ul>
	</nav>
	
	<section id="main">

	<?php if ($session->count_errors() || $session->count_successes()) { ?>
		<div class="flashmessages">
			<?php
			if ($session->count_errors())
				foreach ($session->get_errors() as $message)
					echo '<p class="error">'. $message .'</p>';

			if ($session->count_successes())
				foreach ($session->get_successes() as $message)
					echo '<p class="success">'. $message .'</p>';
			?>
		</div>
	<?php } ?>
