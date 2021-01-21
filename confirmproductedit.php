<?php 

require 'connection.php';


$names='';
$names = $_GET['names'];

$id= $_GET['id'];


 
$id           = $_POST['productid'];
$productname  = $_POST['productname'];
$productdes   = $_POST['productdes'];
$catname      = $_POST['catagory'];
$warranty     = $_POST['warranty'];
$costprice    = $_POST['costprice'];
$retailprice  = $_POST['retailprice'];
$barcode      = $_POST['barcode'];
$reorderevel  = $_POST['recordlevel'];
$productdate  =  $_POST['productdate'];
$status       = $_POST['status'];

$sql= "UPDATE product SET product_id='$id', product_name='$productname', description='$productdes', catagory='$catname', warenty='$warranty', price_cost='$costprice ', price_retail='$retailprice', barcode='$barcode ', reorder_level='$reorderevel', product_date='$productdate',status='$status' WHERE product_id= $id";

$result=mysqli_query($conn,$sql);
if($result){
	header("Location:product.php?names=$names");
	
}
else{

echo "Not Edited";	
	
	
}



?>