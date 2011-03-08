<h2><?php echo $product->title; ?></h2>
<p><?php echo nl2br($product->description); ?></p>
<p><em>£<?php echo $product->price; ?></em></p>

<form action="<?php echo $this->link_to('basket', 'create'); ?>" method="post">
	<input type="hidden" name="id" value="<?php echo $product->id; ?>">
	<input type="text" name="quantity" value="1">
	<input type="submit">
</form>

