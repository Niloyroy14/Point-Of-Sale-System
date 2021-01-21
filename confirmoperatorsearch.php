<?php

require 'connection.php' ;

if(isset($_POST['search'])){
		
	$names='';
$names = $_GET['names'];
									$searchkey = $_POST['search'];
									$sql=" select * from operator where name like'%$searchkey%' ";
							
								
									
								}
								else{
									$sql=" select * from operator" ;
									$searchkey="";
									$result = mysqli_query($conn,$sql);
								}

if($result){

	header("Location:operator.php?names=$names");

}									
									
									



?>