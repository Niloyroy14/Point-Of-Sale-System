
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
		<head> <title> dashboard page </title>
			<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
					
					<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
					<link rel="stylesheet" href="bootstrap/css/mystyle.css">
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
							   
						  <li class="menu_point"><a href="dashboard.php?names=<?php echo $names ;?>">Home</a></li>
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
 
 
                                                   <?php
												        $totalitem=''; 
														$sql=" select * from product order by(product_id)" ;
														$result=mysqli_query($conn,$sql);
														if($result){
															if(mysqli_num_rows($result) > 0){
                                                              while($row = mysqli_fetch_array($result)){
															
                                                           $totalitem = $totalitem+1;		


															  }
															}
														}															
																
																  
                                                          ?>
 
 
 
 
 
 
                           <?php
										 $productname=''; $quantity=''; $totalamount='';  $payment =''; $due=''; $date  ='';  $status =''; $count='';
										 $sql=" select * from sales_report" ;
										  $result=mysqli_query($conn,$sql);
														
														if($result){
															if(mysqli_num_rows($result) > 0){
                                                              while($row = mysqli_fetch_array($result)){
																
																  $count    = $count + 1;
															  }
															  
															}
														}
																  				
										 ?>
 
 
                 
 
 
 

 
 
 
 
 
 
 
 
                               <div class="head">
					            <div class="container">
								
					       
								<div class="row">
								   <div class="col-md-2">
									   <div class="totalsale">
									   <p style="color:#489EE7"> <?php echo   $count  ; ?> </p>
									   <p>Tolat Sales</p>
										</div>
										</div>
										<div class="dashimage">
										<div class="col-md-2">
										<img src="bootstrap\img\totalsale.png" alt="total sale" height="120px" width="150px">
										
								</div>
								 </div>
								  </div>	
											
									
                                  <div class="row">
								   <div class="col-md-2">
									   <div class="totalsale">
									   <p style="color:red"> <?php echo  $totalitem ; ?>   </p>
									   <p>Tolal Item</p>
										</div>
										</div>
										<div class="dashimage">
										<div class="col-md-2">
										<img src="bootstrap\img\totalitem.png" alt="total sale" height="120px" width="150px">
										
								   </div>
								   </div>
								   </div>	
																				
											
											
											
											
											
								<div class="saleinfo">	
									<div class="row">		
									<div class="col-md-11">
									<div class="panel-body">
									<p style="color:#69C238;text-align:center;font-size:25px"> Sales Information </p>

                                    
											  
								  <table class="table table-bordered">
								  
									   <thead>
										  <tr>
										    <th>Product Name</th>
											<th>Quantity</th> 
											<th>Total Amount</th> 
											 <th>Payment </th> 
											 <th>Due</th> 
											 <th>Date</th> 
											 <th>Payment Status</th>
											 
											 
										 </tr> 
									 </thead>
									 
									 
									 
                                     <?php
										 $productname=''; $quantity=''; $totalamount='';  $payment =''; $due=''; $date  ='';  $status =''; $count='';
										 $sql=" select * from sales_report" ;
										  $result=mysqli_query($conn,$sql);
														
														if($result){
															if(mysqli_num_rows($result) > 0){
                                                              while($row = mysqli_fetch_array($result)){
																  $productname  = $row['product_name'];
																  $quantity     = $row['quantity'];
																  $totalamount  = $row['total'];
																  $payment      = $row['payment'];
																  $date         = $row['date'];
																  $status       = $row['pay_status'];
																  $due          = $totalamount -    $payment ;
																
																  				
										 ?>
									
									
									<tbody>
									 <tr>
									  <td><?php echo   $productname; ?>  </td>
									  <td><?php echo   $quantity; ?>  </td>
									  <td><?php echo    $totalamount; ?>  </td>
									  <td><?php echo    $payment; ?>   </td>
									  <td><?php echo    $due; ?>   </td>
									  <td><?php echo    $date; ?>  </td>
									  <td><?php echo    $status; ?> </td>
									 
																
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
								
								  </div>
								  </div>
								 
								
										
										<script src="jquery-3.5.1.slim.min.js"/>
										<script src="popper.min.js"/>
										
										<script src="bootstrap/js/bootstrap.js"/>
										<script src="bootstrap/js/bootstrap.min.js"/>
										
									</body>
								</html>
							