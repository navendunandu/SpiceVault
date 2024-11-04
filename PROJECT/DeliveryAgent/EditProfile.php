<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
session_start();
$dagentid=$_SESSION['did'];

 if(isset($_POST["btn_submit"]))
  {
	 
	  $name=$_POST["txt_name"];
	  $email=$_POST["txt_email"];
	  $contact=$_POST["txt_contact"];
		  $upQry="update tbl_deliveryagent SET deliveryagent_name='$name',deliveryagent_email='$email',deliveryagent_contact='$contact' WHERE deliveryagent_id='".$_SESSION['did']."'";
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
 $SelDAgent="select * from tbl_deliveryagent WHERE deliveryagent_id='".$_SESSION['did']."'";
 
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
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $data['deliveryagent_name'];?>" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" value="<?php echo $data['deliveryagent_email'];?>" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $data['deliveryagent_contact'];?>" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Edit" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>