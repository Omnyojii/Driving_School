<?php 
include "function.php";

$connect = connectdb();
if(isset($_GET['uid'])){
	$id = $_GET['uid'];
	$delete = delete('course', $id);
	if($delete){
		header('Location: courses.php');
	}
}
?>