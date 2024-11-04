<?php 
include("../Assets/Connection/Connection.php");

ob_start();
include("Head.php");
session_start();
$dagentid=$_SESSION['did'];
$SelDAgent="select * from tbl_deliveryagent where deliveryagent_id=".$dagentid;
$resDAgent=$con->query($SelDAgent);
$data=$resDAgent->fetch_assoc();
 if(isset($_POST["btn_submit"]))
 {
   $oldpassword=$_POST["txt_oldpassword"];
   $newpassword=$_POST["txt_newpassword"];
   $retypepassword=$_POST["txt_retypepassword"];
	 if($data['deliveryagent_password']==$oldpassword)
	 {
		 if($newpassword==$retypepassword)
         {
	         $upQry="update tbl_deliveryagent SET deliveryagent_password='$newpassword' WHERE deliveryagent_id='".$_SESSION['did']."'";
		     if($con->query($upQry))
	       {
		    ?>
             <script>
		     window.location="MyProfile.php";
		     </script>
		     <?php
	        }
	     else
	     {
		 echo "Error";
	     }
      }
      else
   {
	   ?>
     <script>
	 alert('New Password and Re-Type Password does not match!');
	 </script>
     <?php
   }
	 }
   else
  {
	  ?>
	  <script>
	 alert('Incorrect Old Password!');
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
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Old Password</td>
      <td><label for="txt_oldpassword"></label>
      <input type="password" name="txt_oldpassword" id="txt_oldpassword" placeholder="Enter Old Password " /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_newpassword"></label>
      <input type="password" name="txt_newpassword" id="txt_newpassword" placeholder="Enter New Password"/></td>
    </tr>
    <tr>
      <td>Re-Type Password</td>
      <td><label for="txt_retypepassword"></label>
      <input type="password" name="txt_retypepassword" id="txt_retypepassword" placeholder=" Re-Type New Password" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Change Password" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>