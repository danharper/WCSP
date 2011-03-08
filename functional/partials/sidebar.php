</section>

<aside>
	<section id="cart">
		<p>You have <span class="items"><?php echo sizeof($_SESSION['basket']) ?></span> items in your shopping cart, totalling <span class="price">$32</span>.</p>
		<p><a href="<?php echo $this->link_to('basket'); ?>">View Basket</a></p>
	</section>
	<form id="search">
		<p><input type="search" placeholder="search&hellip;"></p>
	</form>
</aside>
