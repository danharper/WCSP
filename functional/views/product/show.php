<h2><?php echo $product->title; ?></h2>
<p><?php echo nl2br($product->description); ?></p>
<p><em>£<?php echo $product->price; ?></em></p>

<?php foreach ($images as $image) {
echo '<img src="'.ROOT.'/static/productimages/'.$product->id.'/'.$image->name.'" alt="'.$image->alt.'" height="150">';
} ?>

<form action="<?php echo $this->link_to('basket', 'add'); ?>" method="post">
	<input type="hidden" name="id" value="<?php echo $product->id; ?>">
	<input type="hidden" name="name" value="<?php echo $product->title; ?>">
	<input type="hidden" name="price" value="<?php echo $product->price; ?>">
	<input type="text" name="quantity" value="1">
	<input type="submit">
</form>

