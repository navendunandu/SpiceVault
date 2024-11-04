<?php
session_start();
ob_start();
include("Head.php");
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
      <td>Welcome:<?php echo $_SESSION['dname'] ?></td>
    </tr>
    <tr>
      <td><a href="MyProfile.php">MyProfile</a></td>
    </tr>
    <tr>
      <td><a href="EditProfile.php">EditProfile</a></td>
    </tr>
    <tr>
      <td><a href="ChangePassword.php">ChangePassword</a></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>