<?php
include("../connection/connection.php");
$id=$_GET['cid'];
$qty=$_GET['qty'];
echo $upsQry="update tbl_cart set cart_quantity='$qty' where cart_id='$id'";
$con->query($upsQry);
$selQry="select * from tbl_product where "
?>