<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel='stylesheet' type='text/css' href='<?php echo base_url('assets/themes/default/css/ci.css'); ?>'>	
</head>

<body>
	<div class="content">
	<div class="head">
	<ul>
		<li>
			<a href="<?php echo base_url('admin/register'); ?>">Register a New Admin</a>
		</li>
		<li>
			<a href="<?php echo base_url('admin/logout'); ?>">Log Out</a>
		</li>
	</ul>
	</div>
	<div class="head">
	<ul>
	 <li style="color:white;">Welcome, <?php echo $this->session->userdata('username'); ?>!</li>
	</ul>
	</div>
	<h1>CRUD Section</h1>
	<div class="customer_desc">
		<code>
		<h2>Create</h2>
		<table>
		<?php 
		
		echo form_open_multipart('admin/create'); 

		echo "<tr><td>Name: </td><td>";
		echo form_input('name');
		echo "</td></tr>";

		echo "<tr><td>Description </td><td>";
		echo form_textarea('description');
		echo "</td></tr>";

		echo "<tr><td>Price <td>";
		echo form_input('price');
		echo "</tr>";

		echo "<tr><td>PicName<td>";
		echo form_input('filename');
		echo "</tr><tr><td>";

		echo form_upload('userfile');
		echo "</td><td>";
		echo form_submit('upload','Create');
		echo "</tr>";
		echo form_close();


		?>
	</table>
	</code>

	</div>

	<p> <h2>To delete, click Delete</h2> </p>
	<div class="customer_desc">
	<code>
		<h2>Read / Delete</h2>
		<table>
			<tr>
			<?php if(isset($records)) : foreach($records as $row) : ?>
				<td> <?php echo $row->name; ?></td>
				<td><img src="<?php echo base_url().$row->picture; ?>"></td>
				<td><?php echo anchor("admin/delete/$row->serial",'Delete'); ?></td>
			</tr>
			<?php endforeach; ?>

		</table>
		<?php else: ?>
		<p>No records were returned.</p>
		<?php endif; ?>
	</code>
	</div>

</div> <!-- content end -->
</body>
</html>
