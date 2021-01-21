<?php 
require 'connection.php';

$names='';
$names = $_GET['names'];

$id= $_GET['id'];



$sql="DELETE FROM  sales_item where sales_id = $id;";

$result=mysqli_query($conn,$sql);

if($result){
	header("Location:sales.php?names=$names");
	
}
else{
	echo "no deleted";
	
}
	

 ?>