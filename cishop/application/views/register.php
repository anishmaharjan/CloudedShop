<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel='stylesheet' type='text/css' href='<?php echo base_url('assets/themes/default/css/ci.css'); ?>'>	
</head>
<body>
	<div class="content">
<h1>Register</h1>
<div class="customer_desc">
	<code>
<table>
<?php

	echo form_open('admin/register_validation');

	echo validation_errors();

	echo "<tr><td>Username: </td><td>";
	echo form_input("username",$this->input->post('username'));
	echo "</td></tr>";

	echo "<tr><td>Password</td><td>";
	echo form_password("password");
	echo "</td></tr>";
	echo "<tr><td>Confirm Password</td><td>";
	echo form_password("cpassword");
	echo "</td></tr>";

	echo "<tr><td colspan='2'>";
	echo form_submit("submit_register","Sign Up");
	echo "</td></tr>";

	echo form_close();

?>
</table>
</code>

</div>
<a href="<?php echo base_url('admin'); ?>">Go back</a>
</div>

</body>
</html>