
<?php include("server.php"); 
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Login</title>
    <style>
       #bor{
         background: #f2f3f7;
         box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
       }
       
    </style>
 </head>
  <body>
    <section>
       <div class="container mt-5  pt-5">
          <div class="row">
             <div class="col-12 col-sm-8 col-md-4 m-auto">
               <div class="card border-0 shadow" id="bor">
                  <div class="card-body">
                     <h1 class="text-center"><b>Login</b></h1>

                     <form method="post" action="login.php"><!-- form Begin -->
                        <input type="text" name="customer_email" class="form-control my-4 py-2" placeholder="Email" required/>
                        <input type="password" name="customer_pass" class="form-control my-4 py-2" placeholder="Password" required/>
                        <div class="text-center mt-3">
                           <button class="btn btn-primary" value="Login" name="login">
                                <i class="fa fa-sign-in"></i>Login
                            </button>
                           <hr>
                           <p>Don't have an account?</p>
                           <a href="register.php">
                              <button type="button" class="btn btn-success">Create new account</button>
                           </a>
                        </div>
                     </form>
                  </div>
               </div>
             </div>
         </div>
       </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  </body>
</html>





