<h2><a href="<?php echo $this->link_to('admin_home'); ?>">Admin</a> &nbsp;&raquo; Customisation</h2>
<p>So you think you can do a better job at designing the site? Give it your best shot, sucka!</p>

<form action="<?php echo $this->link_to('admin_css', 'update'); ?>" method="post">
	<p>
		<textarea name="css" id="csseditor"><?php
			if (isset($css) && $css != '') {
				echo $css;
			}
			else {
				echo "/* Throw some CSS in here. */\n";
			}
		?></textarea>
	</p>
	<p>May I suggest trying something like:<br><span id="csssuggest">html { background: #ccc; }</span></p>
	<p><input type="submit" value="Save CSS" class="placeorder"></p>
</form>
