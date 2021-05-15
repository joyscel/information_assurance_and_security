<?php
session_start();

// initializing variables
$username = "";
$password="";
$newPassword="";
$email    = "";
$errors = array(); 
$limit=1;

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'activity_three');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['user_name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM registered_users WHERE user_name='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['user_name'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
  if (strlen($_POST["password_1"]) <= '8') {
         array_push($errors, "Your Password Must Contain At Least 8 Digits !");
    }
    elseif(!preg_match("#[0-9]+#",$_POST["password_1"])) {
         array_push($errors, "Your Password Must Contain At Least 1 Number !");
    }
    elseif(!preg_match("#[A-Z]+#",$_POST["password_1"])) {
         array_push($errors, "Your Password Must Contain At Least 1 Capital Letter !");
    }
    elseif(!preg_match("#[a-z]+#",$_POST["password_1"])) {
        array_push($errors, "Your Password Must Contain At Least 1 Lowercase Letter !");
    }
    
     elseif(!preg_match("@[^\w]@", $_POST['password_1'])) {
         array_push($errors, "Your Password Must Contain At Least 1 Special Character !");
    }


  // Finally, register user if there are no errors in the form
 if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO registered_users (user_name, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['user_name'] = $username;
  	$_SESSION['success'] = "You have registered successfully.";
  	            echo "<script>alert('You have successfully registered .');window.location.href = 'http://localhost/AUDIT_TRAIL/login-form.php';</script>";
  }
}
//for logging in
if (isset($_POST['login_user'])) {
	
  $username = mysqli_real_escape_string($db, $_POST['user_name']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $login_pass= md5($password);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$query = "SELECT * FROM registered_users WHERE user_name='$username' AND password='$login_pass'";
  	$results = mysqli_query($db, $query);
	
  	if (mysqli_num_rows($results) == 1) {
		$_SESSION['login']="";
           $row = mysqli_fetch_assoc($results);
		   
           $user_id=$row['id'];
		   $_SESSION['id'] = $user_id;
  	       $_SESSION['user_name'] = $username;
  	       $_SESSION['success'] = "You are now logged in";  
		   date_default_timezone_set('Asia/Singapore');
            $date=date('Y-m-d H:i:s'); 
		   $activity1="Attempted to login.";
		   $insert= mysqli_query($db, "INSERT INTO activity_log (activity, user_id,user_name, date) VALUES ('$activity1','$user_id','$username','$date')" );
		   
  	       $otp = rand(100000,999999);
            date_default_timezone_set('Asia/Singapore');
            $created_at=date('Y-m-d H:i:s');
            $expiration = date('Y-m-d H:i:s', strtotime("+5 min"));
            $result1 = "INSERT INTO users_code(code, users_id, created_at, expiration) VALUES ('" . $otp . "', '" . $user_id . "', '" . $created_at . "', '" . $expiration . "')";
            $function=mysqli_query($db, $result1);	
            echo "<script>alert('Your One Time Password is: $otp');window.location.href = 'http://localhost/AUDIT_TRAIL/code_verification.php';</script>";
			
  	 }else {
  		array_push($errors, "Wrong username/password combination");
  	 }
	 
}  

}

// logout
if (isset($_POST['logout'])) {
  $username=$_SESSION['user_name'];
	$user_id=$_SESSION['id'];
	if($username==true){
 		$_SESSION['user_name'] = $username;
		$_SESSION['id'] = $user_id;
												
												
		   date_default_timezone_set('Asia/Singapore');
            $date=date('Y-m-d H:i:s'); 
		   $activity1="Logged out.";
		   $insert= mysqli_query($db, "INSERT INTO activity_log (activity, user_id,user_name, date) VALUES ('$activity1','$user_id','$username','$date')" );
	  
  
}
}
// to reset password using username
if (isset($_POST['send_username'])) {
	
  $username = mysqli_real_escape_string($db, $_POST['user_name']);
  
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  
  if (count($errors) == 0) {
  	
  	$query = "SELECT * FROM registered_users WHERE user_name='$username' ";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
	$row = mysqli_fetch_assoc($results);
	$user_id=$row['id'];
  	$_SESSION['user_name'] = $username;
  	$_SESSION['success'] = "You can now reset your password.";
	date_default_timezone_set('Asia/Singapore');
    $date=date('Y-m-d H:i:s'); 
	$activity1="Forgot Password.";
	$insert= mysqli_query($db, "INSERT INTO activity_log (activity, user_id,user_name, date) VALUES ('$activity1','$user_id','$username','$date')" );
	   header('Location: change_password.php');  	  
  	}else {
  		array_push($errors, "Username does not exist.");
  	}
  }
}




// RESET PASSWORD
if (isset($_POST['reset_password'])) {
	$username=$_SESSION['user_name'];
	$user_id=$_SESSION['id'];
	if($username==true){	

  // receive all input values from the form
  $rememberedPassword = mysqli_real_escape_string($db, $_POST['last_rememberedPassword']);
  $newPassword = mysqli_real_escape_string($db, $_POST['new_Password']);
  $confirm_newPassword = mysqli_real_escape_string($db, $_POST['confirm_newPassword']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($newPassword)) { array_push($errors, "Enter your new password."); }
  if ($newPassword != $confirm_newPassword) {
	array_push($errors, "Two passwords do not match");
  }
  
  if (strlen($_POST["new_Password"]) <= '8') {
         array_push($errors, "Your Password Must Contain At Least 8 Digits !");
    }
    elseif(!preg_match("#[0-9]+#",$_POST["new_Password"])) {
         array_push($errors, "Your Password Must Contain At Least 1 Number !");
    }
    elseif(!preg_match("#[A-Z]+#",$_POST["new_Password"])) {
         array_push($errors, "Your Password Must Contain At Least 1 Capital Letter !");
    }
    elseif(!preg_match("#[a-z]+#",$_POST["new_Password"])) {
        array_push($errors, "Your Password Must Contain At Least 1 Lowercase Letter !");
    }
    
     elseif(!preg_match("@[^\w]@", $_POST['new_Password'])) {
         array_push($errors, "Your Password Must Contain At Least 1 Special Character !");
    }


  // Finally, register user if there are no errors in the form
 if (count($errors) == 0) {
	$username = $_SESSION['user_name'];
	$password = md5($newPassword);//encrypt the password before saving in the database
  	$passwordQuery = "UPDATE registered_users SET password= '$password' WHERE user_name='$username' "; 
  	$query=mysqli_query($db, $passwordQuery);
	if($query){
		$_SESSION['user_name'] = $username;
		$_SESSION['id'] = $user_id;
												
		date_default_timezone_set('Asia/Singapore');
		$date=date('Y-m-d H:i:s'); 
		$activity1="Password changed successfully.";
		$insert= mysqli_query($db, "INSERT INTO activity_log (activity, user_id,user_name, date) VALUES ('$activity1','$user_id','$username','$date')" );
		echo "<script>alert('Password succesfully changed.');window.location.href = 'http://localhost/AUDIT_TRAIL/login-form.php';</script>";
		 	 
               
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }   	 	
}
}
}

?>
