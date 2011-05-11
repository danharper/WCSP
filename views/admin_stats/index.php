<h2><a href="<?php echo $this->link_to('admin_home'); ?>">Admin</a> &nbsp;&raquo; Store Statistics</h2>

<?php if ($nostock) { ?>
	<div class="stockcounts">
	<h3>Products Out of Stock</h3>
	<ul>
		<?php foreach ($nostock as $product) { ?>
			<li><a href="<?php echo $this->link_to('admin_product', 'edit', $product->id); ?>">
					<?php echo $product->title; ?></a>
				&ndash; <span><?php echo $product->stock; ?> Left!</span>
			</li>
		<?php } ?>
	</ul>
	</div>
<?php } ?>

<?php if ($lowstock) { ?>
	<div class="stockcounts">
	<h3>Products Low on Stock (< 25)</h3>
	<ul>
		<?php foreach ($lowstock as $product) { ?>
			<li><a href="<?php echo $this->link_to('admin_product', 'edit', $product->id); ?>">
					<?php echo $product->title; ?></a>
				&ndash; <span><?php echo $product->stock; ?> Left!</span>
			</li>
		<?php } ?>
	</ul>
	</div>
<?php } ?>
