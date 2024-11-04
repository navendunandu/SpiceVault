<?php
include("../assets/connection/connection.php");
session_start();
if(isset($_POST['btn_submit']))
{
	$email=$_POST['txt_email'];
	$password=$_POST['txt_password'];
	
	$seladmin="select * from tbl_adminreg where admin_mail='$email' and admin_password='$password'";
	$resultadmin=$con->query($seladmin);
	
	$selcompany="select * from tbl_company where company_email='$email' and company_password='$password'";
	$resultcompany=$con->query($selcompany);
	
	$seluser="select * from tbl_user where user_email='$email' and user_password='$password'";
	$resultuser=$con->query($seluser);
	
	$selDAgent="select * from tbl_deliveryagent where deliveryagent_email='$email' and deliveryagent_password='$password'";
	$resultDAgent=$con->query($selDAgent);
	
	if($data=$resultadmin->fetch_assoc())
	{
		$_SESSION['aid']=$data['admin_id'];
		header("location:../ADMIN/homepage.php");
	}
	else if ($data=$resultcompany-> fetch_assoc())
	{
		if($data['company_vstatus']==1)
		{
			
			
	
		$_SESSION['cid']=$data['company_id'];
		header("location:../company/homepage.php");
		}
	
		if($data['company_vstatus']==2)
		{
			echo"Rejected";
		}
		else
		{
			echo"Pending";
		}
			
	}

	else if($data=$resultuser->fetch_assoc())
	
	
	{
		$_SESSION['uid']=$data['user_id'];{
		header("location:../User/HomePage.php");
	}
	 if($data=$resultDAgent->fetch_assoc())
	
	
	{
		$_SESSION['did']=$data['deliveryagent_id'];{
		header("location:../DeliveryAgent/HomePage.php");
	}
	
	}
}
}

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Login 08</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="../Assets/Templates/Login/https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="../Assets/Templates/Login/https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../Assets/Templates/Login/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Have an account?</h3>
						<form method="post" class="login-form">
		      		<div class="form-group">
		      			<input type="text" name="txt_email"class="form-control rounded-left" placeholder="Email id" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password"name="txt_password" class="form-control rounded-left" placeholder="Password" required>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div>
	            <div class="form-group">
	            	<input type="submit" name="btn_submit" class="btn btn-primary rounded submit p-3 px-5" value="Login">
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../Assets/Templates/Login/js/jquery.min.js"></script>
  <script src="../Assets/Templates/Login/js/popper.js"></script>
  <script src="../Assets/Templates/Login/js/bootstrap.min.js"></script>
  <script src="../Assets/Templates/Login/js/main.js"></script>

	</body>
</html>

