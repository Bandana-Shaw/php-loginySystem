  <?php
  session_start();

    if (isset($_GET['msg'])) {
      $err = $_GET['msg'];
      echo "<div class= 'alert'>$err</div>";
      header("Refresh: 3; url=index.php");
    }

    include("dbcon.php");
    if(isset($_POST['login'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $query = " SELECT * FROM register WHERE email = '$email' && password = '$password' ";
      $data = mysqli_query($con, $query);
      $result = mysqli_fetch_assoc($data);
      $total = mysqli_num_rows($data);



      if($total == 1) {

        $_SESSION['id'] = $result['id'];
        header("location:welcome.php");
      } else {
         $error= "Login Failed, Incorrect Credential";
         header("Location: index.php?msg=".urlencode($error)); 
      }
    }
    ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<style>
  body {
    background-image: url('images/log.webp');
    background-repeat: no-repeat;
    background-size: cover;
  }
  form {
   position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  border: 2px solid rgb(168, 168, 194);
  box-shadow: 8px 4px 4px rgb(168, 168, 194);
  padding: 20px;
   font-family: sans-serif;
  font-weight: large;;
  width: 20%;
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
  margin-bottom: 5px;
}
</style>
</head>
<body>
	<form action= "#" method="POST" id="registration_form">
    <h1> Login </h1>
  <div class="mb-3">
    <label>Email address</label>
    <input type="email" class="form-control" id="form_email" name="email" required="">
    <span id="email_error_message" class="error_form"></span>
  </div>

  <div class="mb-3">
    <label>Password</label>
    <input type="password" class="form-control" id="form_password" name="password" required="">
    <span id="password_error_message" class="error_form"></span>
  </div>
  <div class="center">
  <button type="submit" name="login" class="btn btn-primary" name="">Login</button>
  <div>
  <p>Dont have an account?
  <span><a href="register.php" style="text-decoration: none;">Register</a></span>
  </p>
</div>
</div> 
</form>
 <script>

// $(function() {
//   $("#email_error_message").hide();
//   $("#password_error_message").hide();

//   var error_email = false;
//   var error_password = false;

//   $("#form_email").focusout(function() {
//     check_email();
//   });
//    $("#form_password").focusout(function() {
//     check_password();
//   });
  
//   function check_password() {
//     var password_length = $("#form_password").val().length;
//     if (password_length < 8) {
//       $("#password_error_message").html("Atleast 8 characters");
//       $("#password_error_message").show();
//       $("#form_password").css("border-bottom", "2px solid #F90A0A");
//       error_password = true;
//     } else {
//       $("#password_error_message").hide();
//       $("#form_password").css("border-bottom", "2px solid #34F458");
//     }
//   }

//   function check_email() {
//      var pattern = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
//      var email = $("#form_email").val();
//      if (pattern.test(email) && email !== '') {
//       $("#email_error_message").hide();
//       $("#form_email").css("border-bottom", "2px solid #34F458");
//      } else {
//       $("#email_error_message").html("Invalid Email");
//       $("#email_error_message").show();
//       $("#form_email").css("border-bottom", "2px solid #F90A0A");
//       error_email = true;
//      }
//   }

//   $("#registration_form").submit(function() {
//     error_email = false;
//     error_password = false;

//     check_email();
//     check_password();

//     if(error_email === false && error_password === false) {
//       alert("Login Successfull");
//       return true;
//     } else {
//       alert("Please fill the form correctly");
//       return false
//     }
//   });
// });

 </script>
</body>
</html>