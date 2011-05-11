<h2><a href="<?php echo $this->link_to('admin_home'); ?>">Admin</a> &nbsp;&raquo; <a href="<?php echo $this->link_to('admin_product'); ?>">Manage Products</a> &nbsp;&raquo; Add New Product</h2>
<form action="<?php echo $this->link_to('admin_product', 'create'); ?>" method="post">
	<p>
		<label for="title">Title:</label>
		<input name="title" id="title" value="" required>
	</p>
	<p>
		<label for="category">Category:</label>
		<select name="category" id="category">
			<?php foreach ($navigation->get_items() as $n) {
				echo '<option value="'. $n->id .'">'. $n->name .'</option>';
			} ?>
		</select>
	<p>
		<label for="description">Description:</label>
		<textarea name="description" id="description" required></textarea>
	</p>
	<p>
		<label for="price">Price:</label>
		<input type="number" min="0.01" step="0.01" name="price" id="price" value="1.99" required>
	</p>
	<p>
		<label for="stock">Stock:</label>
		<input type="number" name="stock" id="stock" value="15" required>
	</p>
	<p><input type="submit"></p>
</form>
