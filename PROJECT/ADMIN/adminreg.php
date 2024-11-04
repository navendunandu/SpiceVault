<?php
include("../assets/connection/connection.php");
ob_start();
include("Head.php");
if(isset($_POST["btn_register"]))
{
	$name=$_POST["txt_name"];
	$contact=$_POST["txt_contact"];
	$email=$_POST["txt_Email"];
	$password=$_POST["txt_password"];
	$id=$_POST["txt_id"];
	if($id!='')
	{
		$upQry="update tbl_adminreg set admin_name='$name',admin_contact='$contact',admin_mail='$email',admin_password='$password' where admin_id='$id'";
		if($con->query($upQry))
		{
			echo "updated";
		}
			else
			{
				echo"error";
			}
	}
	else
	{
	
	$InsQry = "insert into tbl_adminreg(admin_name,admin_contact,admin_mail,admin_password)
	values('$name','$contact','$email','$password')";
	if($con->query($InsQry))
	{
		echo "inserted";
	}
	else
	{
		echo "error";
	}
}
}
if(isset($_GET["did"]))
	{
		$delQry="delete from tbl_adminreg where admin_id=".$_GET["did"];
		if($con->query($delQry))
		{
			?>
            <script>
			window.location="adminreg.php";
			</script>
            <?php
		}
		}
$aid='';
$aname='';
$acontact='';
$apassword='';
$aemail='';

if(isset($_GET["eid"]))
{
	$selQry= " select * from tbl_adminreg where admin_id='". $_GET['eid']."'";
	$row=$con->query($selQry);
	$data=$row->fetch_assoc();
	$aid=$data['admin_id'];
	$aname=$data["admin_name"];
	$acontact=$data["admin_contact"];
	$aemail=$data["admin_mail"];
	$apassword=$data["admin_password"];
	
	
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
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $aname;?>"/></td>
      <td> <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $aid;?>" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact"  value="<?php echo $acontact;?>"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_Email"></label>
      <input type="text" name="txt_Email" id="txt_Email" value="<?php echo $aemail;?>" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="text" name="txt_password" id="txt_password" value="<?php echo $apassword;?>" /></td>
    </tr>
    <tr>
      <td colspan="2"><center><input type="submit" name="btn_register" id="btn_register" value="register" /></center></td>
    </tr>
  </table>
</form>

<table>
<tr>
	<td><sl no></td>
    <td><Name></td>
    <td><Contact></td>
    <td><E mail></td>
    <td><Action></td>
    </tr>
    <?php
	 
 $i=0;
 $selQry="select * from tbl_adminreg";
 $result=$con->query($selQry);
 while($row=$result->fetch_assoc())
 {
	 $i++;
 ?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row["admin_name"]?></td>
<td><?php echo $row["admin_contact"]?></td>
<td><?php echo $row["admin_mail"]?></td>
<td><a href="adminreg.php?did=<?php echo $row['admin_id'];?>">delete</a>
<a href="adminreg.php?eid=<?php echo $row['admin_id'];?>">edit</a></td>
</tr>
<?php
}
?>
</table>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>