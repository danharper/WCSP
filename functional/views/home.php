<ol>
<?php
foreach ($products as $p) {
	echo '<h2><a href="'.ROOT.'/?product='.$p->id.'">' . $p->title . '</a></h2>';
	echo '<p>'. nl2br($p->description) .'</p>';
	echo '<p><em>£'. $p->price .'</em></p>';
	echo '<hr>';
} ?>
</ol>
