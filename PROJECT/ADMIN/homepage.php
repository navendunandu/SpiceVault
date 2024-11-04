<?php
include("../ASSETS/connection/connection.php");
ob_start();
include("Head.php");
?>
            
            
          <div class="row">
  <div class="col-lg-12 d-flex grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-wrap justify-content-between">
          <h4 class="card-title mb-3">Order Details</h4>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Sl.No</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Price</th>
                <th>User</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 0;
              $selQry = "SELECT * FROM tbl_booking b 
                          INNER JOIN tbl_cart c ON b.booking_id=c.booking_id 
                          INNER JOIN tbl_product p ON p.product_id=c.product_id 
                          INNER JOIN tbl_user u on u.user_id=b.user_id
                          WHERE b.booking_status >= '2' LIMIT 10";
              $result = $con->query($selQry);
              while ($row = $result->fetch_assoc()) {
                $i++;
              ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td>
                  <img src="../ASSETS/files/Company/productphoto/<?php echo $row['product_photo']; ?>" 
                       class="img-sm" alt="Product Image" height="50" />
                </td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['cart_quantity']; ?></td>
                <td><?php echo '$' . number_format($row['product_price'], 2); ?></td>
                <td><?php echo '$' . number_format($row['product_price'] * $row['cart_quantity'], 2); ?></td>
                <td><?php echo $row['user_name']; ?></td>
                <td>
                  <?php
                  if ($row['booking_status'] == 1) {
                    echo "Order is being packed";
                  } else if ($row['cart_status'] == 2) {
                    echo "Order packed";
                  } else if ($row['cart_status'] == 3) {
                    echo "Order shipped";
                  } else if ($row['cart_status'] == 4) {
                    echo "Delivered";
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
    </div>
  </div>
</div>
<?php
include("Foot.php");
ob_flush();
?>
          