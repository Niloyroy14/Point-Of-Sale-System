
<?php 

require 'connection.php';
require 'admininfo.php';



$id= $_GET['id'];

$sql="SELECT * FROM product where product_id = $id;";

$result=mysqli_query($conn,$sql);

$std=mysqli_fetch_assoc($result);




 ?>
<!DOCTYPE html>
<html lang="en">
		<head>
		
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
									  
										<form action="confirmproductedit.php?names=<?php echo $names;?>" method="POST">
											<div>
				                              <div class="producttitle">
											  <h3 align="center"> Product Edit </h3></br>
											  </div>
											  <div class="row">
											  
											    <div class="col-md-3">
											
												<div class="form-group" align="left">
													<label>Product Id</label>
													<input type="number" class="form-control" name="productid" placeholder="" value="<?php echo $std['product_id']?>"  required>
												</div>
											    </div>
												
											  	<div class="col-md-3">
											
												<div class="form-group" align="left">
													<label>Product Name</label>
													<input type="text" class="form-control" name="productname" placeholder="" value="<?php echo $std['product_name']?>" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Product Description</label>
													<input type="text" class="form-control" name="productdes" placeholder="" value="<?php echo $std['description']?>" required>
												</div>
											    </div>
												
												
												<div class="col-md-3">
												<div class="form-group" align="left">
														<label>Catagory</label>
														<input type="text" class="form-control" name="catagory" value="<?php echo $std['catagory']?>"  required>
													</div>
												</div>
												
												
												
												
		
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Warranty</label>
													<input type="text" class="form-control" name="warranty" placeholder="" value="<?php echo $std['warenty']?>" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Cost Price</label>
													<input type="text" class="form-control" name="costprice" placeholder="" value="<?php echo $std['price_cost']?>" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Selling Price</label>
													<input type="text" class="form-control" name="retailprice" placeholder="" value="<?php echo $std['price_retail']?>" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Bar Code</label>
													<input type="text" class="form-control" name="barcode" placeholder="" value="<?php echo $std['barcode']?>" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Reorder Level</label>
													<input type="text" class="form-control" name="recordlevel" placeholder="" value="<?php echo $std['reorder_level']?>" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Product Date</label>
													<input type="date" class="form-control" name="productdate" placeholder="" value="<?php echo $std['product_date']?>" required>
												</div>
											    </div>
												
												<div class="col-md-3">
												<div class="form-group" align="left">
													<label>Status</label>
														<select class="form-control" name="status" value="" >
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
											
												