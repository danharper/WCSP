<h2>Edit Categories</h2>

<ul>
	<?php
	foreach ($navigation->get_items() as $nav) { ?>
		<li>
			<a href="<?php echo $this->link_to('admin_category', 'edit', $nav->id); ?>">
				<?php echo $nav->name; ?>
			</a>
			<?php
			if ($nav->children) {
				echo '<ul>';
				foreach ($nav->children as $cnav) { ?>
					<li><a href="<?php echo $this->link_to('admin_category', 'edit', $cnav->id); ?>">
							<?php echo $cnav->name; ?>
					</a></li>
				<?php
				}
				echo '</ul>';
			}?>
		</li>
	<?php
	}	?>
</ul>

<p>&nbsp;</p>

<form action="<?php echo $this->link_to('admin_category', 'create'); ?>" method="post">
	<p>
		<label for="name"><strong>New Category:</strong></label>
		<input type="text" name="name" id="name">
		<input type="submit">
	</p>
</form>
