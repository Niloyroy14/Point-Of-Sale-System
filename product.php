
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
		<head> <title> product page </title>
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
									  
										<form action="confirmproduct.php?names=<?php echo $names;?>" method="POST">
											<div>
				                              <div class="producttitle">
											  <h3 align="center"> Product </h3></br>
											  </div>
											  <div class="row">
											  
											   
												
											  	<div class="col-md-3">
											
												<div class="form-group" align="left">
													<label>Product Name</label>
													<input type="text" class="form-control" name="productname" placeholder="Product Name" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Product Description</label>
													<input type="text" class="form-control" name="productdes" placeholder="Product Description" required>
												</div>
											    </div>
									
												
												<div class="col-md-3">
												<div class="form-group" align="left">
														<label>Catagory</label>
														<input type="text" class="form-control" name="catagory" placeholder="Catagory" required>
													</div>
												</div>
											
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Warranty</label>
													<input type="text" class="form-control" name="warranty" placeholder="Warranty" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Cost Price</label>
													<input type="text" class="form-control" name="costprice" placeholder="Cost Price" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Selling Price</label>
													<input type="text" class="form-control" name="retailprice" placeholder="Retail Price" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Product Code</label>
													<input type="text" class="form-control" name="barcode" placeholder="Product Code" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Reorder Level</label>
													<input type="text" class="form-control" name="recordlevel" placeholder="Reorder Level" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Product Date</label>
													<input type="date" class="form-control" name="productdate" placeholder="Product Date" required>
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
										
										
									<div class="col-md-8">
									 <div class="panel-body">
												
									<?php 
								
								if(isset($_POST['search'])){
									$searchkey = $_POST['search'];
									$sql=" select * from product where product_name like'%$searchkey%' ";
									
								}
								else{
									$sql=" select * from product order by(product_id)" ;
									$searchkey="";
								}
								
								$result = mysqli_query($conn,$sql);
								?>
												
												
								
                                          <form action="" method="POST">
										         <div class="row">
	                                           <div class="col-md-6">
											       
		                                            <input style=""type="text" name="search"  placeholder="Search By Product" value="<?php echo $searchkey;?>">
		                                         </div>
												      
		                                                     <div class="col-md-6">
															   <div  class="search">
			                                                    <button class="btn btn-success bts" > Search </button>
																
		                                                            </div>
																	
																	</div>
																	</div>
	                                                            </form>
													<table class="table">
														<tr>
															<thead style="background-color: black" >
																<tr style="color: white">
																	<td scope="col">Product Name</td>
																	<td scope="col">Product Description</td>
																	<td scope="col">Catagory</td>
																	<td scope="col">Warranty</td>
																	<td scope="col">Cost Price</td>
																	<td scope="col">selling Price</td>
																	<td scope="col">Product Code</td>
																	<td scope="col">Reorder Level</td>
																	<td scope="col">Quantity</td>
																	<td scope="col"> Date</td>
																	<td scope="col">Status</td>
																	<td scope="col">Edit</td>
																	<td scope="col">Delete</td>
																	<!-- <td scope="col">Fileupload</td> -->
																</tr>
															</thead>
														</tr>
														<?php $id=''; $productname=''; $productdes=''; $catagory=''; $brand=''; $warrenty=''; $costprice=''; $retailprice=''; $barcode=''; $productdate=''; $reorderlev=''; $quantity='';$status=''; 
														$sql=" select * from product order by(product_id)" ;
														
														if($result){
															if(mysqli_num_rows($result) > 0){
                                                              while($row = mysqli_fetch_array($result)){
																  
																  $id           = $row['product_id'];
																  $productname  = $row['product_name'];
																  $productdes   = $row['description'];
                                                                  $catagory     = $row['catagory'];
																  $warrenty     = $row['warenty'];
																  $costprice    = $row['price_cost'];
																  $retailprice  = $row['price_retail'];
																  $barcode      = $row['barcode'];
																  $reorderlev   = $row['reorder_level'];
																  $quantity     = $row['quantity'];
																  $productdate  = $row['product_date'];
                                                                  $status       = $row['status'];
																  
                                                          ?>
														<tbody>
															<tr>
															    <td>
																	<?php echo   $productname; ?>  </td>
																	
																<td>
																	<?php echo   $productdes ; ?>  </td>
																	
																<td>
																	<?php echo   $catagory; ?>  </td>
																
																
																<td>
																	<?php echo   $warrenty; ?>  </td>
																	
																<td>
																	<?php echo   $costprice; ?>  </td>
																	
																<td>
																	<?php echo   $retailprice; ?>  </td>
																
																<td>
																    <?php echo   $barcode; ?>  </td>
																	
																<td>
																	<?php echo $reorderlev; ?>  </td>
																<td>
																	<?php echo  $quantity; ?>  </td>
																	
																<td>
																	<?php echo $productdate; ?>  </td>
																<td>
																	<?php echo $status; ?>  </td>
																<td>
																	<a class="btn btn-warning" href="productedit.php?id= <?php echo $row['product_id'];?> & names=<?php echo $names;?>">Edit</a>
																</td>
																<td>
																	<a class ="btn btn-danger"  onclick="return confirm('Are You Sure?')" href="productdelete.php?id= <?php echo $row['product_id'];?> & names=<?php echo $names;?>"> Delete</a>
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