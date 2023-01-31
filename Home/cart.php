<?php 
    include("fetch.php");
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Cart</title>
        <?php include('./partials/header.php')?>
        <style>
            #a{
                margin-left: 800px;
                margin-top: -46px;
            }
            #b{
                margin-left: 200px;
            }
        </style>
        
    </head>
    <body>
    <?php include("../fetch.php");
 ?>

<nav class="navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
            <div class="container">
                <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="page.php">
                    <img src="image/logo.png" alt="icon" height="60">
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-lg-1" id="navMenu">
                    <ul class="navbar-nav mx-auto text-center">
                        <li class="nav-item px-2 py-2">
                            <a class="nav-link text-uppercase text-dark" href="page.php">Home</a>
                        </li>
                        
                        <li class="nav-item px-2 py-2">
                            <a class="nav-link text-uppercase text-dark" href="apparel.php">Apparels</a>
                        </li>
                        <li class="nav-item active px-2 py-2">
                            <a class="nav-link text-uppercase text-dark" href="accessories.php">Accessories</a>
                        </li>
                        <li class="nav-item px-2 py-2">
                            <a class="nav-link text-uppercase text-dark" href="aboutus.php">About us</a>
                          </li>
                        
                    </ul>
                    
                    <form action="search.php" method="get">
                        <input type="text" placeholder="Search here..." aria-label="Search" name="str" class="border-none">
                        <button type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                    <div class="order-lg-2 nav-btns" >
                        
                        
                        
                        <?php 
                        
                        $ip_add = getRealIpUser();
                        
                        $select_cart = "select * from cart where ip_add='$ip_add'";
                        
                        $run_cart = mysqli_query($conn,$select_cart);
                        
                        $count = mysqli_num_rows($run_cart);
                        
                        ?>


                        <a href="cart.php" class="text-decoration-none">
                            <button type="button" class="btn position-relative ">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge bg-primary"><?php echo $count; ?></span>
                            </button>
                        </a>
        
                        <a href="profile.php" class="text-decoration-none">
                            <button type="button" class="btn position-relative ">
                                <i class="fa fa-id-card">Profile</i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

    <div id="content"><!-- #content Begin -->
        <div class="container" id="cartcont"><!-- container Begin -->
            
            <div id="cart" class="col-md-12"><!-- col-md-9 Begin -->
                
                <div class="box " ><!-- box Begin -->
                    
                    <form action="cart.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                        
                        <h1 class="text-center bg-dark text-white ">Shopping Cart</h1>
                        
                        <?php 
                        
                        $ip_add = getRealIpUser();
                        
                        $select_cart = "select * from cart where ip_add='$ip_add'";
                        
                        $run_cart = mysqli_query($conn,$select_cart);
                        
                        $count = mysqli_num_rows($run_cart);
                        
                        ?>
                        <br />
                        <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your cart</p>
                        
                        <div class="table-responsive"><!-- table-responsive Begin -->
                            
                            <table class="table border='1'"><!-- table Begin -->
                                
                                <thead><!-- thead Begin -->
                                    
                                    <tr><!-- tr Begin -->
                                        
                                        <th class="text-center">Product</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">Size</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Sub-Total</th>
                                        
                                    </tr><!-- tr Finish -->
                                    
                                </thead><!-- thead Finish -->
                                
                                <tbody><!-- tbody Begin -->
                                    
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
                                            
                                    ?>
                                    
                                    <tr><!-- tr Begin -->
                                        
                                        <td class="text-center">
                                            
                                            <img class="img-responsive" src="../admin/product_images/<?php echo $product_img; ?>" alt="Product">
                                            
                                        </td>
                                        
                                        <td class="text-center">
                                            
                                            <a href="details.php?pro_id=<?php echo $pro_id; ?>" class="text-decoration-none"> <?php echo $product_title; ?> </a>
                                            
                                        </td>
                                        
                                        <td class="text-center">
                                            
                                            <?php echo $pro_qty; ?>
                                            
                                        </td>
                                        
                                        <td class="text-center">
                                            
                                            <?php echo $only_price; ?>
                                            
                                        </td>
                                        
                                        <td class="text-center">
                                            
                                            <?php echo $pro_size; ?>
                                            
                                        </td>
                                        
                                        <td class="text-center">
                                            
                                            <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                                            
                                        </td>
                                        
                                        <td class="text-center">
                                            
                                            Rs.<?php echo $sub_total; ?>
                                            
                                        </td>
                                        
                                    </tr><!-- tr Finish -->
                                    
                                    <?php } } ?>
                                    
                                </tbody><!-- tbody Finish -->
                                
                                <tfoot><!-- tfoot Begin -->
                                    
                                    <tr><!-- tr Begin -->
                                        <th colspan="5"></th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Rs.<?php echo $total; ?></th>
                                        
                                    </tr><!-- tr Finish -->
                                    
                                </tfoot><!-- tfoot Finish -->
                                
                                
                            </table><!-- table Finish -->
                            
                        </div><!-- table-responsive Finish -->
                         
                        <br />
                        <br />
        
                        <button type="submit" name="update" value="Update Cart" class="btn btn-default text-white"  id="updatecart"><!-- btn btn-default Begin -->
                                
                                Update cart
                                
                        </button><!-- btn btn-default Finish -->
                        
                        <br />
                        <br />
                        <div class="box-footer"><!-- box-footer Begin -->
                            
                            <div class="pull-left" id="b"><!-- pull-left Begin -->
                                
                                <a href="apparel.php" class="text-decoration-none"><!-- btn btn-default Begin -->
                                    
                                <i class="fa fa-chevron-left"></i>   Continue Shopping 
                                    
                                </a><!-- btn btn-default Finish -->
                                
                            </div><!-- pull-left Finish -->

                            <br />
                            <div class="pull-right " id="a"><!-- pull-right Begin -->
                                
                                <a href="checkout.php" class="text-decoration-none">
                                    
                                    Checkout <i class="fa fa-chevron-right"></i>
                                    
                                </a>
                                
                            </div><!-- pull-right Finish -->
                            
                        </div><!-- box-footer Finish -->
                        
                    </form><!-- form Finish -->
                    
                </div><!-- box Finish -->
                
                <?php 
                
                    function update_cart(){
                        
                        global $conn;
                        
                        if(isset($_POST['update'])){
                            
                            foreach($_POST['remove'] as $remove_id){
                                
                                $delete_product = "delete from cart where p_id='$remove_id'";
                                
                                $run_delete = mysqli_query($conn,$delete_product);
                                
                                if($run_delete){
                                    
                                    echo "<script>window.open('cart.php','_self')</script>";
                                    
                                }
                                
                            }
                            
                        }
                        
                    }
                
                echo @$up_cart = update_cart();
                
                ?>
                
                
            </div><!-- col-md-9 Finish -->
            
        </div><!-- container Finish -->
    </div><!-- #content Finish -->
   
   <?php 
    
    include("partials/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>