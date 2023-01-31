<?php include("../admin/partials/db.php");
include("fetch.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>About us</title>
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
                            <a class="nav-link text-uppercase text-dark" href="accessories.php" >Accessories</a>
                        </li>
                        <li class="nav-item dropdown px-2 py-2">
                            <a class="nav-link text-uppercase " href="aboutus.php" id="homeact">About us</a>
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


         <!-- Content -->
         <div class="container" id="con">
            <div class="container text-white" id="conn">
               <h1 class="text-center">About us</h1>
            </div>
           
            <br />
            <br />
           <p> My Otaku Collection is an anime based store. We have been providing
               quality apparels and other products since 2017 A.D, located at Sankhamul, 
               Kathmandu. At present we are supplying the products in retail</p>
               
            
           <p> Our aim is to deliver your favorite anime goods to your doorsteps. We don't 
               compromise on quality and we have a price match guarantee matching any other 
               anime retail service in Nepal. We also partner with Otaku Club Nepal to host an 
               anime expo called "Otaku Jatra" every year. We have a wide choice of selections 
               and for products not listed on our website you can email us to inquire.</p>

            <p>
                As the customer satisfaction is our goal, we always welcome any sorts of 
                suggestion from anyone. Please feel free to contact for any issue that you may 
                need. We will get back at you as soon as possible.
            </p>
        
        </div>
         <!-- end of content -->
        
    

        <?php include('./partials/footer.php')?>

        <!-- jquery -->
        <script src="js/jquery-3.6.0.js"></script>
        <!-- bootstrap js -->
        <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
        <!-- js -->
    </body>
</html>
   

       