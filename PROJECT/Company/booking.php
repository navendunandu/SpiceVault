<?php
include("../ASSETS/connection/connection.php");
session_start();
if(isset( $_GET['cid']))
{
	$id=$_GET['cid'];
	$stat=$_GET['stat'];
	$upsQry="update tbl_cart set cart_status='$stat' where cart_id='$id'";
	$con->query($upsQry);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: white;
            padding: 20px;
            margin-top: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
        }

        table img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .btn {
            margin-right: 5px;
        }

        td, th {
            text-align: center;
            vertical-align: middle;
        }

        .table-wrapper {
            max-width: 100%;
            overflow-x: auto;
        }

    </style>
</head>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: white;
            padding: 20px;
            margin-top: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
        }

        table img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .btn {
            margin-right: 5px;
        }

        td, th {
            text-align: center;
            vertical-align: middle;
        }

        .table-wrapper {
            max-width: 100%;
            overflow-x: auto;
        }

    </style>
</head>

<body>
  <div class="container">
    <h2>Booking Details</h2>
    <div class="table-wrapper">
      <table class="table table-bordered table-hover table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th>Sl No</th>
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
          $selQry = "select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_product p on p.product_id=c.product_id inner join tbl_company m on m.company_id=m.company_id where m.company_id=" . $_SESSION['cid'];
          $result = $con->query($selQry);
          while ($row = $result->fetch_assoc()) {
            $i++;
          ?> 
          <tr>
            <td><?php echo $i; ?></td>
            <td><img src="../ASSETS/files/Company/productphoto/<?php echo $row['product_photo']; ?>" alt="Product"/></td>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['cart_quantity']; ?></td>
            <td><?php echo $row['product_price']; ?></td>
            <td><?php echo $row['product_price'] * $row['cart_quantity']; ?></td>
            <td>
              <?php
              if ($row['cart_status'] == 1) {
                echo "Payment Received";
              } else if ($row['cart_status'] == 2) {
                echo "Order Packed";
              } else if ($row['cart_status'] == 3) {
                $SelDa = "SELECT * FROM tbl_cart c INNER JOIN tbl_deliveryagent d on d.deliveryagent_id=c.deliveryagent_id WHERE c.cart_id=" . $row['cart_id'];
                $resDa = $con->query($SelDa);
                $dataDa = $resDa->fetch_assoc();
                echo "Order Assigned to " . $dataDa['deliveryagent_name'];
              } else if ($row['cart_status'] == 4) {
                echo "Order Shipped";
              } else if ($row['cart_status'] == 5) {
                echo "Delivered";
              }
              ?>
            </td>
            <td>
              <?php
              if ($row['cart_status'] == 1) {
              ?>
                <a href="booking.php?cid=<?php echo $row['cart_id'] ?>&stat=2" class="btn btn-warning btn-sm">Packed</a>
              <?php
              }
              if ($row['cart_status'] == 2) {
              ?>
                <a href="AssignDeliveryAgent.php?id=<?php echo $row['cart_id']; ?>" class="btn btn-primary btn-sm">Assign Order</a>
              <?php
              }
              if ($row['cart_status'] == 3) {
              ?>
                <a href="booking.php?cid=<?php echo $row['cart_id'] ?>&stat=4" class="btn btn-info btn-sm">Shipped</a>
              <?php
              }
              if ($row['cart_status'] == 4) {
              ?>
                <a href="booking.php?cid=<?php echo $row['cart_id'] ?>&stat=5" class="btn btn-success btn-sm">Delivered</a>
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