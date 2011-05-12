<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Installation</title>
	<link href="static/css/reset.css" rel="stylesheet">
	<link href="static/css/style.css" rel="stylesheet">
	<style>
		body { padding: 0 20px; width: 650px; }
		h1 { margin: 20px 0; }
		a {
			background: -webkit-linear-gradient(#7f7, #3f3);
			border: 1px solid #6f6;
			border-radius: 55px;
			box-shadow: 1px 1px 0 #ccc;
			color: black;
			padding: 5px 10px;
			text-decoration: none;
			font-size: 18px;
		}
	</style>
</head>
<body lang="en">

	<?php
	session_start(); session_unset();
	require("config.php");

	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS);
	echo "<p>Executing query&hellip; <pre>CREATE DATABASE IF NOT EXISTS `456040`</pre></p>";
	$a = mysqli_query($db, "CREATE DATABASE IF NOT EXISTS `456040`");
	if ($a) {
		echo "<p style='color: green;'>Success.</p>";
	}
	else {
		echo '<p style="color: red;">'.mysqli_error($db).'</p>';
	}
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if (!$db) {
		die('DB Connection Error ('. mysqli_connect_errno() .') => '. mysqli_connect_error());
	}

	$queries = array();

	$queries[] = "DROP TABLE IF EXISTS `categories`";
	$queries[] = "CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(140) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(140) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;";
	$queries[] = "INSERT INTO `categories` (`id`,`name`,`parent_id`,`title`)
VALUES
	(1,'Something',NULL,NULL),
	(2,'More',NULL,NULL),
	(3,'Lulz',2,NULL),
	(4,'Extras',NULL,NULL),
	(6,'Crazy Animals',NULL,NULL),
	(8,'Pinatas',6,NULL),
	(9,'Elephants',6,NULL),
	(10,'Pygmy Kangaroos',NULL,NULL),
	(17,'Hippos',NULL,NULL)";

	$queries[] = "DROP TABLE IF EXISTS `options`";
	$queries[] = "CREATE TABLE `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `css` text,
  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8";
	$queries[] = "INSERT INTO `options` (`id`,`css`) VALUES (1,'')";

	$queries[] = "DROP TABLE IF EXISTS `orderrows`";
	$queries[] = "CREATE TABLE `orderrows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8";
	$queries[] = "INSERT INTO `orderrows` (`id`,`order_id`,`product_id`,`quantity`) VALUES (1,2,2,3), (2,2,1,1), (3,3,1,2)";

	$queries[] = "DROP TABLE IF EXISTS `orders`";
	$queries[] = "CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fname` varchar(120) NOT NULL,
  `lname` varchar(120) NOT NULL,
  `address` text NOT NULL,
  `town` varchar(120) NOT NULL,
  `postcode` varchar(120) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `email` varchar(160) NOT NULL,
  `created_at` int(20) NOT NULL,
  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8";
	$queries[] = "INSERT INTO `orders` (`id`,`user_id`,`fname`,`lname`,`address`,`town`,`postcode`,`tel`,`email`,`created_at`)
VALUES
	(2,1,'Bob','Jones','0 Jessie Road','Southsea','PO4 0EL','01837403840','did@hujd.com',1305144594),
	(3,1,'Barack','Obama','The White House','Washington DC','PRESIDENT','','barry@whitehouse.gov',1305144748)";

	$queries[] = "DROP TABLE IF EXISTS `productimages`";
	$queries[] = "CREATE TABLE `productimages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alt` varchar(140) DEFAULT NULL,
  `main` binary(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8";
	$queries[] = "INSERT INTO `productimages` (`id`,`product_id`,`name`,`alt`,`main`)
VALUES
	(1,1,'apple_store_nyc.jpg','The Apple Store in NYC',X'31'),
	(2,2,'bridge.jpg','A bridge',X'30'),
	(3,2,'christmas_tree.jpg','It\'s Christmaas!',X'31'),
	(4,3,'leaves.jpg','Leaves are Falling',X'30'),
	(5,3,'wing.jpg','I\'m on a plane!',X'31'),
	(6,4,'bridge.jpg','I\'m on a plane!',X'31')";

	$queries[] = "DROP TABLE IF EXISTS `products`";
	$queries[] = "CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8";
	$queries[] = "INSERT INTO `products` (`id`,`category_id`,`title`,`description`,`price`,`stock`)
VALUES
	(1,1,'Fish Sticks','This is some stuff about \'FISH\'.',2,3),
	(2,1,'Lorem ipsum fish','Latin placeholder text here :)',2.4,3983),
	(3,6,'Gary the Giant Giraffe','Gary is a calm and pleasant giraffe.',2000,0),
	(4,6,'Something Else Crazy','Gary is a calm and pleasant giraffe.',150,9),
	(5,10,'Something Other','What on EARTH!',2.49,14),
	(6,1,'Another product!','Whahey!!!',22.3,237),
	(7,4,'Yet another epic product','Wowzers, holmes!',383.94,28394)";

	foreach ($queries as $query) {
		echo "<p>Executing query&hellip; <pre>$query</pre></p>";
		$result = mysqli_query($db, $query);
		if ($result) {
			echo "<p style='color: green;'>Success.</p>";
		}
		else {
			echo "<p style='color: red;'>Error: ". mysqli_error($db) ."</p>";
		}
	}
	?>

	<h1>All Done!</h1>

</body>
</html>
