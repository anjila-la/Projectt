<?php 
    include("fetch.php");
    session_start();
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Cart</title>
        <?php include('./partials/header.php')?>
        <style>
            #subbutt{
    padding-right: 15px;
    background-color: black;
    font-size: 20px;
    padding-left: 20px;
    margin-top: -40px;
    margin-left: 170px;
}
        </style>
        
    </head>
    <body>
    <?php include('navigation.php');
        if($count==0)
        {
            echo "<script>alert('Please add items to cart')</script>";
        
            echo "<script>window.open('cart.php','_self')</script>";
        }
        ?>  

    


    <div id="content"><!-- #content Begin -->
        <div class="container" id="cartcont"><!-- container Begin -->
        <?php 
                                    
            $total = 0;
            
            while($row_cart = mysqli_fetch_array($run_cart)){
                
                $pro_id = $row_cart['p_id'];
                
                $pro_size = $row_cart['size'];
                
                $pro_qty = $row_cart['qty'];
                
                $get_products = "select * from products where product_id='$pro_id'";
                
                $run_products = mysqli_query($conn,$get_products);
                
                while($row_products = mysqli_fetch_array($run_products)){
                    
                    $product_title = $row_products['product_title'];
                    
                    $product_img = $row_products['product_img'];
                    
                    $only_price = $row_products['product_price'];
                    
                    $sub_total = $row_products['product_price']*$pro_qty;
                    
                    $total += $sub_total;
                }
            }
                    
            ?>
            <div class="col-md-6"><!-- col-md-3 Begin -->
                
                <div id="order-summary" class="box"><!-- box Begin -->
                    
                    <div class="box-header"><!-- box-header Begin -->
                        
                        <h3>Order Summary</h3>
                        
                    </div><!-- box-header Finish -->
                    
                    <p class="text-muted"><!-- text-muted Begin -->
                        
                        Shipping and additional costs are calculated based on value you have entered
                        
                    </p><!-- text-muted Finish -->
                    
                    <div class="table-responsive"><!-- table-responsive Begin -->
                        
                        <table class="table"><!-- table Begin -->
                            
                            <tbody><!-- tbody Begin -->
                                
                                <tr><!-- tr Begin -->
                                    
                                    <td> Order All Sub-Total </td>
                                    <th> Rs.<?php echo $total; ?> </th>
                                    
                                </tr><!-- tr Finish -->
                                
                                <tr><!-- tr Begin -->
                                    
                                    <td> Shipping and Handling </td>
                                    <td> Rs.100 </td>
                                    
                                </tr><!-- tr Finish -->
                                
                                <tr><!-- tr Begin -->
                                    
                                    <td> Tax </td>
                                    <th> - </th>
                                    
                                </tr><!-- tr Finish -->
                                
                                <tr class="total"><!-- tr Begin -->
                                    
                                    <td> Total </td>
                                    <th> Rs.<?php echo $total+100; ?> </th>
                                    
                                </tr><!-- tr Finish -->
                                
                            </tbody><!-- tbody Finish -->
                            
                        </table><!-- table Finish -->
                        
                    </div><!-- table-responsive Finish -->
                    
                </div><!-- box Finish -->
                
            </div><!-- col-md-3 Finish -->
            
            <div class="box"><!-- box Begin -->
               
   
            <?php 

        $select="select * from customers";

        $run_customer = mysqli_query($conn,$select);
    
        $row_customer = mysqli_fetch_array($run_customer);
    
        $customer_id=$row_customer['customer_id'];
        

?>
<br />
<br />

            <?php add_cart(); ?>
   
            <a href="order.php?customer_id=<?php echo $customer_id ?>" id="butthover">
         
            <button id="subbutt" class="btn btn-primary text-white"> Submit the order 
            </button>
    </a>
         
    
</div><!-- box Finish -->
        </div><!-- container Finish -->
    </div><!-- #content Finish -->
   
   <?php 
    
    include("partials/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>











