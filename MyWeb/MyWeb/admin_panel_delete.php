<?php

session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);

if ($user_data['user_role'] !== "admin") {
    header("Location: index.php");
}

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $query = "delete from users where id = '$id' limit 1";
    $result = mysqli_query($con, $query);
    if($result){
        header("Location: admin_panel.php");
        echo "Deleted";
    }else {
        echo "Something went wrong!";
    }
}
