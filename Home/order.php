<?php 
include("functions.php");
?>
<?php 

if(isset($_GET['customer_id'])){
    
    $customer_id = $_GET['customer_id'];
    
}

$ip_add = getRealIpUser();

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($conn,$select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){
    
    $pro_id = $row_cart['p_id'];
    
    $pro_qty = $row_cart['qty'];
    
    $pro_size = $row_cart['size'];
    
    $get_products = "select * from products where product_id='$pro_id'";
    
    $run_products = mysqli_query($conn,$get_products);
    
    while($row_products = mysqli_fetch_array($run_products)){
        
        $sub_total = $row_products['product_price']*$pro_qty;
        
        $insert_customer_order = "insert into customer_orders (customer_id,product_id,amount,qty,size,order_date) values ('$customer_id','$pro_id','$sub_total','$pro_qty','$pro_size',NOW())";
        
        $run_customer_order = mysqli_query($conn,$insert_customer_order);
        
        $delete_cart = "delete from cart where ip_add='$ip_add'";
        
        $run_delete = mysqli_query($conn,$delete_cart);


    }
  
    
}

echo "<script>alert('Your order has been submitted, Thanks')</script>";

echo "<script>window.open('page.php','_self')</script>";
?>