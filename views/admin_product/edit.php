<h2><a href="<?php echo $this->link_to('admin_home'); ?>">Admin</a> &nbsp;&raquo; <a href="<?php echo $this->link_to('admin_product'); ?>">Manage Products</a> &nbsp;&raquo; &quot;<?php echo $product->title; ?>&quot;</h2>
<form action="<?php echo $this->link_to('admin_product', 'update'); ?>" method="post">
	<p class="manageimages">
		<img src="<?php echo $image->path; ?>" alt="<?php echo $image->alt; ?>"><br>
		<a href="<?php echo $this->link_to('admin_product', 'images', $product->id); ?>">
			Manage Product Images
		</a>
	</p>
	<p>
		<label for="title">Title:</label>
		<input name="title" id="title" value="<?php echo $product->title; ?>" required>
	</p>
	<p>
		<label for="category">Category:</label>
		<select name="category" id="category">
			<?php foreach ($navigation->get_items() as $n) {
				$selected = ($n->id == $product->category_id) ? 'selected' : '';
				echo '<option value="'. $n->id .'" '. $selected .'>'. $n->name .'</option>';
			} ?>
		</select>
	<p>
		<label for="description">Description:</label>
		<textarea name="description" id="description" required><?php echo $product->description; ?></textarea>
	</p>
	<p>
		<label for="price">Price:</label>
		<input type="number" min="0.01" step="0.01" name="price" id="price" value="<?php echo number_format($product->price, 2); ?>" required>
	</p>
	<p>
		<label for="stock">Stock:</label>
		<input type="number" name="stock" id="stock" value="<?php echo $product->stock; ?>" required>
	</p>
	<input type="hidden" name="id" value="<?php echo $product->id; ?>">
	<p><input type="submit"></p>
</form>
