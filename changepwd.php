<?php 
    if (isset($_GET['msg'])) {
      $err = $_GET['msg'];
      echo "<div class= 'alert'>$err</div>";
      header("Refresh: 3; url=changepwd.php");
    }

session_start();

include("dbcon.php");
error_reporting(0); 

//if session exists 
$id_session = $_SESSION['id'];
if ($id_session == true) {
  
} else {
  header('location:index.php');
}
    ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
   <style>
  
  form {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  border: 5px solid  darkgoldenrod;
  box-shadow: 8px 8px 8px dimgray;
  padding:10px;
  width: 40%;
  font-family: sans-serif;
  font-weight: large;
  background: white;
}
.alert {
  display: flex;
  justify-content: center;
  align-items: center;
  color: red;
  font-weight: 500;
  font-size: 30px;
  background: rgb(247, 218, 218);
  transition: all 2s ease;
  position: relative;
}
h1, .center {
  text-align: center;
}
.center button {
 margin: 15px 0px 5px 0px;
width: 40%;
}
</style>
</head>
<body>
<form id="registration_form" action="updatepwd.php" method="POST">
    <h1> Change Password </h1>
    <div><?php if(isset($message)) { echo $message; } ?></div>
  <div class="mb-3">
    <label>Old Password</label>
    <input type="password" class="form-control" id="form_password" name="password">
    <span id="password_error_message" class="error_form"></span>
  </div>
    <div class="mb-3">
    <label>New Password</label>
    <input type="password" class="form-control" id="form_npassword" name="npassword">
    <span id="npassword_error_message" class="error_form"></span>
  </div>
   <div class="mb-3">
    <label>Confirm Password</label>
    <input type="password" class="form-control" id="form_cpassword" name="cpassword">
    <span id="cpassword_error_message" style="color:red;" class="error_form"></span>
  </div>
  <div class="mb-3 center">
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div> 
</form>
</body>
<script>

       $().ready(function () {
            $("#registration_form").validate({
                rules: {
                    password: 'required',
                    npassword: {
                        required: true,
                        minlength: 8
                    },
                    cpassword: {
                        required: true,
                        minlength: 8,
                        equalTo: '#form_npassword'
                    },

                },
                // in 'messages' user have to specify message as per rules
                messages: {
                    password: "Enter Your Current Password",
                    npassword: {
                        required: "Enter New Password",
                        minlength: " Your password must be consist of at least 8 characters"
                    },
                    cpassword: {
                        required: "Enter Confirm Password",
                        minlength: " Your password must be consist of at least 8 characters",
                        equalTo: "Passwords Does Not Match."
                    },
                }
            });
        });

</script>
</html>
