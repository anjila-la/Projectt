<?php    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?> 
<div class="row" id="ro"><!-- row begin -->
    <div class="col-lg-12"><!-- col begin -->
        <h1 class="page-header"> Dashboard </h1>
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                <i class="fa fa-dashboard"></i> Dashboard
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col finish -->
</div><!-- row finish -->

<div class="row" id="roww"><!-- row begin -->
   <div class="col-lg-4 col-md-6"><!-- col begin -->
        <div class="panel panel-primary"><!-- panel-->
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel row begin -->
                    <div class="col-xs-3"><!-- col begin -->
                       <i class="fa fa-tasks fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                    <div class="huge"> <?php echo $count_products; ?> </div>
                           
                        <div> Products </div>
                        
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
            <a href="index.php?view_products"><!-- a href begin -->
                <div class="panel-footer"><!-- panel-footer begin -->
                   
                    <span class="pull-left"><!-- pull-left begin -->
                        View Details 
                    </span><!-- pull-left finish -->
                    
                    <span class="pull-right"><!-- pull-right begin --> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span><!-- pull-right finish --> 
                    
                    <div class="clearfix"></div>
                    
                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->
            
        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
   
    <div class="col-lg-4 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-green"><!-- panel panel-green begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                        <i class="fa fa-users fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"> <?php echo $count_customers; ?> </div>
                           
                        <div> Customers </div>
                        
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
            <a href="index.php?view_customers"><!-- a href begin -->
                <div class="panel-footer"><!-- panel-footer begin -->
                   
                    <span class="pull-left"><!-- pull-left begin -->
                        View Details 
                    </span><!-- pull-left finish -->
                    
                    <span class="pull-right"><!-- pull-right begin --> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span><!-- pull-right finish --> 
                    
                    <div class="clearfix"></div>
                    
                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->
            
        </div><!-- panel panel-green finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
            
            
   
    <div class="col-lg-4 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-orange"><!-- panel panel-orange begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                        <i class="fa fa-shopping-cart fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                     <div class="huge"> <?php echo $count_customer_orders; ?> </div> 
                    <!-- <div class="huge"> <?php echo "4" ?> </div> -->
                        <div> Orders </div>
                        
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
            <a href="index.php?view_orders"><!-- a href begin -->
                <div class="panel-footer"><!-- panel-footer begin -->
                   
                    <span class="pull-left"><!-- pull-left begin -->
                        View Details 
                    </span><!-- pull-left finish -->
                    
                    <span class="pull-right"><!-- pull-right begin --> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span><!-- pull-right finish --> 
                    
                    <div class="clearfix"></div>
                    
                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->
            
        </div><!-- panel panel-orange finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
    
</div><!-- row no: 2 finish -->

<div class="row" id="rowww"><!-- row no: 3 begin -->
    <div class="col-lg-8"><!-- col-lg-8 begin -->
        <div class="panel panel-primary"><!-- panel panel-primary begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    
                    <i class="fa fa-money fa-fw"></i> New Orders
                    
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- table table-hover table-striped table-bordered begin -->
                        
                        <thead><!-- thead begin -->
                          
                            <tr><!-- th begin -->
                           
                                <th> Order no: </th>
                                <th> Customer Email: </th>
                                <th> Product ID: </th>
                                <th> Product Qty: </th>
                                <th> Product Size: </th>
                            
                            </tr><!-- th finish -->
                            
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                           
                        <?php 
                          
                          $i=0;
    
                          $get_order = "select * from customer_orders order by 1 DESC LIMIT 0,3";
    
                          $run_order = mysqli_query($conn,$get_order);
    
                          while($row_order=mysqli_fetch_array($run_order)){
                              
                              $order_id = $row_order['order_id'];
                              
                              $c_id = $row_order['customer_id'];

                              $product_id = $row_order['product_id'];
                              
                              $qty = $row_order['qty'];
                              
                              $size = $row_order['size'];
                              
                              $i++;
                      
                      ?>
                                            <!-- <tr>
                                <td> <?php echo "1"; ?> </td>
                                <td> <?php echo "sonchaeng17@yahoo.com"?> </td>
                                <td> <?php echo "1"; ?> </td>
                                <td> <?php echo "2"; ?></td>
                                <td> <?php echo "Large"; ?> </td>
                            </tr>

                            <tr>
                                <td> <?php echo "2"; ?> </td>
                                <td> <?php echo "jaebeom12@yahoo.com"?> </td>
                                <td> <?php echo "5"; ?> </td>
                                <td> <?php echo "4"; ?></td>
                                <td> <?php echo "Medium"; ?> </td>
                            </tr>  -->
                     
                      <tr><!-- tr begin -->
                         
                          <td> <?php echo $i; ?> </td>
                          <td>
                              
                              <?php 
                              
                                  $get_customer = "select * from customers where customer_id='$c_id'";
                              
                                  $run_customer = mysqli_query($conn,$get_customer);
                              
                                  $row_customer = mysqli_fetch_array($run_customer);
                              
                                  $customer_email = $row_customer['customer_email'];
                              
                                  echo $customer_email;
                              
                              ?>
                              
                          </td>
                          <td> <?php echo $product_id; ?> </td>
                          <td> <?php echo $qty; ?> </td>
                          <td> <?php echo $size; ?> </td>
                          
                      </tr><!-- tr finish -->

                      
                      <?php } ?>
                      
                  </tbody><!-- tbody finish -->
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
                
                <div class="text-right"><!-- text-right begin -->
                    
                    <a href="index.php?view_orders"><!-- a href begin -->
                        
                        View All Orders <i class="fa fa-arrow-circle-right"></i>
                        
                    </a><!-- a href finish -->
                    
                </div><!-- text-right finish -->
                
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-8 finish -->
    
</div><!-- row no: 3 finish -->
<?php } ?>