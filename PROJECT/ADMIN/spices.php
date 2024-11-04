<?php
include("../ASSETS/connection/connection.php");
ob_start();
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$spid=$_POST["txt_spices"];
	$id=$_POST['txt_id'];
	if($id!='')
	{
		$upqry="Update tbl_spices set spices_name='$spid' where spices_id='$id'";
		if($con->query($upqry))
	{
		?>
        <script>
		alert("updated");
		window.location="spices.php";
		</script>
        <?php
	}
	
		
	}
	else
	{
	$insQry  = "insert into tbl_Spices(spices_name) values('".$spid."')";
	if($con->query($insQry))
	{
		echo "Inserted";
	}
	else
	{
		echo "Error";
	}
}
}
if(isset($_GET["spid"]))
	{
		$delQry="delete from tbl_spices where spices_id=".$_GET["spid"];
		if($con->query($delQry))
		{
			?>
            <script>
			window.location="spices.php";
			</script>
            <?php
		}
		}

$dname='';
$did='';

if(isset($_GET["sid"]))
{
	$selQry= " select * from tbl_spices where spices_id='". $_GET['sid']."'";
	$row=$con->query($selQry);
	$data=$row->fetch_assoc();
	$did=$data['spices_id'];
	$dname=$data['spices_name'];
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
      
  </table>
  <table width="200" border="1">
    <tr>
      <td>Spices Name</td>
      <td><label for="txt_spices"></label>
      <input type="text" name="txt_spices" id="txt_spices" value="<?php echo $dname ?>" />
      <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $did ?>" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_clear" id="btn_clear" value="clear" /></td>
    </tr>
  </table>
</form>
<table>

<tr>
	<td></td>
    <td><category></td>
    <td><Action></td>
    
    
 </tr>
 
 <?php
 $i=0;
 $selQry="select * from tbl_spices";
 $result=$con->query($selQry);
 while($row =$result-> fetch_assoc())
 {
	 $i++;
 ?>
     
     <tr>
     <td><?php echo $i; ?></td>
     <td><?php echo $row["spices_name"] ?></td>
     <td><a href="spices.php?spid=<?php echo $row["spices_id"]; ?>" >Delete</a></td>
      <td><a href="spices.php?sid=<?php echo $row["spices_id"]; ?>" >edit</a></td>
      </tr>
     
     <?php
      }
     ?>
     
 </table>
</html>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>