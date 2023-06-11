<?php

function check_login($con){ //This function check if the user is logged in or not, if yet it gets the user data

    if(isset($_SESSION['user_id'])){ //if the user is available and logged in, here I just check if the session exists
        
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";
        $result = mysqli_query($con,$query); //now I check if the session is real 'security w keda XD'
        if($result && mysqli_num_rows($result) > 0){

                $user_data = mysqli_fetch_assoc($result); // fetch associative array
                return $user_data;
            }
    }   //reaching this line means the user is not logged in
        //redirect to login page
     header("Location: login.php");
}

function random_num($length){ //So that not all user IDs are of same length, also so that they are not incrementable.

    $text = ""; //We will insert the ID here number by number
    //Just in case something goes wrong, I will make the least length of this number == 5
    if ($length < 5) {
        $length = 5;
    }
    $len = rand(4, $length); //this is the actual length of the ID which will be between 5 and the inserted length, hence I made sure it is bigger than 5
    for ($i=0; $i < $len; $i++) { 
        $text .= rand(0,9);
    }
    return $text;
}
