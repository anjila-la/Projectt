<?php 

$conn = mysqli_connect("localhost","root","","project");


/// begin getRealIpUser functions ///


function getRealIpUser(){
    
    switch(true){
        
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
    
}


// begin add cart function
function add_cart()
{   
    global $conn;
    
    if(isset($_GET['add_cart'])){
        
        $ip_add = getRealIpUser();
        
        $p_id = $_GET['add_cart'];

        $product_qty = $_POST['product_qty'];
        
        $product_size = $_POST['product_size'];
        
        $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
        
        $run_check = mysqli_query($conn,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('This product has already added in cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }else{
            
            $query = "insert into cart (p_id,ip_add,qty,size) values ('$p_id','$ip_add','$product_qty','$product_size')";
            
            $run_query = mysqli_query($conn,$query);
            
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }
        
    }
}
// end of add cart function


/// finish getRealIpUser functions ///

/// begin getPro functions ///
function getPro(){
    
    global $conn;
    
    $get_products = "select * from products order by 1 DESC LIMIT 0,8";
                    
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
    </div>";
    }
    
}



?>
