<article class="product">
	<div class="images">
		<?php
		$i=0;
		foreach ($images as $image) {
			$image_url = ROOT.'/static/productimages/'.$product->id.'/'.$image->name;
			if ($i == 0) { ?>
				<figure>
					<img src="<?php echo $image_url; ?>" alt="<?php echo $image->alt; ?>">
				</figure>
				<?php
			} ?>
				<a href="#"><img src="<?php echo $image_url; ?>" alt="<?php echo $image->alt; ?>"></a>
				<a href="#"><img src="<?php echo $image_url; ?>" alt="<?php echo $image->alt; ?>"></a>
				<a href="#"><img src="<?php echo $image_url; ?>" alt="<?php echo $image->alt; ?>"></a>
				<a href="#"><img src="<?php echo $image_url; ?>" alt="<?php echo $image->alt; ?>"></a>
				<a href="#"><img src="<?php echo $image_url; ?>" alt="<?php echo $image->alt; ?>"></a>
				<?php
			$i++;
		} ?>
	</div>

	<p class="price">£<?php echo $product->price; ?></p>
	<h2><?php echo $product->title; ?></h2>
	<p class="description"><?php echo nl2br($product->description); ?></p>

	<form action="<?php echo $this->link_to('basket', 'add'); ?>" method="post">
		<h3>Add to Basket:</h3>
		<?php if ($product->stock > 0) { ?>
			<?php $stock = "";
			if ($product->lowstock) $stock = 'class="lowstock"'; ?>
			<input type="text" name="quantity" value="1" <?php echo $stock; ?>>
			<?php if ($product->lowstock) { ?>
			<span class="lowstock">Hurry - only <?php echo $product->stock; ?> left!</span>
			<?php } ?>
			<input type="hidden" name="id" value="<?php echo $product->id; ?>">
			<input type="hidden" name="name" value="<?php echo $product->title; ?>">
			<input type="hidden" name="price" value="<?php echo $product->price; ?>">
			<input type="submit">
		<?php } else { ?>
			<span class="lowstock">Product out of stock.</span>
		<?php } ?>
	</form>
	<div class="clear">&nbsp;</div>
</article>
