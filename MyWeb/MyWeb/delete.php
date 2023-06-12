<?php
// To logout simply unset $_SESSION['user_id'] and redirect out of index.php
session_start();

include("connection.php");
include("functions.php");

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $query = "delete from users where user_id = '$user_id' limit 1";
    $result = mysqli_query($con, $query);
    if($result){
        header("Location: login.php");
        unset($_SESSION['user_id']);
    }else {
        echo "Something went wrong!";
    }
}
