<div id='content'>
	<div class="features">
		
		<h2><span><?php echo $title; ?></span></h2>
		<div class="features_grid">
			<table align="center" border="0" cellpadding="5px" cellspacing="1">
				<?php
				foreach ($stuffs as $product){
					$id = $product['serial'];
					$name = $product['name'];
					$description = $product['description'];
					$price = $product['price'];
					?>
					<tr>
						<td>
							<a class="play_icon fancybox" href="<?php echo base_url().$product['picture']; ?>">
								<img src="<?php echo base_url().$product['picture']; ?>" />
							</a>			        		
						</td>
						<td style="padding:5px;"><h4><span><?php echo $name; ?></span></h4><br />
							<?php echo $description; ?><br />
							Price:<big style="color:green">
							Rs. <?php echo $price; ?></big><br /><br />
							<?php
							echo form_open('cart/add');
							echo form_hidden('id', $id);
							echo form_hidden('name', $name);
							echo form_hidden('price', $price);
							echo form_submit('action', 'Add to Cart');
							echo form_close();
							?>
						</td>
					</tr>
					<!-- <tr><td colspan="2"><hr size="1" /></td> -->
					<?php } ?>
				</table>
			</div>
			
		</div>				
	</div>