<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") { // When user submits the signup form

	$user_name = $_POST['user_name'];//$_POST is were the user submitted data is stored
	$password = $_POST['password'];
	$user_role = "user";
	//mesekna el user supplied data, nwadeha ll DB ba2a
	//elawel net2aked en el user katab 7aga fe3lan w el howa katabo valid
	if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
		//All data entered is correct so insert to DB
		//Question: I think this is vulnerable if I enter a username that is already used, how to solve this?!
		//we need to create a random number from a big pool to be the new user ID
		$user_id = random_num(20);
		$query = "insert into users (user_id, user_name, user_role , password) values ('$user_id', '$user_name', '$user_role' ,'$password')";

		//Now we execute the query to save the new user
		mysqli_query($con, $query);

		//Redirect the user to login page to log in (not necessary)
		header("Location: login.php");
		die('signup successful!'); // used to stop the execution of a script (and display a message to the user)
		// Alternatively you can use the "exit()" function, which does the same thing but does not display a message.
	}else{
		echo "Please enter some valid information";
	}
}

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
		}
		.container {
			margin: 50px auto;
			width: 400px;
			background-color: #fff;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0px 0px 10px #aaa;
		}
		h1 {
			text-align: center;
			margin-bottom: 30px;
		}
		input[type=text], input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			font-size: 16px;
		}
		button {
			background-color: #6666ff;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
            margin-bottom: 30px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
			font-size: 16px;
		}
		button:hover {
			background-color: #0000b3;
		}
        a {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
			font-size: 16px;
		}
		.container label {
			font-size: 16px;
			font-weight: bold;
		}
		.container p {
			text-align: center;
			font-size: 14px;
			color: red;
			margin: 0;
		}
		@media screen and (max-width: 600px) {
			.container {
				width: 100%;
			}
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Sign Up Form</h1>
		<form action="#" method="post">
			<label for="username"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="user_name" required>

			<label for="password"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password" required>

			<button type="submit">Sign Up</button>
			<a href="login.php">Login</a>

			
		</form>
	</div>
</body>
</html>