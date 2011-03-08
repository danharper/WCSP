<ol>
<?php
if ($products) {
	foreach ($products as $p) {
		echo '<h2><a href="'. $this->link_to('product', 'show', $p->id) .'">' . $p->title . '</a></h2>';
		echo '<p>'. nl2br($p->description) .'</p>';
		echo '<p><em>£'. $p->price .'</em></p>';
		echo '<hr>';
	}
}
else {
	echo "nothing";
} ?>
</ol>
