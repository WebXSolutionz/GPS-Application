<?php

session_start();
$_SESSION;

include("Config.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] === "POST")
{

    $username = $_POST['username'];
    $password = $_POST['password'];
  
    
    if(!empty($username) && !empty($password))
    {
        
        //read from database      
        $query = "Select * from ulogtab where user_name = '$username' limit 1";
        //echo $query;
        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {

                $user_data = mysqli_fetch_assoc($result);
          
                if($user_data["password"] === $password)
                {
                    
                    $_SESSION["user_id"] = $user_data["user_ID"];
                    $user_data["password"] = NULL;
                    //echo "yes";
                    header("Location: index.php");
                    die;

                }

            }        
        }
        
        //echo "Wrong User Name or Password";
    }
    else
    {

        echo "Kindly Fill Out All Fields";

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

    <title>SB Admin 2 - Login</title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" name = "loginform" method = "post" onsubmit="return validateformLogin()">
                                        <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="User Name" name="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name = "password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input type = "submit" value = "Login"
                                                class="btn btn-primary btn-user btn-block"/>
                                        <!-- <a href="index.php" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a> -->
                                    </form>
                                    <br>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
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
        function validateformLogin()
        {  
            var name=document.loginform.username.value;  
            var password=document.loginform.password.value;
            
  
                if (name==null || name=="")
                {  
                    alert("User Name can't be blank");  
                    return false;  
                }
                else if(password.length<6)
                {  
                    alert("Password must be at least 6 characters long.");  
                    return false;  
                }  
               
        }  
    </script>  

</body>

</html>