	<footer>
		<p>Copyright &copy; 456040 2011 &bull; <a href="<?php echo $this->link_to_path('admin'); ?>">Admin</a></p>
	</footer>

	<script src="<?php echo ROOT; ?>/static/js/script.js"></script>
	<?php
	if ($this->get_js()) {
		foreach ($this->get_js() as $js) { ?>
			<script src="<?php echo ROOT; ?>/static/js/<?php echo $js; ?>.js"></script>
			<?php
		}
	}
	echo '<script>window.onload = function() { all_pages(); ';
	if ($this->get_js()) {
		foreach ($this->get_js() as $js) {
			if ($js != 'ajax') echo $js .'(); ';
		}
	}
	echo '}; </script>'; ?>
</body>
</html>
