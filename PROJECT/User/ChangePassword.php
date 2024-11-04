
<?php
include("../ASSETS/connection/connection.php");
session_start();

$selQry="select user_password from tbl_user where user_id=".$_SESSION['uid'];

$result=$con->query($selQry);
$row=$result->fetch_assoc();
if(isset($_POST['btn_change']))
if(isset($_POST['btn_change']))
{
	$old=$_POST['txt_opassword'];
	$new=$_POST['txt_npassword'];
	$retype=$_POST['txt_repassword'];
	if($row['user_password']!=$old)
	{
		echo"Incorrect Password";
		
		}
		else if ($new!=$retype)
		{
			echo "password doesn't match";
		}
		else
		{
			$upQry="update tbl_user set user_password='$new' where user_id=".$_SESSION['uid'];
			if($con->query($upQry))
			{
				echo"updated";
			}
			else
			{
				echo"error";
			}
			

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
            max-width: 500px;
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
        <h2>Change Password</h2>
        <form id="form1" name="form1" method="post" action="">
            <div class="mb-3">
                <label for="txt_opassword" class="form-label">Old Password</label>
                <input type="password" class="form-control" name="txt_opassword" id="txt_opassword" required>
            </div>
            <div class="mb-3">
                <label for="txt_npassword" class="form-label">New Password</label>
                <input type="password" class="form-control" name="txt_npassword" id="txt_npassword" required>
            </div>
            <div class="mb-3">
                <label for="txt_repassword" class="form-label">Re-Type Password</label>
                <input type="password" class="form-control" name="txt_repassword" id="txt_repassword" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" name="btn_change" id="btn_change">Change Password</button>
                <button type="button" class="btn btn-secondary" name="btn_cancel" id="btn_cancel">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>