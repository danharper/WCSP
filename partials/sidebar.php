</section>

<aside>
	<section id="cart">
		<?php if ($cart->size() > 0) { ?>
			<p>You have <span class="items"><?php echo $cart->total_size(); ?></span> items in your shopping basket, totalling <span class="price">£<?php echo $cart->total_price(); ?></span>.</p>
			<?php
		}
		else { ?>
			<p>You currently have no items in your shopping basket.</p>
			<?php
		} ?>
		<p class="view"><a href="<?php echo $this->link_to('basket'); ?>">View Basket</a></p>
	</section>
	<!-- <form id="search" action="<?php echo $this->link_to_path('search'); ?>" method="get"> -->
	<?php echo $this->link_to('product', 'search'); ?>
	<!-- <form id="search" action="<?php echo $this->link_to('product', 'search'); ?>" method="get"> -->
	<form id="search" action="<?php echo ROOT; ?>" method="get">
		<input type="hidden" name="route" value="product">
		<input type="hidden" name="action" value="search">
		<p><input type="search" placeholder="search&hellip;" name="q" tabindex="1"></p>
	</form>
</aside>
