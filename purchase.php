
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
		<head> <title> Purchase page </title>
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
								
									<div class="col-md-8">
									   <div class="mainsec">
										<form action="" method="POST">
										
										   <div class="producttitle">
											  <h3 align="center"> Purchase </h3></br>
											  </div>
										
									
										  <table class="table table-bordered">
										  <thead>
										  <tr>
                                             <th>Product Code </th> 
											 <th>Product Name </th> 
											 <th>Price </th> 
											 <th> Quantity </th> 
											 <th>Amount</th> 
											 <th>Option </th> 
										  </tr>
										  </thead>
										  
										   <?php
										  $productcode=''; $productname='';  $price =''; $quantity=''; $total=''; $barcode=''; $quan='';
                                          if(isset($_POST['productcode']) && ($_POST['quantity'])){
                                                $productcode = $_POST['productcode'];
                                                 $quantity   = $_POST['quantity'];
											
                                             $sql="SELECT * FROM product WHERE barcode='$productcode' And status='Active';"; 
                                             $result=mysqli_query($conn,$sql);
                                              $row=mysqli_fetch_assoc($result);
											  
											  $id           = $row['product_id'];
											  $productdes   = $row['description'];
											  $catname      = $row['catagory'];
                                             $warranty     = $row['warenty'];
                                            $costprice    = $row['price_cost'];
                                             $retailprice  = $row['price_retail'];
											 $reorderevel  = $row['reorder_level'];
                                            $productdate  =  $row['product_date'];
                                             $status       = $row['status'];
											 $quan       =   $row['quantity'];
											
											 
											  
                                              $productname = $row['product_name'];
                                               $price       = $row['price_retail'];
                                                $barcode     = $row['barcode'];     
                                                $total = $quantity *  $price ;
									
	
                                                 }
												 
										
												 
												
										  
										  ?>
										  
										  
										  
										  
										  <tbody>
										  <tr>
										 
										  <td cellspacing="1"> <input type="text" class="form-control" name="productcode" id="productcode" value="<?php echo $barcode ;?>"  placeholder="Product Code" required>
										   <button type="submit" class="btn btn-info" id="save" onclick="">Search</button>
										  </td>
										 
										  <td> <input type="text" class="form-control" name="productname" id="productname" value="<?php echo $productname;?>"  placeholder="Product Name"  disabled > </td>
										 
										
										  
										  <td> <input type="text" class="form-control" name="price" id="price"  value="<?php echo  $price ; ?>" placeholder="Price"  disabled >  </td>
										
										  <td> <input type="number" class="form-control" name="quantity"   placeholder=" Quantity" min="1" value="<?php echo  $quantity ; ?>" required> </td>
										  
										  
										 
										  <td> <input type="text" class="form-control" name="amount" id="amount" value="<?php echo $total ; ?>" placeholder="Amount" disabled > </td>
										 
										  
										  
										  <td> 
										 
										 <input type="submit" value="Add" class="btn btn-info"   name="action" id="save"  onclick="">
										  </td>
										
										 
										 </tr>
										  </tbody>
										  </table>
										  
										<?php 
										       
										
										          
										
										             if(isset($_POST['action'])){
													 $productcode = $_POST['productcode'];
													 $sql = " select * from purchase_item where product_code = $productcode";
														 $result = mysqli_query($conn,$sql);

                                                       $rowcount=mysqli_num_rows($result);
														
														
													 if($result){
														 
															
													  $qu = $quan + $quantity;
													 echo $qu;
													 
													 $sql5 = "INSERT INTO purchase_item (product_code,product_name,price,quantity,amount) VALUES('$productcode',' $productname','  $price ','$quantity',' $total')";
											         $sql6= "UPDATE product SET product_id='$id', product_name='$productname', description='$productdes', catagory='$catname ', warenty='$warranty', price_cost='$costprice ', price_retail='$retailprice', barcode='$barcode ', reorder_level='$reorderevel',	quantity='$qu', product_date='$productdate',status='$status' WHERE product_id= $id";
                                                    mysqli_query($conn,$sql5); 
													 mysqli_query($conn,$sql6);  
														 
														}
														
														else{	
														
										              $sql2 = "INSERT INTO purchase_item (product_code,product_name,price,quantity,amount) VALUES('$productcode',' $productname','  $price ','$quantity',' $total')";
											         $sql3= "UPDATE product SET product_id='$id', product_name='$productname', description='$productdes', catagory='$catname ', warenty='$warranty', price_cost='$costprice ', price_retail='$retailprice', barcode='$barcode ', reorder_level='$reorderevel',	quantity=' $quantity', product_date='$productdate',status='$status' WHERE product_id= $id";
                                                      mysqli_query($conn,$sql2); 
													 mysqli_query($conn,$sql3); 
													  
															
														}
													 
														
												 }
										
										
										?>
										
										
										
										 
										
										 
										 
										  
										  
								  <table class="table table-bordered">
									   <thead>
										  <tr>
											<th>Product Code </th> 
											 <th>Product Name </th> 
											 <th>Price </th> 
											 <th> Quantity </th> 
											 <th>Amount</th>
											 <th>Remove</th>
										 </tr> 
									 </thead>
									 
									  <?php
										   $proname ='';  $quan =''; $purchaseid=''; $amount='';
										 $sql=" select * from purchase_item order by (purrchase_id)" ;
										  $result=mysqli_query($conn,$sql);
														
														if($result){
															if(mysqli_num_rows($result) > 0){
                                                              while($row = mysqli_fetch_array($result)){
																  
																 $purchaseid    = $row['purrchase_id'];
																 $productcode   = $row['product_code'];
																  $proname      = $row['product_name'];
																  $price        = $row['price'];
                                                                   $quan        = $row['quantity'];
																  $amount       = $row['amount'];
																  				
										 ?>
									
									<tbody>
									 <tr>
									 
									  <td><?php echo   $productcode; ?>  </td>
									  <td><?php echo   $proname; ?>   </td>
									  <td><?php echo   $price ; ?>   </td>
									  <td><?php echo   $quan ; ?>  </td>
									  <td><?php echo   $amount; ?> </td>
									  <td><a class ="btn btn-danger"  onclick="return confirm('Are You Sure?')" href="purchasedelete.php?id=<?php echo $row['purrchase_id'];?> & names=<?php echo $names;?> "> Delete</a></td>
																
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
													}
													
													?>
									
									
											
								</table>
										
											
									</form>
									   </div>
									  </div>
											


								
											
											
							<div class="col-md-4">
							 <div class="mainsec">
										<form action="confirmpurchasereport.php?names=<?php echo $names;?>" method="POST">
										    <div class="form-group" align="left">
												<label>Product Name</label>
												<input type="text" class="form-control" name="productname" value="<?php echo  $productname  ; ?>" placeholder="Product Name" >
											</div>
											<div class="form-group" align="left">
												<label>Quantity</label>
												<input type="text" class="form-control" name="quantity" value="<?php echo   $quantity; ?>" placeholder="Quantiy" >
											</div>
											
											
											<div class="form-group" align="left">
												<label>Total Amount</label>
												<input type="text" class="form-control" name="total" value="<?php echo   $total ; ?>" placeholder="Total"   >
											</div>
											
											<div class="form-group" align="left">
													<label>Payment</label>
													<input type="text" class="form-control" name="pay" placeholder="Pay" required>
											</div>
											
											<div class="form-group" align="left">
													<label>Date</label>
													<input type="date" class="form-control" name="date" placeholder="Date" required>
											</div>
											
													<div class="form-group" align="left">
														<label>Payment Status</label>
														<select class="form-control" name="status">
															<option>Please Select</option>
															<option>Cash</option>
															<option>Card</option>
														</select>
													</div>
													<div align="right">
														<button type="submit" class="btn btn-info" id="save" onclick="">Add</button>
														<button type="submit" class="btn btn-warning" id="reset" onclick="">Reset</button>
													</div>
												</form>
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
								<?php unset($_SESSION['reg_message' ]);?>