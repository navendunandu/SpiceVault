<?php
include("../ASSETS/connection/connection.php");
session_start();
$selQry="select * from tbl_user where user_id=".$_SESSION['uid'];
$result=$con->query($selQry);
$row=$result->fetch_assoc();
if(isset($_POST['btn_edit']))
{
$name=$_POST["txt_name"];
	$contact=$_POST["txt_contact"];
	$email=$_POST["txt_email"];
	$address=$_POST["txt_address"];
	$uid=$_SESSION['uid'];
	$upsQry="update tbl_user set user_name='$name', user_email='$email', user_contact='$contact', user_address='$address' where user_id=".$_SESSION['uid'];
	if($con->query($upsQry))
	{
		echo"Updated";
		?>
        <script>
		window.location="EditProfile.php";
		</script>
        <?php
	}
}
		

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 30px;
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 600px; /* Average width for the form */
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>


<body>

<div class="container">
    <div class="form-container">
        <h2>Edit User Details</h2>
        <form id="form1" name="form1" method="post" action="">
            <div class="mb-3">
                <label for="txt_name" class="form-label">Name</label>
                <input type="text" class="form-control" name="txt_name" id="txt_name" value="<?php echo $row['user_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="txt_email" class="form-label">Email</label>
                <input type="email" class="form-control" name="txt_email" id="txt_email" value="<?php echo $row['user_email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="txt_contact" class="form-label">Contact</label>
                <input type="text" class="form-control" name="txt_contact" id="txt_contact" value="<?php echo $row['user_contact']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="txt_address" class="form-label">Address</label>
                <textarea class="form-control" name="txt_address" id="txt_address" rows="4" required><?php echo $row['user_address']; ?></textarea>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" name="btn_edit" id="btn_edit">Edit</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>