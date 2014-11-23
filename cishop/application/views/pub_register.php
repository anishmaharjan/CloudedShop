
<h1>Create a New ID</h1>
<div class="features">
<?php

	echo form_open('users/register_validation');

	echo validation_errors();
	echo "<p>Name: ";
	echo form_input("name",$this->input->post('name'));
	echo "</p>";

	echo "<p>Address: ";
	echo form_input("address",$this->input->post('address'));
	echo "</p>";

	echo "<p>Contact: ";
	echo form_input("contact",$this->input->post('contact'));
	echo "</p>";

	echo "<p>Email: ";
	echo form_input("email",$this->input->post('email'));
	echo "</p>";

	echo "<p>Username: ";
	echo form_input("username",$this->input->post('username'));
	echo "</p>";

	echo "<p>Password";
	echo form_password("password");
	echo "</p>";
	echo "<p>Confirm Password";
	echo form_password("cpassword");
	echo "</p>";

	echo "<p>";
	echo form_submit("submit_register","Sign Up");
	echo "</p>";

	echo form_close();

?>

<a href="<?php echo base_url(); ?>">Go back</a>
</div>


</body>
</html>