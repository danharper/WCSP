<ol>
<?php
foreach ($products as $p) {
	$image = $images[$p->id];
	echo '<h2><a href="'. $this->link_to('product', 'show', $p->id) .'">'. $p->title .'</a></h2>';
	echo '<p>'. nl2br($p->description) .'</p>';
	echo '<p><em>£'. $p->price .'</em></p>';
	echo '<img src="'.ROOT.'/static/productimages/'.$p->id.'/'. $image->name .'" alt="'. $image->alt .'" height="150">';
	echo '<hr>';
} ?>
</ol>
