<?php 
require 'connection.php';

$names='';
$names = $_GET['names'];



$id= $_GET['id'];



$sql="DELETE FROM purchase_item where purrchase_id = $id;";

$result=mysqli_query($conn,$sql);

if($result){
	header("Location:purchase.php?names=$names");
	
}
else{
	echo "no deleted";
	
}
	

 ?>