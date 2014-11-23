<?php
	class Cart_model extends CI_Model {
		public function update_cart($rowid, $qty, $price, $amount){
			$data = array(
				'rowid'   => $rowid,
				'qty'     => $qty,
				'price'   => $price,
				'amount'   => $amount
			);

			$this->cart->update($data);
		}
	}