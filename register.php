<?php

session_start();
$_SESSION;

include("Config.php");
include("functions.php");



if($_SERVER['REQUEST_METHOD'] === "POST")
{

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];

   
    if(!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password)&& !empty($rpassword))
    {
        
        $user_id = uniqid(rand(), true);
        $query = "INSERT INTO ulogtab(user_id,user_name,password) VALUES('$user_id','$user_name','$password')";

        mysqli_query($con, $query);

        header("Location: login.php");
        //echo "Inserted";
        die;

    }
    else
    {

        //echo "Kindly Fill Out All Fields";

    }

}



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary min-vh-100 d-flex align-items-center">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form name = "signupform" class="user" method = "post" onsubmit="return validateform()">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name" name="first_name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name" name="last_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="User Name" name="username">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="rpassword">
                                    </div>
                                </div>
                                <input type = "submit" value = "Register Account"
                                    class="btn btn-primary btn-user btn-block"/>
                                
                                <!-- <a href="login.php" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </a> -->

                            </form>
                            <br>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
   

    <script>  
        function validateform()
        {  
            var first_name=document.signupform.first_name.value;  
            var last_name=document.signupform.last_name.value;  
            var user_name=document.signupform.username.value;

            var password=document.signupform.password.value;

            var firstpassword=document.signupform.password.value;  
            var secondpassword=document.signupform.rpassword.value;  
  
                if (first_name==null || first_name=="")
                {  
                    alert("First Name can't be blank");  
                    return false;  
                }
                else if (last_name==null || last_name=="")
                {  
                    alert("Last Name can't be blank");  
                    return false;  
                }
                else if (username==null || username=="")
                {  
                    alert("User Name can't be blank");  
                    return false;  
                }
                else if(password.length<6)
                {  
                    alert("Password must be at least 6 characters long.");  
                    return false;  
                }  

                if(firstpassword==secondpassword)
                {  
                    return true;  
                }  
                else
                {  
                    alert("password must be same!");  
                    return false;  
                }  
        }  
    </script>  

</body>


</html>