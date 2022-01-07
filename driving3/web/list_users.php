<?php 
$mysql_server = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_db = "sis";
$connect = new mysqli($mysql_server,$mysql_user,$mysql_password,$mysql_db);
if($connect->connect_errno){
	printf("Connection failed: %s \n",$connect->connect_error);
	exit();
}else{
	echo "Connection successful!";
}	
$connect->set_charset("utf8");
?>


<!DOCTYPE html>
<html lang="en-US" 	style="height: 100%;">
<head>
	<title>My First WebApp using PHP</title>
	<style>
		body{
			background-color: #adf9b1;
		}
		
	</style>
	
	<script>
		function popUp(){
			confirm("Are you sure?");	
		}	
	</script>
</head>
<body>
<br>
<br>
<a href="index.php">Registration Form</a>
<h1>List of Users</h1>
<hr>
 <table style="width:100%; border-collapse: collapse;" border="1">
  <tr>
    <th style="background-color: yellow;">User ID</th>
    <th style="background-color: blue;">Name</th> 
    <th style="background-color: red;">Course</th>
	<th style="background-color: green;">Birthdate</th>
	<th style="background-color: cyan;">Address</th>
	<th style="background-color: gray;">Username</th>
	<th style="background-color: #FFC107;">Password</th>
	<th style="background-color: white;">Action</th>
  </tr>
  
  <!--PHP SCRIPT MUST BE INSIDE <TABLE> tag-->
  <?php 
	//GET QUERY
	$get_users = "SELECT * FROM user"; //	  display user table
	$query = mysqli_query($connect,$get_users); //	
	
	//LOOP TO GET EACH DATA FROM LOCALHOST DATABASE
	while($row = mysqli_fetch_array($query)){
		echo "<tr>";
		echo "<td>".$row['user_id']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['course']."</td>";
		echo "<td>".$row['birthday']."</td>";
		echo "<td>".$row['address']."</td>";
		echo "<td>".$row['user_name']."</td>";
		echo "<td>".$row['password']."</td>";
		
		$uID = $row['user_id'];
		echo "<td><a href='edit_user.php?uID=$uID'>EDIT</a> | <a href='delete_user.php?uID=$uID' onclick='popUp()'>DELETE</a></td>";
		echo "</tr>";
		
	}
	
  ?>
  <!--PHP SCRIPT INSIDE TABLE-->
</table>
</body>
</html>