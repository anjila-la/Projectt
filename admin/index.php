<?php 

    session_start();
    include("partials/db.php");
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        
        $admin_session = $_SESSION['admin_email'];
        
        $get_admin = "select * from admins where admin_email='$admin_session'";
        
        $run_admin = mysqli_query($conn,$get_admin);
        
        $row_admin = mysqli_fetch_array($run_admin);
        
        $admin_id = $row_admin['admin_id'];
        
        $admin_name = $row_admin['admin_name'];
        
        $admin_email = $row_admin['admin_email'];
        
        $admin_about = $row_admin['admin_about'];
        
        $admin_contact = $row_admin['admin_contact'];
        
        $get_products = "select * from products";
        
        $run_products = mysqli_query($conn,$get_products);
        
        $count_products = mysqli_num_rows($run_products);
        
        $get_customers = "select * from customers";
        
        $run_customers = mysqli_query($conn,$get_customers);
        
        $count_customers = mysqli_num_rows($run_customers);
        
        $get_p_categories = "select * from product_categories";
        
        $run_p_categories = mysqli_query($conn,$get_p_categories);
        
        $count_p_categories = mysqli_num_rows($run_p_categories);
        
        $get_customer_orders = "select * from customer_orders";
        
        $run_customer_orders = mysqli_query($conn,$get_customer_orders);
        
        $count_customer_orders = mysqli_num_rows($run_customer_orders);
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("partials/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
            <?php
                
                if(isset($_GET['dashboard'])){
                    
                    include("dashboard.php");
                    
                }
                if(isset($_GET['insert_product'])){
                        
                    include("insert_product.php");
                    
                }
                if(isset($_GET['view_products'])){
                        
                    include("view_products.php");
                    
                }
                if(isset($_GET['delete_product'])){
                            
                    include("delete_product.php");
                    
                }   
                if(isset($_GET['edit_product'])){
                    
                    include("edit_product.php");
                    
                }
                if(isset($_GET['view_customers'])){
                        
                    include("view_customers.php");
                    
                }   
                if(isset($_GET['delete_customer'])){
                    
                    include("delete_customer.php");
                    
                }   
                if(isset($_GET['view_orders'])){
                    
                    include("view_orders.php");
                    
                }   
                if(isset($_GET['delete_order'])){
                    
                    include("delete_order.php");
                    
                }
                if(isset($_GET['view_users'])){
                        
                    include("view_users.php");
                    
                }   
                if(isset($_GET['delete_user'])){
                    
                    include("delete_user.php");
                    
                }   
                if(isset($_GET['insert_user'])){
                    
                    include("insert_user.php");
                    
                }   
                if(isset($_GET['user_profile'])){
                    
                    include("user_profile.php");
                    
                }

            
            ?>
                
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>           
</body>
</html>