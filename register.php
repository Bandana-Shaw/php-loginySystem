  <?php
    if (isset($_GET['msg'])) {
      $err = $_GET['msg'];
      echo "<div class= 'alert'>$err</div>";
      header("Refresh: 3; url=register.php");
    }
    ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <style>
  
  form {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  border: 2px solid  rgb(243, 188, 188);
  box-shadow: 8px 4px 4px rgb(241, 204, 204);
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
.position {
  position: absolute;
  top: 20px;
  right: 74px;
  text-decoration: none;
  color: black;
  font-weight: 500;
  font-size: 30px;
  background: rgb(189, 182, 255);
  padding: 0 10px;
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
	<form id="registration_form" action="action.php" method="POST">
    <h1> Register </h1>
  <div class="mb-3">
    <label>First Name</label>
    <input type="text" class="form-control" id="form_fname" name="fname">
    <span id="fname_error_message" class="error_form"></span>
  </div>
  <div class="mb-3">
    <label>Last Name</label>
    <input type="text" class="form-control" id="form_lname" name="lname">
    <span id="lname_error_message" class="error_form"></span>
  </div>
   <div class="mb-3">
    <label>Email address</label>
    <input type="email" class="form-control checkEmail" id="form_email" name="email" value="" maxlength="255" onblur="check_email(this.value)">
    <span id="email_error_message" class="error_form"></span>
  </div>

  </div>
  <div class="mb-3">
    <label>Phone Number</label>
    <input type="tel" class="form-control" id="form_phone" name="phone">
    <span id="phone_error_message" class="error_form"></span>
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" class="form-control" id="form_password" name="password">
    <span id="password_error_message" class="error_form"></span>
  </div>
   <div class="mb-3">
    <label>Confirm Password</label>
    <input type="password" class="form-control" id="form_cpassword" name="cpassword">
    <span id="cpassword_error_message" class="error_form"></span>
  </div>
  <div class="mb-3 center">
  <button type="submit" name="register" class="btn btn-primary">Register</button>
</div> 
<div>
  <p>Already have an account?
  <span><a href="index.php" style="text-decoration: none;">Login</a></span>
  </p>
</div>
</form>
  <script>
    $(document).ready(function () {
      $('.checkEmail').keyup(function (e) {
        var email = $('.checkEmail').val();
        $.ajax({
          type: "POST",
          url:"action.php",
          data: {
            "check_submit_btn": 1,
            "email_id": email,
          },
          success: function(response) {
            // alert(response);
            $('#email_error_message').text(response);
          }
         });
      });
    });

$(function() {
  $("#fname_error_message").hide()
  $("#lname_error_message").hide()
  // $("#email_error_message").hide();
  $("#phone_error_message").hide()
  $("#password_error_message").hide();
  $("#cpassword_error_message").hide();

  var error_fname = false;
  var error_lname = false;
  var error_email = false;
  var error_phone = false;
  var error_password = false;
  var error_cpassword = false;


  $("#form_fname").focusout(function() {
    check_fname();
  });

  $("#form_lname").focusout(function() {
    check_lname();
  });

  $("#form_email").focusout(function() {
    check_email();
  });

 $("#form_phone").focusout(function() {
    check_phone();
  });

  $("#form_password").focusout(function() {
    check_password();
  });
   $("#form_cpassword").focusout(function() {
    check_cpassword();
  });
  
   function check_fname() {
    var pattern = /^[a-zA-Z]*$/;
    var fname = $("#form_fname").val();
    if(pattern.test(fname) && fname !== '') {
      $("#fname_error_message").hide();
      $("#form_fname").css("border-bottom", "2px solid #34F458");
    } else {
      $("#fname_error_message").html("Should only contain characters");
      $("#fname_error_message").show();
      $("#form_fname").css("border-bottom", "2px solid #F90A0A");
      error_fname = true;
    }
   }

    function check_lname() {
    var pattern = /^[a-zA-Z]*$/;
    var lname = $("#form_lname").val();
    if(pattern.test(lname) && lname !== '') {
      $("#lname_error_message").hide();
      $("#form_lname").css("border-bottom", "2px solid #34F458");
    } else {
      $("#lname_error_message").html("Should only contain characters");
      $("#lname_error_message").show();
      $("#form_lname").css("border-bottom", "2px solid #F90A0A");
      error_lname = true;
    }
   }

  function check_password() {
    var password_length = $("#form_password").val().length;
    if (password_length < 8) {
      $("#password_error_message").html("Atleast 8 characters");
      $("#password_error_message").show();
      $("#form_password").css("border-bottom", "2px solid #F90A0A");
      error_password = true;
    } else {
      $("#password_error_message").hide();
      $("#form_password").css("border-bottom", "2px solid #34F458");
    }
  }

  function check_cpassword() {
    var password = $("#form_password").val();
    var cpassword = $("#form_cpassword").val();
    if (password !== cpassword) {
      $("#cpassword_error_message").html("Passwords did not match");
      $("#cpassword_error_message").show();
      $("#form_cpassword").css("border-bottom", "2px solid #F90A0A");
      error_cpassword = true;
      } else {
        $("#cpassword_error_message").hide();
        $("#form_cpassword").css("border-bottom", "2px solid #34F458");
    }
  }

  // function check_email() {
  //    var pattern = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  //    var email = $("#form_email").val();
  //    if (pattern.test(email) && email !== '') {
  //     $("#email_error_message").hide();
  //     $("#form_email").css("border-bottom", "2px solid #34F458");
  //    } else {
  //     $("#email_error_message").html("Invalid Email");
  //     $("#email_error_message").show();
  //     $("#form_email").css("border-bottom", "2px solid #F90A0A");
  //     error_email = true;
  //    }
  // }


   function check_phone() {
    var pattern = /(7|8|9)\d{9}/;
    var phone = $("#form_phone").val();
    if(pattern.test(phone) && phone !== '') {
      $("#phone_error_message").hide();
      $("#form_phone").css("border-bottom", "2px solid #34F458");
    } else {
      $("#phone_error_message").html("Enter Number Correctly");
      $("#phone_error_message").show();
      $("#form_phone").css("border-bottom", "2px solid #F90A0A");
      error_phone = true;
    }
    var phone_length = $("#form_phone").val().length;
     if (phone_length != 10) {
      $("#phone_error_message").html("Wrong Number");
      $("#phone_error_message").show();
      $("#form_phone").css("border-bottom", "2px solid #F90A0A");
      error_phone = true;
    } else {
      $("#phone_error_message").hide();
      $("#form_phone").css("border-bottom", "2px solid #34F458");
    }
  }


  $("#registration_form").submit(function() {
    error_email = false;
    error_password = false;
    error_cpassword = false;
    error_fname = false;
    error_lname = false;
    error_phone = false;

    check_email();
    check_password();
    check_cpassword();
    check_fname();
    check_lname();
    check_phone();

    if(error_phone === false && error_fname === false && error_lname === false && error_password === false && error_cpassword === false) {
      alert("Login Successfull");
      return true;
    } else {
      alert("Please fill the form correctly");
      return false;
    }
  });
});

 </script>
</body>
</html>