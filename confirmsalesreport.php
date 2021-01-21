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

$sql = "INSERT INTO sales_report (product_name,quantity,total,payment,date,pay_status) VALUES('$productname','$quantity','$total','$payment ','$paydate','$paystatus')";

$result=mysqli_query($conn,$sql);

 $sql1=" select * from sales_report" ;
 $result1=mysqli_query($conn,$sql1);
														
if($result1){
if(mysqli_num_rows($result1) > 0){
 while($row = mysqli_fetch_array($result1)){
  $id     = $row['sale_report_id'];
  $proname= $row['product_name'];
 }
}
}
if($result && $result1){
$_SESSION['reg_message'] = "Succes";
	header("Location:salesreceipt.php?names=$names & saleid= $id  & productname=$proname");

}


?>