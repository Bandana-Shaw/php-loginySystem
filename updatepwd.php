<?php
include "dbcon.php"; 
session_start();


if(isset($_POST)) {
	$password = $_POST['password'];
	$npassword =  $_POST['npassword'];
	$cpassword =  $_POST['cpassword'];


	if($npassword != "" && $password != "" && $cpassword != "") {
		$id_session = $_SESSION['id'];
		$query = mysqli_query($con, "SELECT * from register WHERE id = '$id_session' ");
		$data = mysqli_fetch_array($query);
		$data1 = $data['password'];

		if($data1 == $password) {
			if($npassword == $cpassword) {
				$update = mysqli_query($con, "update register set password = '$cpassword' where id = '$id_session' ");
				$error= "PASSWORD UPDATED SUCCESSFULLY";
	            header("Location: welcome.php?msg=".urlencode($error));  
			} else {
				$error = "NEW PASSWORD AND CONFIRM PASSWORD ARE NOT SAME";
	            header("Location: changepwd.php?msg=".urlencode($error));
			}
		} else {
			$error = "OLD PASSWORD IS INCORRECT";
	        header("Location: changepwd.php?msg=".urlencode($error));

		}
	} else {
		$error = "FIELDS CANNOT BE EMPTY";
	    header("Location: changepwd.php?msg=".urlencode($error));
	}
}
?>

