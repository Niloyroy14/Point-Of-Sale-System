<?php 

require 'connection.php';


$names='';
$names = $_GET['names'];


$id= $_GET['id'];


 

$id           = $_POST['id'];
$operatorname = $_POST['operatorname'];
$username     = $_POST['username'];
$email        = $_POST['email'];
$password     = $_POST['password'];
$contactno    = $_POST['contactno'];
$address      = $_POST['address'];
$status       = $_POST['status'];

$sql= "UPDATE operator SET id='$id', name='$operatorname', user_name='$username', email='$email', password='$password', contact_no='$contactno', address='$address', status='$status' WHERE 	id= $id";

$result=mysqli_query($conn,$sql);
if($result){
	header("Location:operator.php?names=$names");
	
}
else{

echo "Not Edited";	
	
	
}