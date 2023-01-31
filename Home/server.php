
<?php

include("functions.php");

session_start();

// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'project');


$select_customer = "select * from customers";

if (isset($_POST['login'])) {
$customer_email = $_POST['customer_email'];

$customer_pass = $_POST['customer_pass'];


$select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
$run_customer = mysqli_query($conn,$select_customer);

$get_ip = getRealIpUser();
$check_customer = mysqli_num_rows($run_customer);

$select_cart = "select * from cart where ip_add='$get_ip'";

$run_cart = mysqli_query($conn,$select_cart);

$check_cart = mysqli_num_rows($run_cart);

      
if($check_customer==0){
    
    echo "<script>alert('Your email or password is wrong')</script>";
    
}
else{
    
    $_SESSION['customer_email']=$customer_email;
    
   echo "<script>alert('You are Logged in')</script>"; 
    
   echo "<script>window.open('page.php','_self')</script>";
    
}

}

?>
