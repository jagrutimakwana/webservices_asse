<?php

$json=file_get_contents('http://localhost/jagrutiproject/webservices_php_api/webservices_asse/webservices_asse/webservices_form.php');

$arr=json_decode($json); // json econvert to arr
?>

<table border="2" width="80%" align="center">
	<tr>
		<td>ID</td>
		<td>Name</td>
		<td>Email</td>
		<td>Password</td>
		<td>C_Password</td>
		
	</tr>
	<?php
	foreach($arr as $d)
		{
		?>	
	<tr>
		<td><?php echo $d->id;?></td>
		<td><?php echo $d->name;?></td>
		<td><?php echo $d->email;?></td>
		<td><?php echo $d->pwd;?></td>
		<td><?php echo $d->c_pwd;?></td>
	</tr>
		<?php
		}
?>
	
</table>





