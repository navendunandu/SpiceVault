<?php
session_start();
include("../Assets/connection/connection.php");
ob_start();
include("Head.php");

if(isset($_POST['btn_submit']))
{
	$dis=$_POST['txt_discount'];
	$amt=$_POST['txt_amount'];
	$maxamt=$_POST['txt_maxamount'];
	$insQry="insert into tbl_discount(dis_percentage,dis_amount,dis_maxamount)values('$dis','$amt','$maxamt')";
	if($con->query($insQry))
	{
	}
	else
	{
		echo "ERROR";
	}
}
if(isset($_GET['aid']))
	{
		$upsQry="update tbl_discount set dis_status=1 where  dis_id=".$_GET['aid'];
		if($con->query($upsQry))
		{ echo "updated";
		}
		else
		{
			echo "error";
		}
	}
		if(isset($_GET['did']))
	{
		$upsQry="update tbl_discount set dis_status=0 where  dis_id=".$_GET['did'];
		if($con->query($upsQry))
		{ echo "updated";
		}
		else
		{
			echo "error";
		}
	}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
        }

        .table-wrapper {
            max-width: 100%;
            overflow-x: auto;
        }

        td, th {
            text-align: center;
            vertical-align: middle;
        }

        .btn {
            margin-right: 5px;
        }
    </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 600px; /* Reduce the container width */
        margin-top: 20px;
        padding: 15px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-size: 1.5rem; /* Make the title smaller */
        text-align: center;
        margin-bottom: 20px;
        color: #343a40;
    }

    .form-control {
        padding: 5px; /* Reduce padding in form fields */
    }

    .table-wrapper {
        max-width: 100%;
        overflow-x: auto;
    }

    td, th {
        text-align: center;
        padding: 5px; /* Reduce padding inside table cells */
    }

    .btn {
        padding: 5px 10px; /* Make buttons smaller */
        font-size: 0.9rem; /* Adjust font size for buttons */
    }
</style>
</head>

<body>
    <div class="container">
        <h2>Manage Discounts</h2>
        
        <!-- Discount Form -->
        <form id="form2" name="form2" method="post" action="">
            <div class="row mb-2">
                <label for="txt_discount" class="col-sm-4 col-form-label">Discount (%)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="txt_discount" id="txt_discount" placeholder="Enter discount percentage">
                </div>
            </div>

            <div class="row mb-2">
                <label for="txt_amount" class="col-sm-4 col-form-label">Amount</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="txt_amount" id="txt_amount" placeholder="Enter discount amount">
                </div>
            </div>

            <div class="row mb-2">
                <label for="txt_maxamount" class="col-sm-4 col-form-label">Max Amount</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="txt_maxamount" id="txt_maxamount" placeholder="Enter maximum discount amount">
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <button type="submit" name="btn_submit" id="btn_submit" class="btn btn-success btn-sm">Submit</button>
                </div>
            </div>
        </form>

        <!-- Discount Table -->
        <div class="table-wrapper mt-4">
            <table class="table table-bordered table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Sl No.</th>
                        <th>Discount (%)</th>
                        <th>Amount</th>
                        <th>Max Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $selQry = "SELECT * FROM tbl_discount";
                    $result = $con->query($selQry);
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['dis_percentage']; ?>%</td>
                        <td><?php echo $row['dis_amount']; ?></td>
                        <td><?php echo $row['dis_maxamount']; ?></td>
                        <td>
                            <?php
                            if ($row['dis_status'] == 0) {
                                echo "Inactive";
                            } else if ($row['dis_status'] == 1) {
                                echo "Active";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($row['dis_status'] == 0) {
                            ?>
                                <a href="Discount.php?aid=<?php echo $row['dis_id']; ?>" class="btn btn-sm btn-success">Activate</a>
                            <?php
                            } else if ($row['dis_status'] == 1) {
                            ?>
                                <a href="Discount.php?did=<?php echo $row['dis_id']; ?>" class="btn btn-sm btn-danger">Deactivate</a>
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

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>