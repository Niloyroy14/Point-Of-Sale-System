<?php 
 session_start();
require 'connection.php';




         if($_SERVER["REQUEST_METHOD"] == "POST"){
			
				$email= $_POST['email'];
                $pass= $_POST['password'];
				
			
					 $sql="SELECT * FROM admin WHERE email='$email' AND password='$pass'";
					 if($result = mysqli_query($conn , $sql)){
					 		if(mysqli_num_rows($result) > 0){
								  $_SESSION['login']=true;
					 			  header("Location:dashboard.php?names=$email");
					 		}
							
							
							
				else{
								
				
				$sql="SELECT * FROM operator WHERE email='$email' AND password='$pass' And status='Active'";
					 if($result = mysqli_query($conn, $sql)){
					 		if(mysqli_num_rows($result) > 0){
								  $_SESSION['login']=true;
					 			  header("Location:dashboard.php?names=$email");
					 		}
					 		else{
					 		 $_SESSION['error']=true;
	                         header("Location:signin.php");
					 		}
					 }
					 else{
					 	 echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
					 }
								
					 			
					 		}
					 }
					 
					 
					 
					
					
				
				
		}
	?>
