<?php
include("../Assets/Connection/Connection.php");
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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4OaXp2QnEJSwEXa2B3iLlAplgYIKfv56z6tk4s0GgdZj2g/4F4AvwOTw0mEqE6d1" crossorigin="anonymous">
  
</head>
</head>
<body>

<div class="container">
  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>Sl.No</th>
          <th>Photo</th>
          <th>Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total Price</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 0;
        $selQry = "select * from tbl_booking b inner join tbl_cart c on b.booking_id=c.booking_id inner join tbl_product p on p.product_id=c.product_id where b.booking_status>='2' and b.user_id=".$_SESSION['uid'];
        $result = $con->query($selQry);
        while ($row = $result->fetch_assoc()) {
            $i++;
        ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><img src="../ASSETS/files/Company/productphoto/<?php echo $row['product_photo']; ?>" alt="Product Image" width="100px"/></td>
          <td><?php echo $row['product_name']; ?></td>
          <td><?php echo $row['cart_quantity']; ?></td>
          <td><?php echo $row['product_price']; ?></td>
          <td><?php echo $row['product_price'] * $row['cart_quantity']; ?></td>
          <td>
            <span class="status-label">
              <?php
              if ($row['booking_status'] == 1) {
                echo "Order is being packed";
              } elseif ($row['cart_status'] == 2) {
                echo "Order packed";
              } elseif ($row['cart_status'] == 3) {
                echo "Order shipped";
              } elseif ($row['cart_status'] == 4) {
                echo "Delivered";
              }
              ?>
            </span>
          </td>
          <td>
            <?php
            if($row['cart_status']>=4){
            ?>
            <a href="PostComplaint.php?pid=<?php echo $row['product_id']; ?>" class="btn btn-danger btn-sm complaint-btn">Complaint</a>
            <a href="Rating.php?pid=<?php echo $row['product_id']; ?>" class="btn btn-success btn-sm rating-btn">Rating</a>
            <a href="Bill.php?id=<?php echo $row['cart_id']; ?>" class="btn btn-success btn-sm rating-btn">View Bill</a>
            <?php
}
            ?>
          </td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>