<?php 

session_start();

require 'connection.php' ;
require 'admininfo.php';


if(!isset($_SESSION['login'])){
    	 header("Location:signin.php");
	die();
}

					
?>

<!DOCTYPE html>
	<html lang="en">
		<head> <title> operator page </title>
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
		  else{
			    if($_SERVER["REQUEST_METHOD"] == "POST"){
			      $names = $_GET['names'];  
				}
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
									  
										<form action="confirmoperator.php?names=<?php echo $names;?>" method="POST">
											<div>
				                              <div class="producttitle">
											  <h3 align="center"> Operator </h3></br>
											  </div>
											  <div class="row">
											  
											    
												
												
											    <div class="col-md-3">
											
												<div class="form-group" align="left">
													<label>Operator Name</label>
													<input type="text" class="form-control" name="operatorname" placeholder="Operator Name" required>
												</div>
											    </div>
												
											  	<div class="col-md-3">
											
												<div class="form-group" align="left">
													<label>User Name</label>
													<input type="text" class="form-control" name="username" placeholder="User Name" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Email</label>
													<input type="email" class="form-control" name="email" placeholder="Email" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Password</label>
													<input type="password" class="form-control" name="password" placeholder="Password" required>
												</div>
											    </div>
												
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Contact No</label>
													<input type="text" class="form-control" name="contactno" placeholder="Contact No" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Address</label>
													<input type="text" class="form-control" name="address" placeholder="Address" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Status</label>
														<select class="form-control" name="status">
															<option>Please Select</option>
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
										
										<?php
									if(isset($_POST['search'])) {
		
		          
									$searchkey = $_POST['search'];
									$sql=" select * from operator where name like'%$searchkey%' ";
							        
								   
									
								}
								else{
									$sql=" select * from operator" ;
									$searchkey="";
								}
								?>
											
									<div class="col-md-8">
									 <div class="panel-body">
												
							          <form action="operator.php?names=<?php echo $names;?>" method="POST">
										         <div class="row">
	                                           <div class="col-md-6">
											       
		                                            <input type="text" name="search"  placeholder="Search By Operator Name" value="">
		                                         </div>
												      
		                                                     <div class="col-md-6">
															   <div  class="search">
			                                                    <button class="btn btn-success bts"> Search </button>
																
		                                                   </div>
																	
														</div>
													</div>
	                                       </form>
														
														
													<table class="table">
														<tr>
															<thead style="background-color: black" >
																<tr style="color: white">
																	<td scope="col">Operator Name</td>
																	<td scope="col">User Name</td>
																	<td scope="col">Email</td>
																	<td scope="col">Password</td>
																	<td scope="col">Contact No</td>
																	<td scope="col">Address</td>
																	<td scope="col">Status</td>
																	<td scope="col">Edit</td>
																	<td scope="col">Delete</td>
																	<!-- <td scope="col">Fileupload</td> -->
																</tr>
															</thead>
														</tr>
														<?php 
														
														
								
								                       $result = mysqli_query($conn,$sql);
														
														
														
														$id=''; $operatorname=''; $username=''; $email=''; $password=''; $contactno=''; $address=''; $status=''; 
														
														if($result){
															if(mysqli_num_rows($result) > 0){
                                                              while($row = mysqli_fetch_array($result)){
																  
																  $id            = $row['id'];
																  $operatorname  = $row['name'];
																  $username      = $row['user_name'];
                                                                  $email         = $row['email'];
																  $password      = $row['password'];
																  $contactno     = $row['contact_no'];
																  $address       = $row['address'];
                                                                  $status        = $row['status'];
																  
                                                          ?>
														<tbody>
															<tr>
															    <td>
																	<?php echo   $operatorname; ?>  </td>
																	
																<td>
																	<?php echo   $username; ?>  </td>
																	
																<td>
																	<?php echo   $email; ?>  </td>
																<td>
																	<?php echo   $password; ?>  </td>
																
																<td>
																	<?php echo   $contactno; ?>  </td>
																	
																<td>
																	<?php echo   $address; ?>  </td>
																	
																
																<td>
																	<?php echo  $status; ?>  </td>
																<td>
																	<a class="btn btn-warning" href="operatoredit.php?id= <?php echo $row['id'];?> & names=<?php echo $names;?>">Edit</a>
																</td>
																<td>
																	<a class ="btn btn-danger"  onclick="return confirm('Are You Sure?')" href="operatordelete.php?id= <?php echo $row['id'];?> & names=<?php echo $names;?>"> Delete</a>
																</td>
															
															</tr>
														</tbody>
														<?php }
														  }
														else
														{
															echo "No Record selected from this database" ;}
													}
													else
												    {
													echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
													}?>
											</table>
												</div>
											</div>
										
										
										
										
										
										</div>
										</div>
										
										<?php if(isset($_SESSION['reg_message' ])){?>
										<script> alert("<?php echo $_SESSION['reg_message' ];  ?>;");  </script>
										<?php } ?>
										<script src="jquery-3.5.1.slim.min.js"/>
										<script src="popper.min.js"/>
										
										<script src="bootstrap/js/bootstrap.js"/>
										<script src="bootstrap/js/bootstrap.min.js"/>
										
									</body>
								</html>
								<?php 
								unset($_SESSION['reg_message' ]);
								?>		
												