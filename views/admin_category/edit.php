<h2><a href="<?php echo $this->link_to('admin_home'); ?>">Admin</a> &nbsp;&raquo; <a href="<?php echo $this->link_to('admin_category'); ?>">Edit Categories</a> &nbsp;&raquo; &quot;<?php echo $category->name; ?>&quot;</h2>
<form action="<?php echo $this->link_to('admin_category', 'update'); ?>" method="post">
	<p>
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" value="<?php echo $category->name; ?>">
		<input type="hidden" name="id" value="<?php echo $category->id; ?>">
		<input type="submit">
	</p>
	<p>
		<label for="parent">Parent:</label>
		<select name="parent" id="parent">
			<?php
			$found = 0;
			foreach ($navigation->get_items() as $c) {
				if (isset($parent)) {
					if ($c->id == $parent->id) {
						$found = $c->id;
					}
				}
				if ($c->id != $category->id) { ?>
					<option value="<?php echo $c->id; ?>" <?php if ($found == $c->id) echo 'selected'; ?>>
						<?php echo $c->name; ?>
					</option>
					<?php
				}
			} ?>
			<option value="0" <?php if ($found == 0) echo 'selected'; ?>>(none)</option>
		</select>
</form>
