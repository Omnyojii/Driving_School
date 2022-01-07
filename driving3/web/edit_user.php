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

$uID = $_GET['uID'];

$get_users = "SELECT * FROM user WHERE user_id='$uID'";
$query = mysqli_query($connect, $get_users);
$row = mysqli_fetch_array($query);

//insert data to db
if(isset($_POST['submit'])){
	
	$user_id = $_POST['user_id'];
	$name = $_POST['name'];
	$course = $_POST['course'];
	$bday = $_POST['bday'];
	$address = $_POST['address'];
	$username = $_POST['username'];
	$passwd = $_POST['password'];
	$sql = "UPDATE user SET name = '$name',course='$course', birthday='$bday', address='$address', user_name='$username', password='$passwd' WHERE user_id='$user_id'";
	
	$update_query = mysqli_query($connect, $sql);
	
	if($update_query){
		echo "<script>alert('user edited successfully!');</script>";
		header("Location: list_users.php");
	}
	else{
		echo "<script>alert('Oops! An error occured.');</script>";
	}
	
}	
?>

<!DOCTYPE html>
<html lang="en-US" 	style="height: 100%;">
<head>
	<title>My First WebApp using PHP</title>
<form>

</form>


</head>
<body>
<a href="list_users.php">List of Users</a>
<h1>Edit Users</h1>
<hr>

<form action="edit_user.php" method="post"> <!-- '#' is same page/ self-->
	
	
	<input type="hidden" name="user_id" value="<?php echo $row['user_id'];?>"> <!--To distinguish the row-->
	
	<!--input-->
	Name:&nbsp <input type="text" name="name" value="<?php echo $row['name'];?>" required><br><br>
	
	<!--Select-->
	Course: &nbsp<select name="course">
				<option value="BSIT">BSIT</option>
				<option value="BSCS">BSCS</option>
				<option value="BSIS">BSIS</option>
				<option value="BSCpE">BSCpE</option>
			</select><br><br>
			
	<!--date-->	
	Birthday:&nbsp<input type="date" name="bday"><br><br>
	
	<!--textarea-->
	Address:&nbsp<textarea name="address" required> <?php echo $row['address'];?> </textarea><br><br>
	
	<!--email-->
	Username: &nbsp<input type="email" name="username" value="<?php echo $row['user_name'];?>" required><br><br>
	
	<!--password-->
	password: &nbsp<input type="password" name="password" value="<?php echo $row['password'];?>" required><br><br>
	
	<input type="submit" value="Submit" name="submit">
</form>
</body>
</html>