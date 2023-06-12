<?php
session_start(); 

include("connection.php");
include("functions.php");

$user_data = check_login($con);

if ($user_data['user_role'] !== "admin") {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
		table {
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 20px;
		}

		th, td {
			border: 1px solid #ddd;
			padding: 8px;
			text-align: left;
		}

		th {
			background-color: #f2f2f2;
		}

		tr:nth-child(even) {
			background-color: #f9f9f9;
		}

		tr:hover {
			background-color: #f5f5f5;
		}
	</style>
</head>
<body>
    <h1>Admin Panel</h1>
    <a href="admin_panel_add.php">Add User</a></br></br>
    <table>
		<thead>
			<tr>
				<th>DB ID</th>
				<th>User ID</th>
				<th>Name</th>
                <th>Role</th>
				<th>Password</th>
				<th>Operation</th>
			</tr>
		</thead>
		<tbody>
			<?php
                $query = "select * from users";
                $result = mysqli_query($con, $query);
                if ($result) {
                    // $row =  mysqli_fetch_assoc($result);
                    // echo $row['user_role'];
                    // $row =  mysqli_fetch_assoc($result);
                    // echo $row['id'];
                    while($row =  mysqli_fetch_assoc($result)){
                        $t_db_id = $row['id'];
                        $t_id = $row['user_id'];
                        $t_name = $row['user_name'];
                        $t_role = $row['user_role'];
                        $t_password = $row['password'];
                        echo'<tr>
                        <th scope="row">'.$t_db_id.'</th>
                        <td>'.$t_id.'</td>
                        <td>'.$t_name.'</td>
                        <td>'.$t_role.'</td>
                        <td>'.$t_password.'</td>
                        <td><button><a href="admin_panel_update.php?updateid='.$t_db_id.'">Update</a></button><hr><button><a href="admin_panel_delete.php?deleteid='.$t_db_id.'">Delete</a></button></td>
                        </tr>';
                    }
                }
            ?>
            
		</tbody>
	</table>
</body>
</html>