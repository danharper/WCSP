<article class="product">
	<div class="images">
		<?php
		$i=0;
		foreach ($images as $image) {
			if ($i == 0) { ?>
				<figure>
					<img src="<?php echo $image->path; ?>" alt="<?php echo $image->alt; ?>">
				</figure>
				<?php
			}
			if (count($images) > 1) { ?>
				<a href="#"><img src="<?php echo $image->path; ?>" alt="<?php echo $image->alt; ?>"></a>
				<?php
			}
			$i++;
		} ?>
	</div>

	<p class="price">£<?php echo number_format($product->price, 2); ?></p>
	<h2><?php echo $product->title; ?></h2>
	<p class="description"><?php echo nl2br($product->description); ?></p>

	<form action="<?php echo $this->link_to('basket', 'add'); ?>" method="post">
		<h3>Add to Basket:</h3>
		<?php //if ($product->stock > 0) { ?>
		<?php
		$product_in_cart = $cart->get($product->id);
		$stock_remaining = ($product->stock - $product_in_cart['quantity'] > 0) ? true : false;
		if ($product->stock > 0) {
			$stock = ""; if ($product->lowstock) $stock = 'class="lowstock"'; ?>
			<input type="number" name="quantity" min="1" max="<?php echo $product->stock - $product_in_cart['quantity']; ?>" value="1" <?php echo $stock; ?>>

			<?php if (!$stock_remaining) { ?>
				<span class="lowstock">No more stock left.</span>
			<?php } elseif ($product->lowstock) { ?>
				<span class="lowstock">Hurry - only <?php echo $product->stock; ?> left!</span>
			<?php } ?>

			<input type="hidden" name="id" value="<?php echo $product->id; ?>">
			<input type="hidden" name="name" value="<?php echo $product->title; ?>">
			<input type="hidden" name="price" value="<?php echo $product->price; ?>">
			<input type="submit" <?php if (!$stock_remaining) echo 'disabled'; ?>>
		<?php } else { ?>
			<span class="lowstock">Product out of stock.</span>
		<?php } ?>
	</form>
	<div class="clear">&nbsp;</div>
</article>
