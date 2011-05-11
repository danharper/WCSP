<section class="basket">
	<h2><a href="<?php echo $this->link_to_path('basket'); ?>">Basket</a> &nbsp;&raquo; Checkout</h2>
	<?php
	if ($cart->size() > 0) { ?>
		<table id="basket">
				<tr>
					<!-- <th class="img">Image</th> -->
					<th class="name">Product Name</th>
					<th class="price">Unit Price</th>
					<th class="quantity">Quantity</th>
					<th class="price">Subtotal</th>
					<th class="remove">Remove</th>
				</th>
				<?php
				foreach ($cart->products() as $id => $product) { ?>
					<tr>
						<td class="name"><a href="<?php echo $this->link_to('product', 'show', $id); ?>">
							<?php echo $product['name']; ?>
						</a></td>
						<td class="price">£<?php echo number_format($product['price'], 2); ?></td>
						<td class="quantity">
							<?php echo $product['quantity']; ?>
						</td>
						<td class="price">£<?php echo number_format($product['price'] * $product['quantity'], 2); ?></td>
					</tr>
					<?php
				} ?>
			</tbody>
		</table>
		<p class="total"><strong>Total:</strong> £<?php echo $cart->total_price(); ?></p>

		<h2>Enter your details:</h2>
		<p>Tell us where to send your order. All fields, except telephone number, are required.</p>
		<form action="<?php echo $this->link_to('basket', 'order'); ?>" method="post">
			<table id="placeorder">
				<tr>
					<td><label for="fname">First Name:</label></td>
					<td><input id="fname" name="fname" required></td>
				</tr>
				<tr>
					<td><label for="lname">Last Name:</label></td>
					<td><input id="lname" name="lname" required></td>
				</tr>
				<tr>
					<td><label for="address">Address:</label></td>
					<td><textarea id="address" name="address" required></textarea></td>
				</tr>
				<tr>
					<td><label for="town">Town:</label></td>
					<td><input id="town" name="town" required></td>
				</tr>
				<tr>
					<td><label for="postcode">Postcode:</label></td>
					<td><input id="postcode" name="postcode" required></td>
				</tr>
				<tr>
					<td><label for="tel">Telephone:</label></td>
					<td><input id="tel" name="tel"></td>
				</tr>
				<tr>
					<td><label for="email">Email:</label></td>
					<td><input type="email" id="email" name="email" required></td>
				</tr>
			</table>
			<p><input type="submit" value="Place Order" class="placeorder"></p>
		</form>

		<?php
	}
	else { ?>
		<p>There are no items in your basket.</p>
		<?php
	} ?>
</section>
