<?php
include("../admin/partials/db.php");
include("fetch.php");

 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Details</title>
        <?php include('partials/header.php')?>
        <style>  
            hr  
            {  
                width: 60%;  
                height: 2px;  
                background-color: black; 
                margin-bottom: 7px;  
                margin-right: auto;  
                margin-left: auto;  
                margin-top: 4px;  
                border-width: 4px;  
                border-color: blue;
                box-shadow: 0 3px 9px 3px rgba(0, 0, 0, 0.5);
            }  
        </style>

    </head>
    <body>
        <?php include('navigation.php')?>
        
        <div id="content" class="container py-5"><!-- container Begin -->
            <div class="row"><!-- row Begin -->
                
               <hr>

                <div class="col-md-8"><!-- col-md-9 Begin -->
                    <div id="productMain" class="row"><!-- row Begin -->
                        
                        <div class="col-sm-6"><!-- col-sm-6 Begin -->
                            <div id="mainImage"><!-- #mainImage Begin -->
                                <img class="img-responsive" src="../admin/product_images/<?php if(isset($_GET['pro_id'])){
                                $pro_img = $row_product['product_img'];
                                echo $pro_img;
                            }  ?>" alt="Product"></center>
                            </div><!-- mainImage Finish -->
                        </div><!-- col-sm-6 Finish -->

                        <div class="col-sm-6" ><!-- col-sm-6 Begin -->
                            <div class="box" id="detaill"><!-- box Begin -->
                            <h1> <?php 
                            if(isset($_GET['pro_id'])){
                                $pro_title = $row_product['product_title'];
                                echo $pro_title;
                            }
                                 ?> </h1>

                           <form action="details.php?add_cart=<?php 
                           if(isset($_GET['pro_id'])){
    
                            $pro_id = $_GET['pro_id'];
                            
                        }
                        
                           echo $pro_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                               <div class="form-group" ><!-- form-group Begin -->
                                   <label for="" class="col-md-5 control-label">Products Quantity</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                          <select name="product_qty" id="" class="form-control"><!-- select Begin -->
                                           <option value="1">1</option>
                                           <option value="2">2</option>
                                           <option value="3">3</option>
                                           <option value="4">4</option>
                                           <option value="5">5</option>
                                           </select><!-- select Finish -->
                                   
                                    </div><!-- col-md-7 Finish -->
                                   
                               </div><!-- form-group Finish -->
                               
                               <div class="form-group"><!-- form-group Begin -->
                                   <label class="col-md-5 control-label">Product Size</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                       
                                   <select name="product_size" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Must pick 1 size for the product')"><!-- form-control Begin -->
                                          
                                          <option value="" disabled selected>Select a Size</option>
                                          <option value="small">Small</option>
                                          <option value="medium">Medium</option>
                                          <option calue="large">Large</option>
                                          
                                      </select><!-- form-control Finish -->
                                       
                                   </div><!-- col-md-7 Finish -->
                               </div><!-- form-group Finish -->
                               
                               <p class="price">Rs. <?php 
                               if(isset($_GET['pro_id'])){
                                $pro_price = $row_product['product_price'];
                                echo $pro_price;
                            } ?>
                            </p>
                               
                               <p  id="butthover">
                                   <button id="cartbutton" class="btn btn-primary text-white"> 
                                   <i class='fa fa-shopping-cart'></i> &nbsp
                                       Add to cart
                                    </button>
                                </p>
                               
                           </form><!-- form-horizontal Finish -->
                           <?php add_cart(); ?>
                            </div>
                        </div>

                    </div>
                </div>
    
                <div class="box" id="details"><!-- box Begin -->
                    <h4>Product Details</h4>
                
                        <?php
                        if(isset($_GET['pro_id'])){
                            $pro_desc = $row_product['product_desc'];
                            echo $pro_desc;
                        } ?>
                
                
                    <h4>Size</h4>
                    
                    <ul>
                        <li>Small</li>
                        <li>Medium</li>
                        <li>Large</li>
                    </ul>  
                    
                </div><!-- box Finish -->
                <hr id="hrr">
            </div>
        </div>

       <?php include('partials/footer.php')?>

        <!-- jquery -->
        <script src="js/jquery-3.6.0.js"></script>
        <!-- bootstrap js -->
        <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
        <!-- js -->
    </body>
</html>