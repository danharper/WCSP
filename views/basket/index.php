<section class="basket">
	<?php
	if ($cart->size() > 0) { ?>
		<table id="basket">
				<tr>
					<th class="img">Image</th>
					<th class="name">Product Name</th>
					<th class="price">Unit Price</th>
					<th class="quantity">Quantity</th>
					<th class="price">Subtotal</th>
					<th class="remove">Remove</th>
				</th>
				<?php
				foreach ($cart->products() as $id => $product) {
					$image = $images[$id];
					$image_url = ROOT.'/static/productimages/'.$id.'/'.$image->name; ?>
					<tr>
						<td class="img"><img src="<?php echo $image_url; ?>" alt="<?php echo $image->alt; ?>" width="100"></td>
						<td class="name"><a href="<?php echo $this->link_to('product', 'show', $id); ?>">
							<?php echo $product['name']; ?>
						</a></td>
						<td class="price">£<?php echo number_format($product['price'], 2); ?></td>
						<td class="quantity">
							<a href="<?php echo $this->link_to('basket', 'decrease', $id); ?>">-</a>
							<input type="text" value="<?php echo $product['quantity']; ?>">
							<a href="<?php echo $this->link_to('basket', 'increase', $id); ?>">+</a>
						</td>
						<td class="price">£<?php echo number_format($product['price'] * $product['quantity'], 2); ?></td>
						<td class="remove">
							<form action="<?php echo $this->link_to('basket', 'delete'); ?>" method="post">
								<input type="hidden" name="id" value="<?php echo $id; ?>">
								<input type="submit" value="x">
							</form>
						</td>
					</tr>
					<?php
				} ?>
			</tbody>
		</table>
		<div class="actions">
			<p class="empty"><a href="<?php echo $this->link_to('basket', 'destroy'); ?>">Empty Basket</a></p>
			<p class="checkout"><a href="<?php echo $this->link_to_path('checkout'); ?>">Checkout</a></p>
		</div>
		<?php
	}
	else { ?>
		<p>There are no items in your basket.</p>
		<?php
	} ?>
</section>
