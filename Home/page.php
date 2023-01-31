<?php
include("../admin/partials/db.php");
include("functions.php");
 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <?php include('partials/header.php')?>

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
                        <li class="nav-item active px-2 py-2">
                            <a class="nav-link text-uppercase active" id="homeact" href="page.php">Home</a>
                        </li>
                        
                        <li class="nav-item px-2 py-2">
                            <a class="nav-link text-uppercase text-dark" href="apparel.php">Apparels</a>
                        </li>
                        <li class="nav-item active px-2 py-2">
                            <a class="nav-link text-uppercase text-dark" href="accessories.php">Accessories</a>
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



        <!-- header -->
        <header id="header" class="vh-100 carousel slide" data-bs-ride="carousel" style="padding-top:130px;">
            <div class="container h-100 d-flex align-items-center carousel-inner">
                <div class="text-center carousel-item active">
                    <h2 class="text-capitalize text-white">BEST COLLECTION</h2>
                    <a href="apparel.php" class="btn mt-3 text-uppercase text-dark">Shop now</a>
                </div>
                <div class="text-center carousel-item">
                    <h2 class="text-capitalize text-white">BEST PRICE AND OFFER</h2>
                    <a href="accessories.php" class="btn mt-3 text-uppercase text-dark">buy now</a>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#header" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </header>
     <!-- end of header -->


     <!-- collections -->

     
        <div class="container py-3" id="collection">
            <div class="title text-center">
                <h2 class="position-relative d-inline-block">New Arrivals</h2>
            </div>
        </div>
    
    
        <<section id = "collection" class = "py-5">
            <div class = "container">
                <div class = "row g-0">
                    <div class = "collection-list mt-4 row gx-0 gy-3">

                        
                <?php 

            getPro();
            ?>
                        
                    </div>
                </div>
            </div>
        </section>
    
    
           
        <?php include('partials/footer.php')?>

        <!-- jquery -->
        <script src="js/jquery-3.6.0.js"></script>
        <!-- bootstrap js -->
        <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
        <!-- js -->
    </body>
</html>