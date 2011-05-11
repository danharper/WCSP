<section class="products">
	<?php foreach ($products as $product) { $image = $images[$product->id];
		$payload = array(
			'product' => $product,
			'image' => $image
		);
		$this->partial('products', $payload);
	} ?>
</section>
