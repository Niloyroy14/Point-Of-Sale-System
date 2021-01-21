<?php 
session_start();

?>

<!DOCTYPE html>
	<html lang="en">
		<head> <title> Sign In </title>
			<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
					<link rel="stylesheet" href="bootstrap/css/mystyle.css">
					<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
						</head>
						<body>
         <div class="row">    
              <div class ="navbar">
		
                  <nav class="menu">
                      <ul class="nav justify-content-end">
                          <li class="menu_point"><a href="">Home</a></li>
                          <li class="menu_point"><a href="">Operator</a></li>
                          <li class="menu_point"><a href="">Product</a></li>
                          <li class="menu_point"><a href="">Purchase</a></li>
                          <li class="menu_point"><a href="">Sale</a></li>
						  <li class="menu_point"><a href="">Purchase Report</a></li>
						  <li class="menu_point"><a href="">Sales Report</a></li>
                          <li class="menu_point"><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                      </ul>
                  </nav>
       </div>
       </div>
	   
	   
	   
					            <div class="container">
								
								<div class="row">
								
									<div class="col-md-12">
									  
									
											
				                     <div class="producttitle">
										<h3 align="center"> Sign In </h3></br>
									 </div>
       <div class="row">
											  
											    
												
 
   <div class="col-md-2"> 
   <?php 
       if(isset($_SESSION['error'])){
	  ?>
	  
	  <div class="alert alert-warning"> 
	   <strong>Warning!</strong> 
	   wrong email and password 
	   
	  
	  </div>
	   <?php } ?>
	   
       </div>     


 <div class="col-md-10"> 	  
 <form  action="confirmsignin.php" method="POST">
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="text" class="form-control" name="email" placeholder="Email">
    
  </div>
  
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="text" class="form-control" name="password" placeholder="Password">
    
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
		
</div>	
</div>	

</div>
</div>
</div>	 
 
 <?php  

unset($_SESSION['error']);

?>