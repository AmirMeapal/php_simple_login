<?php

session_start(); 

include("connection.php");
include("functions.php");

$user_data = check_login($con);

if ($user_data['user_role'] !== "admin") {
    header("Location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
  $user_name = $_POST['user_name'];//$_POST is were the user submitted data is stored
	$password = $_POST['password'];
	$user_role = $_POST['role'];
  if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

		$user_id = random_num(20);
		$query = "insert into users (user_id, user_name, user_role , password) values ('$user_id', '$user_name', '$user_role' ,'$password')";

		//Now we execute the query to save the new user
		mysqli_query($con, $query);

		//Redirect the user to login page to log in (not necessary)
		header("Location: admin_panel.php");
		die('Added Sucessfully'); 
	}else{
		echo "Please enter some valid information";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User Add</title>
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
  <label for="username">Username:</label>
  <input type="text" id="user_name" name="user_name"><br>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password"><br>

  <label for="role">Role:</label>
  <select id="role" name="role">
    <option value="admin">Admin</option>
    <option value="user">User</option>
  </select><br>

  <input type="submit" value="Add">
</form>
</body>
</html>