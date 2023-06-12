<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_db";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){ //mysqli_connect is used to establish a connection to a MySQL database
//mysqli_connect returns a MySQLi object if the connection to the MySQL server is successful, this object ($con) can be used to 
//execute queries on the DB.

    die("failed to connect to DB, reason:" . mysqli_connect_error()); //might not be best thing security-wise to show the error, 
                                                                      //but this is just as POC in a simple project.
}


/**Error Control Operator:
 * the  [@] is used to control the error, which can provide moer security
 * put it before any statement to remove any error message or feedback which can help an attacker
 * This operator is used in production not in development, so they might forget to implement it, which can create vulnerabilities.
 * You can also use the "or" operator to show the error message you want
 * EX.:
 * $con = @mysqli_connect($dbhost, $dbuser, $dbpass, $dbname or die("An error occured");
 * So here if an error happens the die function will start and my personal error message will appear.
 */
