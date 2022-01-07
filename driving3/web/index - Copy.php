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
//insert data to db
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$course = $_POST['course'];
	$bday = $_POST['bday'];
	$address = $_POST['address'];
	$username = $_POST['username'];
	$passwd = $_POST['password'];
	
	$sql = "INSERT INTO user(name,course,birthday,address,user_name,password)
		VALUES('$name','$course','$bday','$address','$username','$passwd')";
	
	//
	$query = mysqli_query($connect,$sql);
	
	if($query){
		echo "<script>alert('user registered successfully!');</script>";
	}
	else{
		echo "<script>alert('Oops! An error occured.');</script>";
	}
}	
?>

<!DOCTYPE html>
<html lang="en-US" 	style="height: 100%;">
<head>
	<title>Log in</title>
	<style>
		body {
		font-family: "Lato", sans-serif;
		background-color: #2f3140!important;
		}

		.main-head{
			height: 150px;
		}

		.sidenav {
			height: 100%;
			overflow-x: hidden;
			padding-top: 20px;
			background: url("https://scontent.fcgy1-1.fna.fbcdn.net/v/t1.0-9/11150622_847937831946898_8984843625289603731_n.png?_nc_cat=101&_nc_oc=AQn4Nc3xAKbOuGnVPy68w9_4fL_FCWsCkke2tbPT-En8kS8_2hsgTuN1Z_pQjrh6Hg4&_nc_ht=scontent.fcgy1-1.fna&oh=c896df348afb3217cdaf8ff8b4200e70&oe=5E5D9F07");
			background-repeat: no-repeat;
			background-size: 100% 100%;
			border-right: 5px solid;
			border-left: 5px solid;
		}


		.main {
			padding: 100px 10px;
			color: white!important;
		}

		@media screen and (max-height: 450px) {
			.sidenav {padding-top: 15px;}
		}

		@media screen and (max-width: 450px) {
			.login-form{
				margin-top: 10%;
			}

			.register-form{
				margin-top: 10%;
			}
		}

		@media screen and (min-width: 768px){
			.main{
				margin-left: 40%; 
			}

			.sidenav{
				width: 40%;
				position: fixed;
				z-index: 1;
				top: 0;
				left: 0;
			}

			.login-form{
				margin-top: 20%;
			}

			.register-form{
				margin-top: 20%;
			}
		}


		.login-main-text{
			margin-top: 20%;
			padding: 60px;
			color: #fff;
		}

		.login-main-text h2{
			font-weight: 300;
		}

		.btn-black{
			background-color: #000 !important;
			color: #fff;
		}
	
	</style>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

</head>
<body>
<form action="index.php" method="post">
	
	<div class="sidenav">
		 <div class="login-main-text">
		 </div>
	  </div>
	  <div class="main">
		 <div class="col-md-6 col-sm-12">
			<div class="login-form">
			   <form>
				  <div class="form-group">
					 <label>User Name</label>
					 <input type="text" class="form-control" placeholder="User Name">
				  </div>
				  <div class="form-group">
					 <label>Password</label>
					 <input type="password" class="form-control" placeholder="Password">
				  </div>
				  <button type="submit" class="btn btn-black">Login</button>
				  <button type="submit" class="btn btn-secondary">Register</button>
			   </form>
			</div>
		 </div>
	  </div></form>
</body>
</html>