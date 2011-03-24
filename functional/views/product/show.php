<article class="product">
	<div class="images">
		<?php foreach ($images as $image) {
			$image_url = ROOT.'/static/productimages/'.$product->id.'/'.$image->name; ?>
			<img src="<?php echo $image_url; ?>" alt="<?php echo $image->alt; ?>">
			<img src="<?php echo $image_url; ?>" alt="<?php echo $image->alt; ?>">
			<img src="<?php echo $image_url; ?>" alt="<?php echo $image->alt; ?>">
			<img src="<?php echo $image_url; ?>" alt="<?php echo $image->alt; ?>">
			<img src="<?php echo $image_url; ?>" alt="<?php echo $image->alt; ?>">
			<?php
		} ?>
	</div>

	<p class="price">£<?php echo $product->price; ?></p>
	<h2><?php echo $product->title; ?></h2>
	<p class="description"><?php echo nl2br($product->description); ?></p>

	<form action="<?php echo $this->link_to('basket', 'add'); ?>" method="post">
		<h3>Add to Basket:</h3>
		<input type="text" name="quantity" value="1">
		<input type="hidden" name="id" value="<?php echo $product->id; ?>">
		<input type="hidden" name="name" value="<?php echo $product->title; ?>">
		<input type="hidden" name="price" value="<?php echo $product->price; ?>">
		<input type="submit">
	</form>
</article>
