<div class="main">
    <div class="content">	
        <div class="content_top">  
            <div class="wrap">                                  		
                <div class="banner_desc">
                    <p><?php if($xx = $this->session->userdata('e'))
                    {
                        echo $xx;
                        $this->session->unset_userdata('e');
                    } 

                    ?></p>
                    <h1>Buying online <span>made easy</span></h1>  
                    <h3>Providing everything you need to<br /> starting a successfull online store.</h3>
                    <img src="<?php echo base_url(); ?>assets/themes/default/images/cloud2.png" >
                    <h3>Hyper Speed way we process your transaction. |  We Use Cloud Tech </h3>


                </div>  <!--banner desc-->

                <div class="ipad">
                    <img src="<?php echo base_url("assets/themes/default/images/ipad.png"); ?>" alt="" />
                </div>
                <div class="clear"></div>
            </div><!--wrap-->
        </div><!--content-top-->

        <div class="features" id="features">
                 <div class="wrap">        

                          <h2>Start accepting orders <span>today</span></h2>
                            <h4>Just a few clicks away to your home.</h4>
                                <div class="features_grids">
                                 <div class="section group">
                                    <div class="grid_1_of_4 images_1_of_4">
                                         <img src="<?php echo base_url(); ?>assets/themes/default/images/beautyful-teplates.png" alt="" />
                                         <h3>Easy Access</h3>
                                         <p>Multi-lingual ..Multi-currency ..Disaster recovery</p>
                                    </div>
                                    <div class="grid_1_of_4 images_1_of_4">
                                         <img src="<?php echo base_url(); ?>assets/themes/default/images/product.png" alt="" />
                                         <h3>Products</h3>
                                         <p>Multiple images for each product (with lightbox display). • Store weight and/or size against product or product type. Reorder or filter by price or brand</p>
                                    </div>
                                    <div class="grid_1_of_4 images_1_of_4">
                                         <img src="<?php echo base_url(); ?>assets/themes/default/images/cart.png" alt="" />
                                          <h3>Cart</h3>
                                          <p>Store user-entered text against an ordered product or an order such as special delivery instructions. Shipping address and billing address - single entry where required.</p>
                                    </div>
                                    <div class="grid_1_of_4 images_1_of_4">
                                         <img src="<?php echo base_url(); ?>assets/themes/default/images/payment.png" alt="" />
                                          <h3>Payment Options</h3>
                                          <p>Real-time processing for standard credit cards, also Amex and Pay Pal. Security to check validity and balance.  Email printable invoice / order acknowledgment</p>
                                    </div>
                                  </div>
                              </div> <!-- feature grids -->
                          </div> <!-- wrap -->

                      </div> <!-- features -->
    </div> <!-- class content -->
</div> <!-- class main -->
    
