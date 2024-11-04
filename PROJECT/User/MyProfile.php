<?php
include("../Assets/connection/connection.php");
session_start();
	$selQry="select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p. district_id  where user_id=".$_SESSION['uid'];
	$result=$con->query($selQry);
	$row=$result->fetch_assoc()
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9f5f5; /* Light cyan background */
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 400px; /* Set a maximum width for the profile container */
            margin: 50px auto; /* Center the container */
            padding: 20px;
            background-color: white; /* White background for the profile */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        h2 {
            text-align: center; /* Center the heading */
            margin-bottom: 20px; /* Space below the heading */
            color: #007bff; /* Bootstrap primary color */
        }
        img {
            border-radius: 50%; /* Circular profile picture */
            margin-bottom: 15px; /* Space below the image */
        }
        .table {
            border: none; /* Remove table border */
        }
        .table td {
            vertical-align: middle; /* Center align table cells vertically */
            border: none; /* Remove cell borders */
        }
        .btn-group {
            margin-top: 20px; /* Space above the buttons */
            display: flex;
            justify-content: space-between; /* Space out the buttons */
        }
        .btn {
            width: 48%; /* Make buttons take half the width */
        }
    </style>
</head>
<body>

<div class="container">
    <h2>User Profile</h2>
    <form id="form1" name="form1" method="post" action="">
        <div class="text-center">
            <img src="../Assets/Files/User/Photo/<?php echo $row['user_photo']; ?>" height="150" alt="User Photo"/>
        </div>
        <table class="table">
            <tr>
                <td>Name</td>
                <td><?php echo $row['user_name']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $row['user_email']; ?></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td><?php echo $row['user_contact']; ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo $row['user_address']; ?></td>
            </tr>
            <tr>
                <td>District</td>
                <td><?php echo $row['district_name']; ?></td>
            </tr>
            <tr>
                <td>Place</td>
                <td><?php echo $row['place_name']; ?></td>
            </tr>
        </table>
        <div class="btn-group">
            <a href="EditProfile.php" class="btn btn-primary">Edit Profile</a>
            <a href="ChangePassword.php" class="btn btn-secondary">Change Password</a>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
