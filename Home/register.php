
<?php include("server.php");   ?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Sign up</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #fff;
	margin-top: 9px;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 450px;
	margin: 60px auto;
  	font-size: 15px;
	box-shadow: 0 3px 9px 3px rgba(0, 0, 0, 0.5);
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #00BFFF;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}  
</style>
</head>
<body>
<div class="signup-form">
<form action="register.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
		<h2>Register</h2>
		<p class="hint-text">Create your account.</p>
        <div class="form-group">
			<input type="text" class="form-control" name="customer_name" placeholder="Username" required="required">
		</div>
        <div class="form-group">
        	<input type="email" class="form-control" name="customer_email" placeholder="Email" required="required">
        </div>
		
		<div class="form-group">
            <input type="password" class="form-control" name="customer_pass" placeholder="Password" required="required" id="passw">
        </div>
        <div class="form-group">
            <input type="checkbox" onclick="showPass()"> &nbsp; Show Password
        </div>
        

		<div class="form-group">
            <input type="text" class="form-control" name="customer_contact" placeholder="Contact number" required="required">
        </div>        
        <div class="form-group">
			<label class="form-check-label"><input type="checkbox" required="required"> &nbsp;  I agree to all the <a href="terms.php">Terms & conditions</a></label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="reg_user"> 
                <i class="fa fa-user-md"></i>Sign up
            </button>
        </div>
    </form>
</div>
<script>
            function showPass() {
                var x = document.getElementById("passw");
                if (x.type === "password") {
                x.type = "text";
                } else {
                x.type = "password";
                }
            }
            </script>
</body>
</html>



<?php 

if(isset($_POST['reg_user'])){
    
    $customer_name = $_POST['customer_name'];
    
    $customer_email = $_POST['customer_email'];
    
    $customer_pass = $_POST['customer_pass'];
    
    $customer_contact = $_POST['customer_contact'];
    
    
    $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_contact) values ('$customer_name','$customer_email','$customer_pass','$customer_contact')";
    
    $run_customer = mysqli_query($conn,$insert_customer);
        
        $_SESSION['customer_email']=$customer_email;
        
        echo "<script>alert('You have been Registered Sucessfully')</script>";
        
        echo "<script>window.open('page.php','_self')</script>";
        
    }
    


?>


