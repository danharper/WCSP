<h2><a href="<?php echo $this->link_to('admin_home'); ?>">Admin</a> &nbsp;&raquo; Manage Products</h2>
<p><a href="<?php echo $this->link_to('admin_product', 'add'); ?>">Add New Product</a></p>
<section class="products">
	<?php foreach ($products as $product) { $image = $images[$product->id];
		$payload = array(
			'product' => $product,
			'image' => $image,
			'type' => 'admin'
		);
		$this->partial('products', $payload);
	} ?>
</section>
