<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "test";

$con = mysqli_connect($serverName, $userName, $password, $dbName);

if(mysqli_connect_error()){
    echo "failed to connect";
    exit();
}
# echo $con; -> can't be displayed
echo "conection success!";