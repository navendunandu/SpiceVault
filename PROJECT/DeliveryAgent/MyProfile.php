<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
session_start();
$name=$_SESSION['dname'];
$dagentid=$_SESSION['did'];
$SelDAgent="select * from tbl_deliveryagent where deliveryagent_id=".$dagentid;
$resDAgent=$con->query($SelDAgent);
$data=$resDAgent->fetch_assoc();	
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
      <td colspan="2" align="center"><img src="../Assets/Files/Userdocs/<?php echo $data['deliveryagent_photo']; ?>" width="200" height="200" />
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $data['deliveryagent_name'];?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data['deliveryagent_email'];?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data['deliveryagent_contact'];?></td>
    </tr>
    <tr>
      <td colspan="2"><a href="EditProfile.php">EditProfile</a>
      <a href="ChangePassword.php">ChangePassword</a></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>