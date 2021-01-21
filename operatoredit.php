<?php

require 'connection.php';
require 'admininfo.php';





$id=$_GET['id'];

$sql="SELECT * FROM operator where id=$id;";

$result=mysqli_query($conn,$sql);

$std=mysqli_fetch_assoc($result);

 ?>
 
 <!DOCTYPE html>
	<html lang="en">
		<head> <title> operator edit page </title>
			<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
					<link rel="stylesheet" href="bootstrap/css/mystyle.css">
					<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
						</head>
			   <body>
		    				
		<?php
          $names = '';
          if($_SERVER["REQUEST_METHOD"] == "GET"){
               $names = $_GET['names'];
          }
		  
		  ?>
						
            <div class="row">    
              <div class ="navbar">
		
                  <nav class="menu">
                      <ul class="nav justify-content-end">
					     <?php
						       if( $names == $adminemail ){
						 ?>
                          <li class="menu_point"><a href="dashboard.php?names=<?php echo $names;?>">Home</a></li>
                          <li class="menu_point"><a href="operator.php?names=<?php echo $names;?>">Operator</a></li>
                          <li class="menu_point"><a href="product.php?names=<?php echo $names;?>">Product</a></li>
                          <li class="menu_point"><a href="purchase.php?names=<?php echo $names;?>">Purchase</a></li>
                          <li class="menu_point"><a href="sales.php?names=<?php echo $names;?>">Sale</a></li>
						  <li class="menu_point"><a href="purchasereport.php?names=<?php echo $names;?>">Purchase Report</a></li>
						  <li class="menu_point"><a href="salesreport.php?names=<?php echo $names;?>">Sales Report</a></li>
                          <li class="menu_point"><a href="signout.php?names=<?php echo $names;?>"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
							   <?php 
							   }
							   
							   else{
							  
							   ?>
							   
						  <li class="menu_point"><a href="dashboard.php?names=<?php echo $names;?>">Home</a></li>
                          <li class="menu_point"><a href="purchase.php?names=<?php echo $names;?>">Purchase</a></li>
                          <li class="menu_point"><a href="sales.php?names=<?php echo $names;?>">Sale</a></li>
						  <li class="menu_point"><a href="purchasereport.php?names=<?php echo $names;?>">Purchase Report</a></li>
						  <li class="menu_point"><a href="salesreport.php?names=<?php echo $names;?>">Sales Report</a></li>
                          <li class="menu_point"><a href="signout.php?names=<?php echo $names;?>"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
						  
						  <?php
							   }
						  
						  ?>
                      </ul>
                  </nav>
       </div>
        </div>
                            
 
 
					
					            <div class="container">
								
								<div class="row">
								
									<div class="col-md-12">
									  
										<form action="confirmoperatoredit.php?names=<?php echo $names;?>" method="POST">
											<div>
				                              <div class="producttitle">
											  <h3 align="center"> Operator Edit </h3></br>
											  </div>
											  <div class="row">
											  
											    
												<div class="col-md-3">
											
												<div class="form-group" align="left">
													<label>Operator Id</label>
													<input type="number" class="form-control" name="id" placeholder="Operator Id"  value="<?php echo $std['id']?>" required>
												</div>
											    </div>
												
											    <div class="col-md-3">
											
												<div class="form-group" align="left">
													<label>Operator Name</label>
													<input type="text" class="form-control" name="operatorname" placeholder="Operator Name"  value="<?php echo $std['name']?>" required>
												</div>
											    </div>
												
											  	<div class="col-md-3">
											
												<div class="form-group" align="left">
													<label>User Name</label>
													<input type="text" class="form-control" name="username" placeholder="User Name"  value="<?php echo $std['user_name']?>" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Email</label>
													<input type="email" class="form-control" name="email" placeholder="Email"  value="<?php echo $std['email']?>" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Password</label>
													<input type="password" class="form-control" name="password" placeholder="Password"  value="<?php echo $std['password']?>" required>
												</div>
											    </div>
												
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Contact No</label>
													<input type="text" class="form-control" name="contactno" placeholder="Contact No"  value="<?php echo $std['contact_no']?>" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Address</label>
													<input type="text" class="form-control" name="address" placeholder="Address"  value="<?php echo $std['address']?>" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Status</label>
														<select class="form-control" name="status"  value="">
															<option><?php echo $std['status']?></option>
															<option>Active</option>
															<option>DeActive</option>
														</select>
												</div>
											    </div>
												
												
												</div>	
												<div class="row">
												<div class="col-md-12">
												
												<div align="center">
                                                <div class="productbutton">												
														<button type="submit" class="btn btn-info" id="save" onclick="">Add</button>
														<button type="submit" class="btn btn-warning" id="reset" onclick="">Reset</button>
												</div>
												</div>
												</div>
												
												</div>
												
												</form>
												
											</div>
										
										</div>
										
										</div>
										</div>
										
										</body>
								</html>