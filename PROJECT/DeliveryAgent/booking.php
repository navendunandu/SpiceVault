<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

  <table width="200" border="1">
    <tr>
      <td>Sl.No</td>
      <td>Photo</td>
      <td>Name</td>
      <td>Quantity</td>
      <td>Price</td>
      <td>Total Price</td>
      <td>Status</td>
      <td>Action</td>
    </tr>
     <?php
	$i=0;
	
	$selQry="select * from tbl_booking b inner join tbl_cart c on b.booking_id=c.booking_id inner join tbl_product p on p.product_id=c.product_id where b.booking_status>='2' and d.delivery_id=".$_SESSION['did'];
	 $result=$con->query($selQry);
	 while($row=$result->fetch_assoc())
	 {
		 $i++;
	?>
    <tr>
      <td><?php echo $i;?></td>
      <td><img src="../Assets/Files/Seller/Productdocs/<?php echo $row['product_photo'];?>"  height="200"/></td>
      <td><?php echo $row['product_name'];?></td>
      <td><?php echo $row['cart_quantity'];?></td>
      <td><?php echo $row['product_price'];?></td>
      <td><?php echo $row['product_price']*$row['cart_quantity'];?></td>
      <td><?php if($row['booking_status']==1){
		  echo "Order is being packed";
	  }else if ($row['cart_status']==2)
	  {
		  echo"order packed";
	  }else if ($row['cart_status']==3)
	  {
		  echo"order shipped";
	  }else if ($row['cart_status']==4)
	  {
		  echo "Delivered";
	  }
	  ?></td>
      
       <td> <a href="PostComplaint.php?pid=<?php echo $row['product_id'];?>">Complaint</a></td></tr>
   
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