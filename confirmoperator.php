<?php 
session_start();
require 'connection.php';

$names='';
$names = $_GET['names'];



$operatorname = $_POST['operatorname'];
$username     = $_POST['username'];
$email        = $_POST['email'];
$password     = $_POST['password'];
$contactno    = $_POST['contactno'];
$address      = $_POST['address'];
$status       = $_POST['status'];



$sql1="SELECT * FROM  operator  WHERE email = '$email'";

$result=mysqli_query($conn,$sql1);

 $rowcount=mysqli_num_rows($result);
 
 if($rowcount==1){
	 
	 $_SESSION['reg_message'] = "Acount Already Exit !!";
	header("Location:operator.php?names=$names");
 }





else{
	
$sql = "INSERT INTO operator (name,user_name,email,password,contact_no,address,status) VALUES('$operatorname','$username','$email','$password','$contactno','$address','$status')";

$result=mysqli_query($conn,$sql);

if($result){
$_SESSION['reg_message'] = "Succes";
	header("Location:operator.php?names=$names");

}

}


?>