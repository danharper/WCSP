<h2>Edit Products</h2>
<section class="products">
	<?php foreach ($products as $p) { $image = $images[$p->id];
		$image_url = ROOT.'/static/productimages/'.$p->id.'/'.$image->name;
		$payload = array(
			'product' => $p,
			'image_url' => $image_url,
			'image' => $image,
			'type' => 'admin'
		);
		$this->partial('products', $payload);
	} ?>
</section>
