<?php
$grand_total = 0;

if ($cart = $this->cart->contents()):
	foreach ($cart as $item):
		$grand_total = $grand_total + $item['subtotal'];
	endforeach;
endif;
?>
<div id='content'>
	<div class="features">
	<form name="billing" method="post" action="<?php echo base_url().'billing/save_order' ?>" >
	    <input type="hidden" name="command" />
		<div align="center">
	        <h1 align="center">Billing Info</h1>
	        <table border="0" cellpadding="2px">
	        	<tr><td>Order Total:</td><td><strong>Rs. <?php echo number_format($grand_total,2); ?></strong></td></tr>
	            <tr><td>Your Name:</td><td><input type="text" name="name" value="<?php if($this->session->userdata('is_logged_in') == 1) echo $record_user->name;  ?>"/></td></tr>
	            <tr><td>Address:</td><td><input type="text" name="address" value="<?php if($this->session->userdata('is_logged_in') == 1) echo $record_user->address; ?>"/></td></tr>
	            <tr><td>Email:</td><td><input type="text" name="email" value="<?php if($this->session->userdata('is_logged_in') == 1) echo $record_user->email; ?>" /></td></tr>
	            <tr><td>Phone:</td><td><input type="text" name="phone" value="<?php if($this->session->userdata('is_logged_in') == 1) echo $record_user->contact; ?>"/></td></tr>
	            <tr><td>&nbsp;</td><td><input type="submit" value="Place Order" /></td></tr>
	        </table>
		</div>
	</div>
	</form>
</div>