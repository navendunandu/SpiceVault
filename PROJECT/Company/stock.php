<?php
session_start();
include("../Assets/connection/connection.php");
ob_start();
include("Head.php");
if(isset($_POST['btn_submit']))
{
	
	
    $pid=$_GET['pid'];
    $stock=$_POST["txt_stock_quantity"];
	$InsQry = "insert into tbl_stock(stock_quantity,stock_date,product_id)values('$stock',curdate(),'$pid')";
	if($con->query($InsQry))
	{
		?>
        <script>
		//alert("inserted");
		//window.location="stock.php";
		</script>
        <?php
	}
	else

	{
		echo "error";
	}
}
	if(isset($_GET["did"]))
	{
		$delQry="delete from tbl_stock where stock_id=".$_GET["did"];
		if($con->query($delQry))
		{
			?>
            <script>
			alert("deleted");
		
			window.location="Product.php";
			</script>
            <?php
		}

}
	

?>
            
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<style>
  body {
	background-color: #f8f9fa;
  }
  .form-container {
	margin-top: 50px;
  }
  .form-container table {
	width: 100%;
  }
  .table {
	margin-top: 20px;
  }
  .form-container td, .form-container th {
	padding: 15px;
  }
  .form-container input[type="submit"] {
	width: 100px;
  }
  .form-title {
	text-align: center;
	margin-bottom: 20px;
  }
</style>

</head>
<body>
  <div class="container form-container">
    <h2 class="form-title">Stock Management Form</h2>
    <form id="form1" name="form1" method="post" action="">
      <table class="table table-bordered">
        <tr>
          <td>Stock Quantity</td>
          <td><input type="text" name="txt_stock_quantity" id="txt_stock_quantity" class="form-control" /></td>
        </tr>
        <tr>
          <td colspan="2">
            <center>
              <input type="submit" name="btn_submit" id="btn_submit" value="Submit" class="btn btn-primary"/>
            </center>
          </td>
        </tr>
      </table>

      <!-- Stock Table -->
      <table class="table table-striped table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>Sl No</th>
            <th>Date</th>
            <th>Quantity</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $selqry = "select * from tbl_stock";
            $result = $con->query($selqry);
            $i = 0;
            while ($data = $result->fetch_assoc()) {
              $i++;
          ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data["stock_date"]; ?></td>
            <td><?php echo $data["stock_quantity"]; ?></td>
            <td><a href="stock.php?did=<?php echo $data['stock_id'];?>" class="btn btn-danger btn-sm">Delete</a></td>
          </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
    </form>
  </div>

  <!-- Bootstrap JS and dependencies (Optional for Bootstrap's JS plugins) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>