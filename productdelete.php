<?php 
require 'connection.php';

$names='';
$names = $_GET['names'];


$id= $_GET['id'];


$sql="DELETE FROM product where product_id = $id;";

$result=mysqli_query($conn,$sql);

if($result){
	header("Location:product.php?names=$names");
	
}
else{
	echo "no deleted";
	
}
	

 ?>