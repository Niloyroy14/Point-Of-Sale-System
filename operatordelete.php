<?php 
require 'connection.php';

$names='';
$names = $_GET['names'];


$id= $_GET['id'];

$sql="DELETE FROM operator where id=$id;";
$result=mysqli_query($conn,$sql);
if($result){
	header("Location:operator.php?names=$names");
	
}
else{
	echo "no deleted";
	
}
	

 ?>