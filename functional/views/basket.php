<?php

if ($basket) {
	foreach ($basket as $item) {
		echo 'Product #'. $item['id']. ' - '. $item['quantity'] . '<br>';
	}
}
else {
	echo "Nothing here dude!";
}
