<?php include("../admin/partials/db.php");
include("fetch.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Accessories</title>
        <?php include('./partials/header.php')?>
    
    </head>
    <body>
        <!-- navigation -->
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
                        <li class="nav-item active px-2 py-2" >
                            <a class="nav-link text-uppercase text-dark" href="page.php">Home</a>
                        </li>
                        
                        <li class="nav-item px-2 py-2 active">
                            <a class="nav-link text-uppercase text-dark" href="apparel.php" >Apparels</a>
                        </li>
                        <li class="nav-item active px-2 py-2">
                            <a class="nav-link text-uppercase " href="accessories.php" id="homeact">Accessories</a>
                        </li>
                        <li class="nav-item dropdown px-2 py-2">
                            <a class="nav-link text-uppercase text-dark" href="aboutus.php">About us</a>
                          </li>
                        
                    </ul>
                    
                    <form action="search.php" method="get">
                        <input type="text" placeholder="Search here..." aria-label="Search" name="str">
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
        <!-- end of navigation -->



        <section id="navigation" class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container">
            </div>
        </section>
                


            <!-- collections -->  <!-- images 350 width, 420 length -->
        <div id="content" class="container py-5"><!-- container Begin -->
            <div class="row"><!-- row Begin -->
                
                <?php 
                    $get_products = "select * from products
                    Inner join product_categories
                    where products.p_cat_id = product_categories.p_cat_id 
                    and p_cat_title ='Accessories' 
                    order by 1 DESC LIMIT 0,8";
                    
                    $run_products = mysqli_query($conn,$get_products);
                    
                    while($row_products=mysqli_fetch_array($run_products))
                    {
                        
                        $pro_id = $row_products['product_id'];
                        
                        $pro_title = $row_products['product_title'];
                        
                        $pro_price = $row_products['product_price'];
                        
                        $pro_img = $row_products['product_img'];
                        
                        echo "<div class = 'col-md-6 col-lg-4 col-xl-3 p-2 best'>
                        <div class = 'collection-img position-relative'>
                            <a href='#'>
                                <img src = '../admin/product_images/$pro_img' class = 'w-100'>
                            </a>
                        </div>
                        <br />
                        <div class = 'text-center'>
                        <a href='details.php?pro_id=$pro_id'>
                        $pro_title
                    </a>
                        </div>
                        <div class = 'text-center'>
                        Rs. $pro_price
                        </div>
                        <div class='text-center'>
                            <p class='button' id='butthover'>
                                <a class='btn btn-primary text-white' href='details.php?pro_id=$pro_id' id='butto'>
                                    <i class='fa fa-shopping-cart'></i> Add to Cart
                                </a>
                            </p>
                        </div>
                    </div>"
                        ;
                    }
                ?>
            </div><!-- container Finish -->
        </div><!-- #content Finish -->



        <?php include('./partials/footer.php')?>

        <!-- jquery -->
        <script src="js/jquery-3.6.0.js"></script>
        <!-- bootstrap js -->
        <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
        <!-- js -->
    </body>
</html>
   