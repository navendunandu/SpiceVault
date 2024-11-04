<?php
include("../ASSETS/connection/connection.php");
session_start();
if(isset($_POST['btn_checkout']))
{
	$rate=$_POST['txt_rate'];
	$id=$_POST['txt_id'];
	$address=$_POST['txt_address'];
	$upsQry="update tbl_booking set booking_status='1',booking_amount='$rate',booking_date=curdate(), booking_address='".$address."' where booking_id='$id'";
	$con->query($upsQry);
	$upsQry="update tbl_cart set cart_status='1' where booking_id='$id'";
	$con->query($upsQry);
	header("location:Payment.php?bid=".$id);
	
}

if(isset($_GET["cid"]))
	{
		$delQry="delete from tbl_cart where cart_id=".$_GET["cid"];
		if($con->query($delQry))
		{
			?>
            <script>
			window.location="MyCart.php";
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .cart-table img {
      width: 100px;
      height: 100px;
      object-fit: cover;
    }
    .cart-container {
      margin-top: 50px;
    }
    .table thead th {
      text-align: center;
    }
    .table tbody td, .table tfoot td {
      vertical-align: middle;
      text-align: center;
    }
    .checkout-section {
      text-align: right;
    }
    .address-section {
      margin-top: 30px;
    }
  </style>
</head>
<body>
  <div class="container cart-container">
    <?php
    $i = 0;
    $total = 0;
    $bid = '';
    $checkout = 0;
    $selQry = "SELECT * FROM tbl_cart c INNER JOIN tbl_booking b ON c.booking_id = b.booking_id 
               INNER JOIN tbl_product p ON c.product_id = p.product_id 
               WHERE b.booking_status = 0 AND c.cart_status = 0 AND b.user_id = " . $_SESSION['uid'];
    $result = $con->query($selQry);

    if ($result->num_rows > 0) {
      ?>
      <form id="form1" name="form1" method="post" action="">
        <table class="table table-bordered table-striped cart-table">
          <thead class="thead-dark">
            <tr>
              <th>Sl No</th>
              <th>Photo</th>
              <th>Name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Total Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
              $bid = $row['booking_id'];
              $i++;
              $total = $row['product_price'] * $row['cart_quantity'];
              $checkout += $total;
              ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><img src="../ASSETS/files/Company/productphoto/<?php echo $row['product_photo']; ?>" class="img-thumbnail" /></td>
                <td><?php echo $row['product_name']; ?></td>
                <td>
                  <input type="number" class="form-control" name="txt_quantity" id="txt_quantity" value="<?php echo $row['cart_quantity']; ?>" 
                         onchange="TotalPrice(this.value, '<?php echo $row['cart_id'] ?>')" min="1">
                </td>
                <td><?php echo $row['product_price']; ?></td>
                <td><?php echo $total; ?></td>
				<input type="hidden" name="txt_id" value="<?php echo $bid; ?>">
                <td><a href="MyCart.php?cid=<?php echo $row['cart_id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
              </tr>
              <?php
            }

            // Calculate discount
            $selDisc = "SELECT MAX(dis_amount) as dis_amount, dis_percentage, dis_maxamount, dis_status 
                        FROM tbl_discount WHERE dis_status = 1 AND dis_amount <= " . $checkout;
            $discAmnt = 0;
            $resDisc = $con->query($selDisc);
            if ($dataDisc = $resDisc->fetch_assoc()) {
              $disperc = $dataDisc['dis_percentage'];
              $discMax = $dataDisc['dis_maxamount'];
              $discAmnt = $checkout * ($disperc / 100);
              $checkout -= ($discAmnt <= $discMax) ? $discAmnt : $discMax;
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4" class="checkout-section">Discount: <?php echo $discAmnt; ?></td>
              <td>Total Price:</td>
              <td colspan="2"><?php echo $checkout; ?></td>
            </tr>
            <tr>
              <td colspan="6" class="checkout-section">
                <button type="submit" name="btn_checkout" class="btn btn-primary">Checkout</button>
              </td>
            </tr>
          </tfoot>
        </table>
        
        <div class="address-section">
          <h5>Enter Shipping Address</h5>
          <textarea class="form-control" name="txt_address" rows="3"></textarea>
        </div>
        
      </form>
      <?php
    } else {
      echo "<h1 class='text-center'>No item in cart</h1>";
    }
    ?>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    function TotalPrice(qty, cid) {
      $.ajax({
        url: "../ASSETS/AjaxPages/Ajaxprice.php?qty=" + qty + "&cid=" + cid,
        success: function(result) {
          window.location.reload();
        }
      });
    }
  </script>
</body>
</html>