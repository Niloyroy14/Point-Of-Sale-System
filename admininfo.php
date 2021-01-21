<?php
$adminemail='';
$sql=" select * from admin" ;
$result = mysqli_query($conn,$sql);
														
if($result){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
																  
																
 $adminemail = $row['email'];
}
}
}
?>