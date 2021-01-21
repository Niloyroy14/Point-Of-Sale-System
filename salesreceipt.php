
<?php
session_start();
require 'connection.php';
require 'admininfo.php';


$names='';
$names = $_GET['names'];

if(!isset($_SESSION['login'])){
    	 header("Location:signin.php");
	die();
}


?>

<!DOCTYPE html>
	<html lang="en">
		<head> <title> sales receit</title>
			<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
					<link rel="stylesheet" href="bootstrap/css/salesreceipt.css">
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
			 
			 
			 <?php
			 	   $salesid = ''; $pname=''; $price=''; 
                               if($_SERVER["REQUEST_METHOD"] == "GET"){
                                        $salesid = $_GET['saleid'];
										$proname=   $_GET['productname'];
										
                                   }
								   
								                
														$sql1=" select * from product where 	product_name='$proname';" ;
														$result1 = mysqli_query($conn,$sql1);
														
														if($result1){
															if(mysqli_num_rows($result1) > 0){
                                                              while($row = mysqli_fetch_array($result1)){
																  
																
															
																  $price  = $row['price_retail'];
								   
															  }
															}
														}
								   
								   
								   
								   
								   
								   
								   
								   
								   
								 
									  
									  
										 $productname=''; $quantity=''; $totalamount='';  $payment =''; $due=''; $date  ='';  $status ='';
										 $sql=" select * from sales_report where 	sale_report_id= $salesid" ;
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
			 
			 <div class="container">
   
       <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3   style="margin-top:40px;text-align:center; font-size:16px" >Sales Receipt</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
					   <p> Date:<?php echo   $date  ; ?></p>
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Product Name</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Item Quantity</strong></td>
									 <td class="text-center"><strong>Payment</strong></td>
									 <td class="text-center"><strong>Due</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo  $productname ; ?></td>
                                    <td class="text-center"><?php echo   $price; ?></td>
                                    <td class="text-center"><?php echo $quantity ; ?></td>
									<td class="text-center"><?php echo $payment ; ?></td>
									 <td class="text-center"><?php echo $due  ; ?></td>
                                    <td class="text-right"><?php echo    $totalamount  ; ?></td>
                                </tr>
								
								
								
								 <tr>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
									 <td class="highrow"></td>
                                    <td class="highrow"></td>
                                    <td class="highrow text-center"><strong>Total</strong></td>
                                    <td class="highrow text-right"><?php echo    $totalamount  ; ?></td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
									 <td class="emptyrow"></td>
									  <td class="emptyrow"></td>
									   <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Vat</strong></td>
                                    <td class="emptyrow text-right">0.0000</td>
                                </tr>
								 <tr>
                                    <td class="emptyrow"></td>
									 <td class="emptyrow"></td>
									  <td class="emptyrow"></td>
									   <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Payment By</strong></td>
                                    <td class="emptyrow text-right"> <?php echo    $status   ; ?>  </td>
                                </tr>
                                <tr>
                                 
                                    <td class="emptyrow"></td>
									 <td class="emptyrow"></td>
									  <td class="emptyrow"></td>
									   <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Subtotal</strong></td>
                                    <td class="emptyrow text-right"><?php echo    $totalamount  ; ?></td>
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
						
						
						<button style="margin-left:450px;" onclick="window.print()">Print</button>
            </div>
        </div>
  
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