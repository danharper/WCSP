<section class="basket">
<?php
if ($cart->size() > 0) {
	foreach($cart->products() as $id => $product) {
		$image = $images[$id];
		$image_url = ROOT.'/static/productimages/'.$id.'/'.$image->name; ?>
		<article>
			<img src="<?php echo $image_url; ?>" alt="<?php echo $image->alt; ?>">
			<h2><a href="<?php echo $this->link_to('product', 'show', $id); ?>">
					<?php echo $product['name']; ?>
			</a></h2>
			<p class="quantity">
				<strong>Quantity:</strong> 
				<a href="<?php echo $this->link_to('basket', 'decrease', $id); ?>">-</a>
				<?php echo $product['quantity']; ?>
				<a href="<?php echo $this->link_to('basket', 'increase', $id); ?>">+</a>
			</p>
		</article>
		<?php
	}
}
else { ?>
	<p>There are no items in your basket.</p>
	<?php
} ?>
</section>

<table id="basket">
		<tr>
			<th class="img">Image</th>
			<th class="name">Product Name</th>
			<th class="price">Unit Price</th>
			<th class="quantity">Quantity</th>
			<th class="price">Subtotal</th>
			<th class="remove">Remove</th>
		</th>
		<tr>
			<td class="img"><img src="http://localhost/wcsp/functional/static/productimages/2/christmas_tree.jpg" alt="" width="100"></td>
			<td class="name">Product name</td>
			<td class="price">£44</td>
			<td class="quantity">
				<a href="#">-</a>
				<input type="text" value="3">
				<a href="#">+</a>
			</td>
			<td class="price">£132</td>
			<td class="remove"><a href="#">x</a></td>
		</tr>
	</tbody>
</table>
