<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
    <style>
            #inse{
                margin-left: 250px;
                margin-top: -30px;
            }
        </style>
<div id="inse">
<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Orders
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Orders
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Customer Email: </th>
                                <th> Product Name: </th>
                                <th> Product Qty: </th>
                                <th> Product Size: </th>
                                <th> Order Date: </th>
                                <th> Total Amount: </th>
                                <th> Delete: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->


                        <!-- <tr>
                                <td> <?php echo "1"; ?> </td>
                                <td> <?php echo "sonchaeng17@yahoo.com"?> </td>
                                <td> <?php echo "Sasuke Hoodie"; ?> </td>
                                <td> <?php echo "2"; ?></td>
                                <td> <?php echo "Large"; ?> </td>
                                <td> <?php echo "2020-07-19"; ?> </td>
                                <td> <?php echo "2000"; ?> </td>
                                <td> 
                                        <a><i class="fa fa-trash-o"></i> Delete</a>
                                </td>
                            </tr>

                            <tr>
                                <td> <?php echo "2"; ?> </td>
                                <td> <?php echo "jaebeom12@yahoo.com"?> </td>
                                <td> <?php echo "One Piece Mask"; ?> </td>
                                <td> <?php echo "4"; ?></td>
                                <td> <?php echo "Medium"; ?> </td>
                                <td> <?php echo "2020-07-20"; ?> </td>
                                <td> <?php echo "1000"; ?> </td>
                                <td> 
                                        <a><i class="fa fa-trash-o"></i> Delete</a>
                                </td>
                            </tr>  -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_orders = "select * from customer_orders";
                                
                                $run_orders = mysqli_query($conn,$get_orders);
          
                                while($row_order=mysqli_fetch_array($run_orders)){
                                    
                                    $order_id = $row_order['order_id'];
                                    
                                    $c_id = $row_order['customer_id'];
                                    
                                    $product_id = $row_order['product_id'];
                                    
                                    $qty = $row_order['qty'];
                                    
                                    $size = $row_order['size'];
                                    
                                    $get_products = "select * from products where product_id='$product_id'";
                                    
                                    $run_products = mysqli_query($conn,$get_products);
                                    
                                    $row_products = mysqli_fetch_array($run_products);
                                    
                                    $product_title = $row_products['product_title'];
                                    
                                    $get_customer = "select * from customers where customer_id='$c_id'";
                                    
                                    $run_customer = mysqli_query($conn,$get_customer);
                                    
                                    $row_customer = mysqli_fetch_array($run_customer);
                                    
                                    $customer_email = $row_customer['customer_email'];
                                    
                                    $get_c_order = "select * from customer_orders where order_id='$order_id'";
                                    
                                    $run_c_order = mysqli_query($conn,$get_c_order);
                                    
                                    $row_c_order = mysqli_fetch_array($run_c_order);
                                    
                                    $order_date = $row_c_order['order_date'];
                                    
                                    $order_amount = $row_c_order['amount'];
                                    
                                    $i++;
                            
                            ?>

                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $customer_email; ?> </td>
                                <td> <?php echo $product_title; ?> </td>
                                <td> <?php echo $qty; ?></td>
                                <td> <?php echo $size; ?> </td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> <?php echo $order_amount; ?> </td>
                                <td> 
                                     
                                     <a href="index.php?delete_order=<?php echo $order_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
                                </div>
<?php } ?>