</section>

<aside>
	<section id="cart">
		<?php if ($cart->size() == 0) { ?>
			<p>You have <span class="items"><?php echo $cart->size(); ?></span> items in your shopping cart, totalling <span class="price">$<?php echo $cart->total_price(); ?></span>.</p>
			<?php
		}
		else { ?>
			<p>You currently have no items in your shopping cart.</p>
			<?php
		} ?>
		<p><a href="<?php echo $this->link_to('basket'); ?>">View Basket</a></p>
	</section>
	<form id="search">
		<p><input type="search" placeholder="search&hellip;"></p>
	</form>
</aside>
