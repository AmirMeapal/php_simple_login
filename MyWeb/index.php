<?php
/**Note: the web generates PHPSESSOIN cookie automatically */
    session_start();

    include("connection.php"); //to use the function and/or variables in these files.
    include("functions.php");

    $user_data = check_login($con);

if ($_SERVER['REQUEST_METHOD'] == "POST") { // When user submits the login form

	$current_username = $_POST['current_username'];
    $current_password = $_POST['current_password'];
    $new_user_name = $_POST['new_username'];
	$new_password = $_POST['new_password'];
	
	if (!empty($current_username) && !empty($current_password) && !empty($new_user_name) && 
    !empty($new_password) && !is_numeric($current_username) && !is_numeric($new_user_name)) {
		if ($current_username !== $user_data['user_name'] || $current_password !== $user_data['password']){
            echo "Wrong username or password.";
            exit;
			//header("Location: index.php"); -> This line will break the app if used.
        }
        //This time we update DB
        $id = $user_data['user_id'];
		$query = "update users set user_name='$new_user_name',password='$new_password' where user_id = $id ";

		$result = mysqli_query($con, $query);
		if ($result) {
            header("Location: index.php");
            die('updated successful!');
	}
	else{
		echo "Please enter some valid information";
	}
}}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <a href="logout.php">logout</a>
    <h1>This is the Homepage</h1>
    <h2>Hello, <?php echo $user_data['user_name']; ?></h2> <!-- why does it work if I remove the ; -->
    <h1>Change Username/Password</h1>
	<form action="#" method="post">
		<label for="current_username">Current Username:</label>
		<input type="text" id="current_username" name="current_username"><br><br>
		<label for="current_password">Current Password:</label>
		<input type="password" id="current_password" name="current_password"><br><br>
		<label for="new_username">New Username:</label>
		<input type="text" id="new_username" name="new_username"><br><br>
		<label for="new_password">New Password:</label>
		<input type="password" id="new_password" name="new_password"><br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>