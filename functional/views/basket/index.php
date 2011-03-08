<?php
if ($basket) {
	foreach ($basket as $id => $quantity) { ?>
		<p>
			Product #<?php echo $id; ?> - <?php echo $quantity; ?>
			<form action="<?php echo $this->link_to('basket', 'create'); ?>" method="post">
				<label>Quantity: </label>
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="text" name="quantity" value="<?php echo $quantity; ?>">
				<input type="submit">
			</form>
			<form action="<?php echo $this->link_to('basket', 'delete'); ?>" method="post">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="submit" value="remove">
			</form>
			<br>
		</p>
		<?php
	}
}
else {
	echo "Nothing here dude!";
}
