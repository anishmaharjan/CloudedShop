<!--  <!DOCTYPE html>
<html>
<head>
	<title>Admin Login </title>
	<link rel='stylesheet' type='text/css' href='<?php echo base_url('assets/themes/default/css/ci.css'); ?>'>
</head>


<body>  -->
	<div id='content'>

		<div id='body'>
			<div class='features'>
		<h2><span>Admin Login!<span></h2>
				<div class="wrap">
					<?php
					echo form_open('admin/login_validation');
					echo validation_errors();

					echo "<p>Username: ";
					echo form_input('username',$this->input->post('username'));
					echo "</p>";


					echo "<p>Password:-  ";
					echo form_password('password');
					echo "</p>";

					
					echo form_submit('login_submit','Enter');

					echo form_close();

					?>
				</div>

			</div>
		</div>
		<div style="width:20px; height:175px;">

		</div>
		<div class="footer">


			<a style="color:white;">Page rendered in <strong>{elapsed_time}</strong> seconds</a>

		</div>
	</div>
</div>
</body>

</html>