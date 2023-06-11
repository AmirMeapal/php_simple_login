<?php
session_start(); //A session is a way to store information on the server that can be accessed across multiple pages or requests

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") { // When user submits the login form

	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	
	if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
		//This time we read from DB
		$query = "select * from users where user_name = '$user_name' limit 1";
		//QUESTION: The defining criteria is the username which should be unique, but there is no validation to check for this

		$result = mysqli_query($con, $query);
		if ($result) {
			if($result && mysqli_num_rows($result) > 0){

                $user_data = mysqli_fetch_assoc($result); // fetch associative array
                if ($user_data['password'] === $password) {
					$_SESSION['user_id'] = $user_data['user_id']; //$_SESSION $_SESSION is a superglobal array used to store session data.
					//Redirect the user to index
					header("Location: index.php");
					die('logged in successful!');
				}
		}	 
	}
	else{
		echo "Please enter some valid information";
	}
}}

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
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
			background-color: #4CAF50;
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
        a {
			background-color: #6666ff;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
			font-size: 16px;
		}
		button:hover {
			background-color: #45a049;
		}
		.cancelbtn {
			background-color: #f44336;
			width: auto;
			padding: 10px 18px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			color: white;
			font-size: 16px;
		}
		.cancelbtn:hover {
			background-color: #d32f2f;
		}
		.imgcontainer {
			text-align: center;
			margin: 24px 0 12px 0;
		}
		img.avatar {
			width: 30%;
			border-radius: 50%;
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
		<h1>Login Form</h1>
		<form action="#" method="post">
			
			<label for="username"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="user_name" required>

			<label for="password"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password" required>

			<button type="submit">Login</button>
			
			<a href="signup.php">Signup Now!</a>
			
		</form>
	</div>
</body>
</html>