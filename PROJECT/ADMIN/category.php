<?php
include("../ASSETS/connection/connection.php");
ob_start();
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$cat=$_POST["txt_name"];
	$insQry  = "insert into tbl_category(category_name) values('".$cat."')";
	if($con->query($insQry))
	{
		echo "Inserted";
	}
	else
	{
		echo "Error";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 30px;
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 500px; /* Medium size */
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .table-container {
            margin-top: 30px;
            max-width: 600px; /* Medium size */
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>


<body>

<div class="container">
    <div class="form-container">
        <form id="form1" name="form1" method="post" action="">
            <div class="mb-3">
                <label for="txt_name" class="form-label">Category Name</label>
                <input type="text" class="form-control" name="txt_name" id="txt_name" />
            </div>
            <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Submit</button>
            <button type="reset" class="btn btn-secondary" name="btn_clear" id="btn_clear">Clear</button>
        </form>
    </div>

    <div class="table-container">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $selQry = "select * from tbl_category";
                $result = $con->query($selQry);
                while ($row = $result->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["category_name"]; ?></td>
                    <td>
                        <a href="category.php?cid=<?php echo $row["category_id"]; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="category.php?did=<?php echo $row["category_id"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>