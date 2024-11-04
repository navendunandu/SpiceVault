<?php
include("../ASSETS/connection/connection.php");
session_start();
ob_start();
include("Head.php");

$selQry="select company_password from tbl_company where company_id=".$_SESSION['cid'];

$result=$con->query($selQry);
$row=$result->fetch_assoc();
if(isset($_POST['btn_change']))
if(isset($_POST['btn_change']))
{
	$old=$_POST['txt_opassword'];
	$new=$_POST['txt_npassword'];
	$retype=$_POST['txt_repassword'];
	if($row['company_password']!=$old)
	{
		echo"Incorrect Password";
		
		}
		else if ($new!=$retype)
		{
			echo "password doesn't match";
		}
		else
		{
			$upQry="update tbl_company set company_password='$new' where company
			_id=".$_SESSION['cid'];
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/5hb7ie1GrSOzFQj5hlGimBHY+/TNwrh1tr6QWz" crossorigin="anonymous">
  
  <!-- Custom CSS -->
  <style>
    .form-container {
      max-width: 500px;
      margin: 50px auto;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background-color: #f9f9f9;
    }
    .form-title {
      text-align: center;
      margin-bottom: 20px;
      font-size: 24px;
      font-weight: bold;
    }
    .btn {
      width: 100%;
    }
    .btn-secondary {
      margin-top: 10px;
    }
  </style>
</head>

<body>

<div class="container">
  <div class="form-container shadow-sm">
    <h2 class="form-title">Change Password</h2>
    <form id="form1" name="form1" method="post" action="">
      <div class="mb-3">
        <label for="txt_opassword" class="form-label">Old Password</label>
        <input type="password" class="form-control" name="txt_opassword" id="txt_opassword" placeholder="Enter old password" required>
      </div>
      <div class="mb-3">
        <label for="txt_npassword" class="form-label">New Password</label>
        <input type="password" class="form-control" name="txt_npassword" id="txt_npassword" placeholder="Enter new password" required>
      </div>
      <div class="mb-3">
        <label for="txt_repassword" class="form-label">Re-Type New Password</label>
        <input type="password" class="form-control" name="txt_repassword" id="txt_repassword" placeholder="Re-type new password" required>
      </div>
      <button type="submit" class="btn btn-primary" name="btn_change" id="btn_change">Change Password</button>
      <button type="reset" class="btn btn-secondary" name="btn_cancel" id="btn_cancel">Cancel</button>
    </form>
  </div>
</div>

<!-- Bootstrap JS and dependencies (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12XpeYbZ5Vp4hFtgIpydnxbkzHpb7x14wpWAgMZhM5t9UM52" crossorigin="anonymous"></script>

</body>

</html>
<?php
include("Foot.php");
ob_flush();
?>