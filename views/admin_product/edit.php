<h2><a href="<?php echo $this->link_to('admin_home'); ?>">Admin</a> &nbsp;&raquo; <a href="<?php echo $this->link_to('admin_product'); ?>">Edit Products</a> &nbsp;&raquo; &quot;<?php echo $product->title; ?>&quot;</h2>
<form action="<?php echo $this->link_to('admin_product', 'update'); ?>" method="post">
	<p>
		<label for="title">Title:</label>
		<input name="title" id="title" value="<?php echo $product->title; ?>" >
	</p>
	<p>
		<label for="description">Description:</label>
		<textarea name="description" id="description"><?php echo $product->description; ?></textarea>
	</p>
	<p>
		<label for="price">Price:</label>
		<input type="number" min="0.01" step="0.01" name="price" id="price" value="<?php echo number_format($product->price, 2); ?>">
	</p>
	<p>
		<label for="stock">Stock:</label>
		<input type="number" name="stock" id="stock" value="<?php echo $product->stock; ?>">
	</p>

	<p><input type="submit"></p>
</form>
