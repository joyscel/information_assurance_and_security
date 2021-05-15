<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Reset Password</title>
  
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
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 2px;
  border: 1px solid gray;
  
}
.btn2 {
  width:100px;
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display:inline-block;
  float:right;
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
  	<h4>Enter username</h4>
  </div>
	
  <form method="post" action="reset_password.php">
  <?php include('errors.php'); ?>
  	<div class="input-group">
  		<label><strong>Username</strong></label>
  		<input type="text" name="user_name" >
  	</div>
  	<div class="input_group">
  		<input type="submit" class="btn2" name="send_username" value="Next">
  	</div>
	<br>
	<br>
	
  </form>
  
</body>
</html>