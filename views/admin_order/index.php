<h2><a href="<?php echo $this->link_to('admin_home'); ?>">Admin</a> &nbsp;&raquo; Received Orders</h2>

<ul id="adminorders">
	<?php foreach ($orders as $order) { ?>
		<li>
			<strong>
				Order #<?php echo $order->id; ?> @ <?php echo date('d M Y - H:i', $order->created_at); ?>
			</strong>
			<blockquote>
				<?php echo $order->fname.' '.$order->lname; ?><br>
				<?php echo nl2br($order->address); ?><br>
				<?php echo $order->town; ?><br>
				<?php echo $order->postcode; ?><br>
				<?php if ($order->tel) echo $order->tel . '<br>'; ?>
				<?php echo $order->email; ?>
			</blockquote>
			<ul>
				<?php foreach ($order->items as $item) { ?>
					<li>
						<?php echo $item->quantity; ?>x <a href="<?php echo $this->link_to('product', 'show', $item->id); ?>"><?php echo $item->details->title; ?></a> @ £<?php echo number_format($item->details->price, 2); ?> each
					</li>
				<?php } ?>
			</ul>
		</li>
		<?php
	} ?>
</ul>
