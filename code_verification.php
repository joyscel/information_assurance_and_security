<?php include('server.php'); ?>

<html>
<head>
	<title></title>
</head>
<style type="text/css">

  * {
  margin: 0px;
  padding: 0px;
}
body {
  font-size: 120%;
  background: #F8F8FF;
}

.header {
  
  margin: 0px 0px 0px 0px;
  color: black;
  background: rgb(188,221,178);
  text-align: center;
  border: none;
 
  border-radius: 10px 10px 0px 0px;
  padding: 10px;
}
.div {
  width: 30%;
  margin: 30px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: rgb(188,221,178);
  border-radius: 10px 10px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.code_input {
  height: 30px;
  width: 300px;
  padding: 30px 10px;
  font-size: 30px;
  text-align:center;
  border-radius: 5px;
  border: 1px solid gray;
  outline:none;
}
.name_button {
  width:300px;
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 4px 2px;
  border-radius: 5px;
  cursor: pointer;
}

</style>
<body>
<div class="div">
	<form action="code_verification.php" method="POST">
	<br>
	<br>
	
	<div class="header">
	<h3>Enter Code</h3>
	</div>
	<br>
	<center><input type="text" name="otp" id="otp"  class="code_input" value=""autofocus></center>
	<br>
	<center><input type="submit" name="submit-otp" name="submit-otp"  value="Submit" class="name_button" ><center><br>
	<br>
	
</form>
</div>
</body>


</html>
<?php

//for database connection
$localhost= "localhost";
$root= "root";
$password = "";
$db_name = "activity_three";

$db = mysqli_connect($localhost, $root, $password, $db_name);

if (isset($_POST['submit-otp'])){
	$username=$_SESSION['user_name'];
	$user_id=$_SESSION['id'];
	if($username==true){
	
	
	$otp=$_POST['otp'];
	$sql="SELECT * FROM users_code ORDER BY ID DESC LIMIT 1";
	$result = mysqli_query($db, $sql);
	if (mysqli_num_rows($result) === 1) {
	$row = mysqli_fetch_assoc($result);
	 if ($row['code'] === $otp){
	 	$_SESSION['code'] = $row['code'];
		
	 	$timestamp =  $_SERVER["REQUEST_TIME"];
            								$sqlQuery = "SELECT * FROM users_code WHERE code='". $_POST["otp"]."' AND expiration!=1 AND NOW() <= DATE_ADD(created_at, INTERVAL 5 MINUTE)";

            			$result = mysqli_query($db, $sqlQuery);
											$count = mysqli_num_rows($result);
											if(!empty($count)) {
												$_SESSION['user_name'] = $username;
												$_SESSION['id'] = $user_id;
												
												date_default_timezone_set('Asia/Singapore');
												$date=date('Y-m-d H:i:s'); 
												$activity1="Logged in.";
												$insert= mysqli_query($db, "INSERT INTO activity_log (activity, user_id, user_name,date) VALUES ('$activity1','$user_id','$username','$date')" );
																							header("Location: index.php");
            								 }else{
            								 echo "<script>alert('Your Code is Already Expired')</script>";
            						}
            						}else{
										echo "<script>alert('Invalid OTP');window.location.href = 'http://localhost/AUDIT_TRAIL/login-form.php';</script>";
										
										}
									
							}
           					

           						 
				}elseif(empty($_POST["otp"])) {
					echo "<script>alert('Enter code')</script>";
					
				}			
}