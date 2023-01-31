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
