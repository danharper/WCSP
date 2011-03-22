<?php
if ($basket) {
	foreach ($basket as $id => $product) { ?>
		<p>
			Product: <?php echo $product['name']; ?> (#<?php echo $id; ?>) - <?php echo $product['quantity']; ?>
			<form action="<?php echo $this->link_to('basket', 'update'); ?>" method="post">
				<label>Quantity: </label>
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="text" name="quantity" value="<?php echo $product['quantity']; ?>">
				<input type="submit">
			</form>
			<form action="<?php echo $this->link_to('basket', 'delete'); ?>" method="post">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="submit" value="remove">
			</form>
			<br>
		</p><hr>
		<?php
	}
}
else {
	echo "Nothing here dude!";
}
