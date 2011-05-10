<article>
	<?php $product_controller = (isset($type)) ? 'admin_product' : 'product'; ?>
	<?php $product_action = (isset($type)) ? 'edit' : 'show'; ?>
	<a href="<?php echo $this->link_to($product_controller, $product_action, $product->id); ?>">
		<img src="<?php echo $image_url; ?>" alt="<?php echo $image->alt; ?>">
		<p>£<?php echo number_format($product->price, 2); ?></p>
		<h2><?php echo $product->title; ?></h2>
	</a>
</article>
