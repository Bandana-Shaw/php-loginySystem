   <?php

      include 'dbcon.php';


      if(isset($_POST['check_submit_btn'])) {
        $email = $_POST['email_id'];

        $emailquery = " select * from register where email='$email' ";
        $query = mysqli_query($con, $emailquery);
        $emailcount = mysqli_num_rows($query);
        if($emailcount>0) {
           echo "Email Already exists. Please try another.";
      } else {
        echo "It's Available.";
      }
    }

      if(isset($_POST['register'])) {
        $fname    = $_POST['fname'];
        $lname    = $_POST['lname'];
        $email    = $_POST['email'];
        $phone    = $_POST['phone'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        // $err = null;

        if(!preg_match("/^([a-zA-Z' ]+)$/", $fname)&&($fname != "")){
          $error= "Enter First Name Properly.";
          header("Location: register.php?msg=".urlencode($error));
        } else if(!preg_match("/^([a-zA-Z' ]+)$/", $lname)&&($lname != "")){
          $error= "Enter Last Name Properly.";
          header("Location: register.php?msg=".urlencode($error));
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)&&($email != "")) {
          $error = "Invalid email format";
          header("Location: register.php?msg=".urlencode($error));
        } else if (strlen($password) < 8) {
          $error= "Password Invalid";
          header("Location: register.php?msg=".urlencode($error));
        } else if (strlen($password) != strlen($cpassword)) {
          $error= "Password did not match";
          header("Location: register.php?msg=".urlencode($error));
        } else if($fname != "" && $lname != "" && $email != "" && $phone != "" && $password != "" && $cpassword != "") {
            $emailquery = " select * from register where email='$email' ";
            $query = mysqli_query($con, $emailquery);
            $emailcount = mysqli_num_rows($query);
            if($emailcount>0) {
              $error= "Email already exists";
              header("Location: register.php?msg=".urlencode($error)); 
            } else {
              $insertquery = "insert into register( fname, lname, email, phone, password) values('$fname', '$lname', '$email', '$phone', '$password')";
              $iquery = mysqli_query($con, $insertquery);
              if($iquery) {
                  $error= "Registered successfully";
                  header("Location: index.php?msg=".urlencode($error)); 
              } else {
                $error= "Data not Inserted";
                header("Location: index.php?msg=".urlencode($error)); 
            } 
          }
        } else {
          $error= "Fields cannot be empty";
          header("Location: register.php?msg=".urlencode($error));  
        }
    }
    ?>
