<section class="products">
	<h2>Search Results for &quot;<?php echo $query; ?>&quot;</h2>
	<?php foreach ($products as $product) { $image = $images[$product->id];
		$payload = array(
			'product' => $product,
			'image' => $image
		);
		$this->partial('products', $payload);
	} ?>
</section>
