<section class="products">
	<?php foreach ($products as $p) { $image = $images[$p->id];
		$image_url = ROOT.'/static/productimages/'.$p->id.'/'.$image->name; ?>
		<article>
			<a href="<?php echo $this->link_to('product', 'show', $p->id); ?>">
				<img src="<?php echo $image_url; ?>" alt="<?php echo $image->alt; ?>">
				<p>£<?php echo $p->price; ?></p>
				<h2><?php echo $p->title; ?></h2>
			</a>
		</article>
	<?php } ?>
</section>
