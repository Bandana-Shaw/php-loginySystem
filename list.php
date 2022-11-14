<?php 
include("dbcon.php");

$query = "SELECT * FROM register";
$data = mysqli_query($con, $query);
$total = mysqli_num_rows($data);

if($total != 0) {
	?>
	<h2 align="center"><mark>List of Users</mark></h2>
	<center>
	<table border="1" cellspacing="7" width="85%">
		<thead>
			<tr>
				<th width="10%">First Name</th>
				<th width="10%">Last Name</th>
				<th width="20%">Email</th>
				<th width="10%">Phone Number</th>
				<th width="25%">Password</th>
			</tr>
		</thead>
		<?php 

		while($result = mysqli_fetch_assoc($data)) {
			echo "<tr>
				<td>".$result["fname"]."</td>
				<td>".$result["lname"]."</td>
				<td>".$result["email"]."</td>
				<td>".$result["phone"]."</td>
				<td>".$result["password"]."</td>
			</tr>
			";
		}
		} else {
			echo "No records found";
		}
		?>
	</table>
</center>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>List</title>
	<style>
		body {
			background: #C4DFAA;
		}
		h2 {
			font-size: 40px;
		}
		table {
			background: white;
		}
		
	</style>
</head>

</html>