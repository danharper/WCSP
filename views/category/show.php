<?php
if ($products) { ?>
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
				'image' => $image
			);
			$this->partial('products', $payload);
		} ?>
	</section>
	<?php
}
else { ?>
	<p>This category has no products.</p>
	<?php
} ?>
