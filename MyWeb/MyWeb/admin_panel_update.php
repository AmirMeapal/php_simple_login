<?php

session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);

if ($user_data['user_role'] !== "admin") {
    header("Location: index.php");
}

// if (isset($_GET['updateid'])){
//     $id = $_GET['updateid'];
//     $data_query = "select * from users where id='$id'";
// }

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_GET['updateid'])) { 

        $new_user_name = $_POST['new_username'];
        $new_password = $_POST['new_password'];
        $new_role = $_POST['new_role'];
        
        if ( !empty($new_user_name) && !empty($new_password) && !is_numeric($new_user_name)) {
            
            $id = $_GET['updateid'];
            $query = "update users set user_name='$new_user_name',user_role='$new_role',password='$new_password' where id = '$id' ";
    
            $result = mysqli_query($con, $query);
            if ($result) {
                header("Location: admin_panel.php");
                die('updated successful!');
        }
        else{
            echo "Please enter some valid information";
        }
    }}
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <style>
        form {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f2f2f2;
  border-radius: 5px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
input[type="password"],
select {
  width: 90%;
  padding: 10px;
  margin-bottom: 10px;
  border: none;
  border-radius: 3px;
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
}

select {
  appearance: none;
  background-color: #fff;
  background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 12 12' xmlns='http://www.w3.org/2000/svg'><path d='M10.3 3.7L6 8l-4.3-4.3c-.4-.4-1-.4-1.4 0s-.4 1 0 1.4l5 5c.2.2.5.3.7.3s.5-.1.7-.3l5-5c.4-.4.4-1 0-1.4s-1-.4-1.4 0z'/></svg>");
  background-repeat: no-repeat;
  background-position: right 10px center;
  background-size: 15px;
}

input[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}
    </style>
</head>
<body>
<form method="post" action="#">
  <label for="new_username">Username:</label>
  <input type="text" id="new_username" name="new_username"><br>

  <label for="new_password">Password:</label>
  <input type="password" id="new_password" name="new_password"><br>

  <label for="new_role">Role:</label>
  <select id="new_role" name="new_role">
    <option value="admin">Admin</option>
    <option value="user">User</option>
  </select><br>

  <input type="submit" value="Update">
</form>
</body>
</html>