<h2><a href="<?php echo $this->link_to('admin_home'); ?>">Admin</a> &nbsp;&raquo; Manage Products</h2>
<p><a href="<?php echo $this->link_to('admin_product', 'add'); ?>">Add New Product</a></p>
<section class="products">
	<?php foreach ($products as $p) { $image = $images[$p->id];
		if ($image) {
			$image_url = ROOT.'/static/productimages/'.$p->id.'/'.$image->name;
		}
		else {
			$image_url = ROOT.'/static/productimages/noimage.png';
		}
		$payload = array(
			'product' => $p,
			'image_url' => $image_url,
			'image' => $image,
			'type' => 'admin'
		);
		$this->partial('products', $payload);
	} ?>
</section>
