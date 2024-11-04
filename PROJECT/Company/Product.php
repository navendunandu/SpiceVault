
<?php
include("../Assets/connection/connection.php");
session_start();
ob_start();
include("Head.php");

if(isset($_POST['btn_submit']))
{
	
	$name=$_POST['txt_name'];
	$photo=$_FILES['file_photo']['name'];
	$tmpphoto=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($tmpphoto, '../ASSETS/files/Company/productphoto/'.$photo);
	$price=$_POST['txt_price'];
	$quantity=$_POST['txt_quantity'];
	$desc=$_POST['txt_description'];
	$category=$_POST['sel_category'];
	$subcat=$_POST['sel_subcat'];
	
	$InsQry = "insert into tbl_product(product_name,product_photo,product_price,product_quantity,product_description,subcat_id,company_id)
	values('$name','$photo','$price','$quantity','$desc','$subcat','".$_SESSION['sid']."')";
	
	if($con->query($InsQry))
	{
		echo "inserted";
	}
	else
	{
		echo "error";
	}
}
	if(isset($_GET["did"]))
	{
		$delQry="delete from tbl_product where product_id=".$_GET["did"];
		if($con->query($delQry))
		{
			?>
            <script>
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
<title>Untitled Document</title>
<style>
        body {
            background-color: #f8f9fa;
        }
        .container-m {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #343a40;
        }
        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 10px;
            text-align: center;
        }
        table img {
            border-radius: 5px;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            display: block;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container-m mt-5">
        <h2 class="mb-4">Add Product</h2>
        <form action="" method="post" enctype="multipart/form-data" id="form1">
            <div class="form-group">
                <label for="txt_name">Product Name</label>
                <input type="text" class="form-control" name="txt_name" id="txt_name" required />
            </div>
            <div class="form-group">
                <label for="file_photo">Product Photo</label>
                <input type="file" class="form-control-file" name="file_photo" id="file_photo" />
            </div>
            <div class="form-group">
                <label for="txt_price">Product Price</label>
                <input type="text" class="form-control" name="txt_price" id="txt_price" required />
            </div>
            <div class="form-group">
                <label for="txt_quantity">Product Quantity</label>
                <input type="text" class="form-control" name="txt_quantity" id="txt_quantity" required />
            </div>
            <div class="form-group">
                <label for="txt_description">Product Description</label>
                <textarea class="form-control" name="txt_description" id="txt_description" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="sel_category">Product Category</label>
                <select class="form-control" name="sel_category" id="sel_category" onchange="getsubcategory(this.value)">
                    <option value="">--select--</option>
                    <?php
                    $selQry = "SELECT * FROM tbl_category";
                    $result = $con->query($selQry);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["category_id"] . '">' . $row["category_name"] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="sel_subcat">Product Subcategory</label>
                <select class="form-control" name="sel_subcat" id="sel_subcat">
                    <option value="">--select--</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Submit</button>
        </form>

        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Product Name</th>
                    <th>Product Photo</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Product Description</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $selQry = "SELECT * FROM tbl_product p 
                           INNER JOIN tbl_subcategory s ON p.subcat_id = s.subcat_id 
                           INNER JOIN tbl_category c ON c.category_id = s.category_id";
                $result = $con->query($selQry);
                while ($row = $result->fetch_assoc()) {
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["product_name"]; ?></td>
                        <td><img src="../ASSETS/files/Company/productphoto/<?php echo $row["product_photo"]; ?>" height="100" width="100" /></td>
                        <td><?php echo $row["product_price"]; ?></td>
                        <td><?php echo $row["product_quantity"]; ?></td>
                        <td><?php echo $row["product_description"]; ?></td>
                        <td><?php echo $row["category_name"]; ?></td>
                        <td><?php echo $row["subcat_name"]; ?></td>
                        <td>
                            <a href="product.php?did=<?php echo $row['product_id']; ?>">Delete</a> |
                            <a href="stock.php?pid=<?php echo $row['product_id']; ?>">Add Stock</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getsubcategory(cid) {
    $.ajax({
      url: "../Assets/AjaxPages/Ajaxsubcat.php?cid=" + cid,
      success: function (result) {

        $("#sel_subcat").html(result);
      }
    });
  }

</script>
</html>
<?php
include("Foot.php");
ob_flush();
?>