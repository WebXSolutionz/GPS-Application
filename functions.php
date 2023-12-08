<?php

function check_login($con)
{

    if(isset($_SESSION['user_id']))
    {
        
        $id = $_SESSION['user_id'];
        $query = "select * from ulogtab where user_id = '$id' limit 1;";
        $result = mysqli_query($con,$query);

        if($result && mysqli_num_rows($result) > 0)
        {

            $user_data = mysqli_fetch_assoc($result);
            $user_data["password"] = NULL;
            return $user_data;

        }

    }
    else
    {

        //redirect to login page if the above code is unsuccessful
        header("Location: login.php");
        die;


    }
    
}


?>