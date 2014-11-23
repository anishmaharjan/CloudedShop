<body>
	<div class='header' id='home'>
		<div class='header_top'>
           <div class='wrap'>
            <div class='logo'>
                <a href="<?php echo site_url(); ?>"><img src="<?php echo base_url().'assets/themes/default/images/logo.png'; ?>" alt="Logo" /></a>
            </div>
            
            <div class='menu'>
                <ul>
                    <li><a href="<?php echo site_url(); ?>">Home</a></li>
                    <li><a href="<?php echo site_url('products/browse'); ?>">Browse</a></li>
                    <li><a href="<?php echo site_url('cart'); ?>">Cart</a></li>
                    <li><a href="<?php echo site_url('products/about'); ?>">About</a></li>
                    <!-- <li class='login'> <div id='loginContainer'><a id='loginButton' href='#' ><span>Guest_</span></a></div></li> -->

                    <li class="login" >
                        <div id="loginContainer"><a href="#" id="loginButton"><span>
                                       <?php                                            
                                            if($this->input->post('password'))
                                            {
                                                echo $this->input->post('username');
                                            }
                                            else
                                            {
                                                echo "LogIn";
                                            }
                                        ?>
                                </span></a>
                                <div id="loginBox">                
                                    <form id="loginForm" method='POST' action='users/verifylogin'>
                                        <fieldset id="body">
                                            <fieldset>
                                                <label for="email">Username</label>
                                                <input type="text" name="username" id="email">
                                            </fieldset>
                                            <fieldset>
                                                <label for="password">Password</label>
                                                <input type="password" name="password" id="password">

                                            </fieldset>
                                            <input type="submit" id="login" value="Sign in">
                                            <label for="checkbox"><input type="checkbox" id="checkbox"> Remember me</label>
                                        </fieldset>
                                        <span><a href="#"><i>Forgot your password?</i></a></span>
                                        <span><a href="<?php echo site_url(); ?>users/register"><i>Create a new ID?</i></a></span>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <p><?php echo validation_errors(); ?> </p>
                        <div class='clear'> </div>   
                    </ul>
                    <div class='clear'></div>
                </div>
            </div>

      
        </div>

