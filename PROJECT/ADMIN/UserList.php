<?php
include("../ASSETS/connection/connection.php");
ob_start();
include("Head.php");
$selQry="select *from tbl_user";
$result=$con->query($selQry);

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
      <td>Sl No</td>
      <td>Name</td>
      <td>Email</td>
      <td>Contact</td>
      <td>Address</td>
      <td>Place</td>
      <td>District</td>
      <td>Photo</td>
    </tr>
    <?php
	$selQry="select * from tbl_user u inner join tbl_place p on u. place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id";
	$result=$con->query($selQry);
	$i=0;
	while($row=$result->fetch_assoc())
	{
		$i++;
		?>
   <tr>
<td><?php echo $i;?></td>
<td><?php echo $row["user_name"];?></td>
<td><?php echo $row["user_email"];?></td>
<td><?php echo $row["user_contact"];?></td>
<td><?php echo $row["user_address"];?>></td>
<td><?php echo $row["place_name"];?></td>
<td><?php echo $row["district_name"];?></td>
<td><img src="../ASSETS/files/User/Photo/<?php echo $row['user_photo'];?>" height="100" width="100"/></td>
</tr>
<?php
	}
	?>
    
 
  </table>
</form>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>