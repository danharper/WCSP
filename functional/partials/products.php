<article>
	<a href="<?php echo $this->link_to('product', 'show', $product->id); ?>">
		<img src="<?php echo $image_url; ?>" alt="<?php echo $image->alt; ?>">
		<p>£<?php echo $product->price; ?></p>
		<h2><?php echo $product->title; ?></h2>
	</a>
</article>
