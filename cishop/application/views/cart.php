<div class="main">
<div class='content' >
	<div class='features'>
		<div class="wrap">

		<h2><span>Your Shopping Cart</span></h2>
		<!-- <input type="button" value="Continue Shopping" onclick="window.location='products/browse'" /> -->
		<input type="button" value="Continue Shopping" onclick="window.location='<?php 
		if($this->session->userdata('is_logged_in'))
		{
			echo "users/browse";
		}
		else
		{
			echo "products/browse";
		}

		?>'" />
		<div style="color:#F00"><?php echo $message?></div>
		<table border="1" cellpadding="5px" cellspacing="1px" width="100%">
		<?php if ($cart = $this->cart->contents()): ?>
		<tr style="font-weight:bold">
			<td>Serial</td>
			<td>Name</td>
			<td>Price</td>
			<td>Qty</td>
			<td>Amount</td>
			<td>Options</td>
		</tr>
		<?php
		echo form_open('cart/update_cart');
		$grand_total = 0; $i = 1;
		
		foreach ($cart as $item):
			echo form_hidden('cart['. $item['id'] .'][id]', $item['id']);
			echo form_hidden('cart['. $item['id'] .'][rowid]', $item['rowid']);
			echo form_hidden('cart['. $item['id'] .'][name]', $item['name']);
			echo form_hidden('cart['. $item['id'] .'][price]', $item['price']);
			echo form_hidden('cart['. $item['id'] .'][qty]', $item['qty']);
		?>
		<tr>
			<td>
				<?php echo $i++; ?>
			</td>
			<td>
				<?php echo $item['name']; ?>
			</td>
			<td>
				Rs. <?php echo number_format($item['price'],2); ?>
			</td>
			<td>
				<?php echo form_input('cart['. $item['id'] .'][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
			</td>
			<?php $grand_total = $grand_total + $item['subtotal']; ?>
			<td>
				Rs. <?php echo number_format($item['subtotal'],2) ?>
			</td>
			<td>
				<?php echo anchor('cart/remove/'.$item['rowid'],'Cancel'); ?>
			</td>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td colspan="6"> <hr/> </td>
		</tr>
		<tr>
			<td><b>Order Total: $<?php echo number_format($grand_total,2); ?></b></td>
			<script>
				function clear_cart() {
					var result = confirm('Are you sure want to clear all bookings?');
					
					if(result) {
						window.location = "<?php echo base_url(); ?>cart/remove/all";
					}else{
						return false; // cancel button
					}
				}
			</script>
			<td colspan="5" align="right"><input type="button" value="Clear Cart" onclick="clear_cart()">
					<input type="submit" value="Update Cart">
					<?php echo form_close(); ?>
					<input type="button" value="Place Order" onclick="window.location='billing'"></td>
		</tr>
		<?php endif; ?>
	</table>

	<div style="height:220px; width:10px;">
	</div>
	</div>
	</div>
</div>
</div>