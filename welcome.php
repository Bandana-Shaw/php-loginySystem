<?php 
session_start();

include("dbcon.php");
error_reporting(0);	

//if session exists 
$id_session = $_SESSION['id'];
if ($id_session == true) {
	
} else {
	header('location:index.php');
}

$query = "SELECT * FROM register where id = '$id_session' ";
$data = mysqli_query($con, $query);
$total = mysqli_num_rows($data);


if($total != 0) {
	?>
	<h2 align="center"><mark>Welcome</mark></h2>
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
	<title>Welcome</title>
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
		.container a input {
			margin: 20px 0 20px 123px;
			font-size: 20px;
			width: 100px;
			height: 50px;
			color: white;
			background: blue;
			border: 0;
			border-radius: 5px;
			cursor: pointer;
		}
			.container button{
			margin: 0px 0 0px 100px;
			padding: 12px;
			font-size: 20px;
			color: white;
			background: blue;
			border: 0;
			border-radius: 5px;
			cursor: pointer;
		
		/*.container {
			display: flex;
			justify-content: space-between;
		}*/
	</style>
</head>
<body>
	<div class="container">
	<a href="logout.php" class="logout"><input type="submit" name="" value="LogOut"></a>
	<a href="changepwd.php" class="pwd"><button>Change Password</button></a>
</div>
	

</body>
</html>