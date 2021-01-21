<?php 
session_start();
require 'connection.php';

$names='';
$names = $_GET['names'];

$productname  = $_POST['productname'];
$productdes   = $_POST['productdes'];
$catname      = $_POST['catagory'];
$warranty     = $_POST['warranty'];
$costprice    = $_POST['costprice'];
$retailprice  = $_POST['retailprice'];
$barcode      = $_POST['barcode'];
$reorderevel  = $_POST['recordlevel'];
$productdate  = $_POST['productdate'];
$status       = $_POST['status'];



$sql1="SELECT * FROM product WHERE product_name = '$productname'";

$result=mysqli_query($conn,$sql1);

 $rowcount=mysqli_num_rows($result);
 
 if($rowcount==1){
	 
	 $_SESSION['reg_message'] = "Product Already Exit";
	header("Location:product.php?names=$names");
 }


else{

$sql = "INSERT INTO product (product_name,description,catagory,warenty,price_cost,price_retail,barcode,reorder_level,quantity,product_date,status) VALUES('$productname','$productdes ','$catname','$warranty','$costprice','$retailprice','$barcode','$reorderevel','0','$productdate','$status')";

$result=mysqli_query($conn,$sql);

if($result){
$_SESSION['reg_message'] = "Succes";
	header("Location:product.php?names=$names");

}
}


?>