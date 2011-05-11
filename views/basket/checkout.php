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

		<!-- <h2>Enter your details:</h2> -->
		<form onsubmit="alert('The prototype ends here. This is where your order would be processed, stock levels decreased etc.');">
			<!-- <p><label for="fname">First Name:</label> <input id="fname" required></p> -->
			<!-- <p><label for="lname">Last Name:</label> <input id="lname" required></p> -->
			<!-- <p><label for="address">Address Line 1:</label> <input id="address" required></p> -->
			<!-- <p><label for="addressb">Address Line 2:</label> <input id="addressb" required></p> -->
			<!-- <p><label for="town">Town:</label> <input id="town" required></p> -->
			<!-- <p><label for="postcode">Postcode:</label> <input id="postcode" required></p> -->
			<!-- <p><label for="tel">Telephone:</label> <input id="tel"></p> -->
			<!-- <p><label for="email">Email:</label> <input id="email" type="email" required></p> -->
			<p><input type="submit" value="Place Order"></p>
		</form>

		<?php
	}
	else { ?>
		<p>There are no items in your basket.</p>
		<?php
	} ?>
</section>
