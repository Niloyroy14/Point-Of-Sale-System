<?php 
session_start();
require 'connection.php';

$names='';
$names = $_GET['names'];

$productname=$_POST['productname'];
$quantity   = $_POST['quantity'];
$total      = $_POST['total'];
$payment    = $_POST['pay'];
$paydate    = $_POST['date'];
$paystatus  = $_POST['status'];

$sql = "INSERT INTO purchase_report (product_name,quantity,total,payment,date,pay_status) VALUES('$productname','$quantity','$total','$payment ','$paydate','$paystatus')";

$result=mysqli_query($conn,$sql);

if($result){
$_SESSION['reg_message'] = "Succes";
	header("Location:purchasereport.php?names=$names");

}


?>