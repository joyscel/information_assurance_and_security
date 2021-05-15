<?php include('server.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		 * {
  margin: 0px;
  padding: 0px;
}
body {

 font-size: 120%;
  background: #F8F8FF;
}
.div {
  height: 200px;
  width: 30%;
  margin: 100px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: rgb(188,221,178);
  border-radius: 10px 10px 10px 10px;
}
.name{
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
  
}	</style>
</head>
<body>
<div class="div">
	<form action="index.php" method="POST">
	
    <center> <h4>WELCOME <br> <?php echo $_SESSION['user_name']; ?></h4></center>
	<br>
	<br>
	
     <center><h3><input type="submit" name="logout"  value="Logout" class="name"></h3></center>
	 <br>
	 
    <hr>
	 <br>
	<p>
	
	 	<center/><a href="activeAccounts.php" name="active_accounts" class="btn2">Wanna check who's active? </a> </center>	
  	</p>

    </form>
	 </div> 
</body>
</html>

<?php 
if (isset($_POST['logout'])){
	     header("Location: login-form.php");
     exit();
}


 ?>