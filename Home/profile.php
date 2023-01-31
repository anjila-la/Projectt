<?php
include("server.php");
$user_email = $_SESSION['customer_email'];
?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Apparel</title>
        <?php include('./partials/header.php')?>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

        body{
            padding-top:100px;
        }
        :root{
   --blue:#3498db;
   --dark-blue:#2980b9;
   --red:#e74c3c;
   --dark-red:#c0392b;
   --black:#333;
   --white:#fff;
   --light-bg:#eee;
   --box-shadow:0 5px 10px rgba(0,0,0,10);
}

.box{
    font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border: none;
   text-decoration: none;
}
#profbut{
    background-color: var(--blue);
}
#profbut:hover{
   background-color: var(--dark-blue);
}




.update-profile{
   min-height: 100vh;
   background-color: var(--light-bg);
   display: flex;
   align-items: center;
   justify-content: center;
   padding:110px;
}

.update-profile form{
   padding:20px;
   background-color: lightgray;
   box-shadow: var(--box-shadow);
   text-align: center;
   width: 500px;
   text-align: center;
   border-radius: 5px;
}

.update-profile form .flex{
   display: flex;
   justify-content: space-between;
   margin-bottom: 20px;
   gap:15px;
}

.update-profile form .flex .inputBox{
   width: 100%;
}

.update-profile form .flex .inputBox span{
   text-align: left;
   display: block;
   margin-top: 15px;
   font-size: 20px;
   color:var(--black);
}

.update-profile form .flex .inputBox .box{
   width: 100%;
   border-radius: 5px;
   background-color: var(--light-bg);
   padding:12px 14px;
   font-size: 17px;
   color:var(--black);
   margin-top: 10px;
}

@media (max-width:650px){
   .update-profile form .flex{
      flex-wrap: wrap;
      gap:0;
   }
   .update-profile form .flex .inputBox{
      width: 100%;
   }
}


    </style>

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
                        
                        <li class="nav-item px-2 py-2">
                            <a class="nav-link text-uppercase text-dark" href="apparel.php" id="homeact">Apparels</a>
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

   

   
<div class="update-profile" id="prof">
<?php

      $select = mysqli_query($conn, "SELECT * FROM customers WHERE customer_email='$user_email'");

      if(mysqli_num_rows($select) > 0){
        $fetch = mysqli_fetch_assoc($select);
     }
   ?>
<form action="" method="post" enctype="multipart/form-data">
        <center><!--  center  Begin  -->
            <i class="fa fa-id-card fa-7x " align="center"></i>
        </center><!--  center  Finish  -->
      <br />
      
        <div class="flex" >
            <div class="inputBox" id="flexx">
                <span><b>Username :</b></span>
                <input type="text" name="update_name" value="<?php echo $fetch['customer_name']; ?>"  class="box" >
                <span><b>Email :</b></span>
                <input type="text" name="update_email" value="<?php echo $fetch['customer_email']; ?>"  class="box" >
                <span><b>Contact :</b></span>
                <input type="text" name="update_contact" value="<?php echo $fetch['customer_contact']; ?>"  class="box">
         </div>
         
      </div>
    

      <?php

if(isset($_POST['update_profile'])){

    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
 
    mysqli_query($conn, "update customers SET customer_name = '$update_name', customer_email = '$update_email' WHERE customer_email= '$user_email'");
 
    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($conn, $_POST['update_pass']);
    $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
    $confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_pass']);
 
    if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
       if($update_pass != $old_pass){
          $message[] = 'old password not matched!';
       }elseif($new_pass != $confirm_pass){
          $message[] = 'confirm password not matched!';
       }else{
          mysqli_query($conn, "update customers SET password = '$confirm_pass' WHERE customer_email = '$user_email'");
          $message[] = 'password updated successfully!';
       }
    }
 }
?>
      <hr>
      <!-- <a href="logout.php" class="text-decoration-none "> Update Profile
     </a> <br /> <br/> -->
      <a href="logout.php" class="text-decoration-none ">
            <i class="fa fa-power-off"></i> Log Out
     </a>

   </form>
        

</div>

<?php include('partials/footer.php')?>


        <!-- jquery -->
        <script src="js/jquery-3.6.0.js"></script>
        <!-- bootstrap js -->
        <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
        <!-- js -->
</body>
</html>

                  