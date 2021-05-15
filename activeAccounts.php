<?php include('server.php');?>

<?php
  

  
// Checking for connections
if ($db->connect_error) {
    die('Connect Error (' . 
    $db->connect_errno . ') '. 
    $db->connect_error);
}
  
// SQL query to select data from database
$sql = "SELECT * FROM activity_log WHERE date IN (SELECT max(date) FROM activity_log)"; //"SELECT * FROM activity_log WHERE ORDER BY date DESC ";
$result = $db->query($sql);
$db->close(); 
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <title>Active Accounts</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
  
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
  
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
  
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
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
  
}	
    </style>
</head>
  
<body>
<form action="login-form.php" method="POST">
    <section>
        <h1>Active Accounts</h1>
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th>User ID</th>
				<th>Username</th>
                <th>Activity</th>
                <th>Date</th>
                
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['user_id'];?></td>
				<td><?php echo $rows['user_name'];?></td>
                <td><?php echo $rows['activity'];?></td>
                <td><?php echo $rows['date'];?></td>
                
            </tr>
            <?php
                }
             ?>
			 
			 
			 
        </table>
    </section>
	<br>
			 <br>
			 <br>
			  <center><h3><input type="submit" name="logout"  value="Logout" class="name"></h3></center>
	</form>
</body>
  
</html>
