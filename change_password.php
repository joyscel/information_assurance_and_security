<?php include('server.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>Change Password</title>
  
</head>
<style>
 * {
  margin: 0px;
  padding: 0px;
}
body {
  font-size: 120%;
  background: #F8F8FF;
}

.header {
  width: 30%;
  margin: 50px auto 0px;
  color: black;
  background: rgb(188,221,178);
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #4CAF50;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  font-size:17px;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 18px;
  border-radius: 2px;
  border: 1px solid gray;
  outline:none;
}
.button {
  width: 98%;
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display:inline-block;
  font-size: 20px;
  margin: 4px 2px;
  border-radius: 5px;
  cursor: pointer;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}

</style>
<body>
 <div class="header">
  	<h4>Reset Password Form</h4>
  </div>
	 
  <form method="post" action="change_password.php">
  <?php include('errors.php'); ?>
  <br>
   
  	<div class="input-group">
  		<label><strong>Last remembered password</strong></label> 
  		<input type="text" name="last_rememberedPassword" >
  	</div>
  	<div class="input-group">
  		<label><strong>Enter new password</strong></label>
  		<input type="password" name="new_Password">
  	</div>
	<div class="input-group">
  		<label><strong>Re-enter new password</strong></label>
  		<input type="password" name="confirm_newPassword">
  	</div>
  	<div >
  		<input type="submit" class="button" name="reset_password" value="Reset Password">
  	</div>
	<br>
	<br>
	
  </form>

</body>
</html>