<?php

session_start();
$_SESSION;

include("Config.php");
include("functions.php");


$user_data = check_login($con);


if($_SERVER['REQUEST_METHOD'] === "POST")
{

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['DOB'];
    $mac = $_POST['MAC'];
      

    if(!empty($first_name) && !empty($last_name) && !empty($dob) && !empty($mac))
    {
        
        $user_id = uniqid(rand(), true);
        $query = "INSERT INTO user_data(user_id,first_name,last_name, DOB, MAC) VALUES('$user_id','$first_name','$last_name', '$dob','$mac')";

        mysqli_query($con, $query);

        $queryGPS = "INSERT INTO gps_data(user_id,MAC) VALUES('$user_id','$mac')";
        mysqli_query($con, $queryGPS);

        //header("Location: add-new-user.php");
        //echo $query;
        
        //die;

    }
    else
    {

        //echo "Errors";

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

    <title>SB Admin 2 - Add New User</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="add-new-user.php" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user-plus"></i>
                    <span>Add New User</span>
                </a>
            </li>

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="delete-user.php" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-user-minus"></i>
                    <span>Delete User</span>
                </a>
            </li>

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="view-location.php" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-search-location"></i>
                    <span>View Location</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user_data['user_name']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add New User</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row w-100 d-flex align-items-center">
                        <form class="w-100 px-4" name = "newAdd" method = "post">
                            <div class="form-group row">
                              <label for="FirstName" class="col-sm-2 col-form-label">First Name</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="FirstName" name = "first_name" placeholder="Name" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="LastName" class="col-sm-2 col-form-label">Last Name</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="LastName" name = "last_name" placeholder="Last Name" required>
                              </div>
                            </div>
                            <div class="form-group row">
                                <label for="DateOfBirth" class="col-sm-2 col-form-label">Date of Birth</label>
                                <div class="col-sm-10">
                                  <input type="date" class="form-control" name = "DOB" id="DateOfBirth" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="MacAddress" class="col-sm-2 col-form-label">MAC ADDRESS</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="MacAddress" name = "MAC" placeholder="aabbccddeeff" required>
                                </div>
                              </div>
                            <div class="form-group row d-flex justify-content-start">
                              <div class="col">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                              </div>
                            </div>
                          </form>
                    </div>

                </div>
                <!-- /.container-fluid  name = "newAdd" method = "post" onsubmit="return validateform()" -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
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
    

</body>

</html>