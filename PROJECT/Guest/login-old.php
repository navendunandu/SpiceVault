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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr>
      <td>password</td>
      <td><label for="txt_password"></label>
      <input type="text" name="txt_password" id="txt_password" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="login" />
      <input type="reset" name="btn_clear" id="btn_clear" value="clear" /></td>
    </tr>
  </table>
</form>
</body>
</html>