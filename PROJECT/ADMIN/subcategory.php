<?php
include("../ASSETS/connection/connection.php");
ob_start();
include("Head.php");
if(isset($_POST['btn_add']))
{
	$sub=$_POST["txt_subcat"];
	$id=$_POST["txt_subid"];
	$catid=$_POST["sel_cat"];
	if($id!='')
	{
		$upQry="update tbl_subcategory set subcat_name='$sub' where subcat_id='$id'";
		if($con->query($upQry))
		{
			echo "updated";
		}
			else
			{
				echo"error";
			}
	}
	else
	{
		
	$insQry ="insert into tbl_subcategory(subcat_name,category_id) values('$sub','$catid')";
	if($con->query($insQry))
	{
		echo "inserted";
	}
	else
	{
		echo "error";
	}
}
	
}
	if(isset($_GET["sid"]))
	{
		$delQry="delete from tbl_subcategory where subcat_id=".$_GET["sid"];
		if($con->query($delQry))
		{
			?>
            <script>
			window.location="subcategory.php";
			</script>
            <?php
		}
		}
$sid='';
$sname='';

if(isset($_GET["eid"]))
{
	$selQry= " select * from tbl_subcategory where subcat_id='". $_GET['eid']."'";
	$row=$con->query($selQry);
	$data=$row->fetch_assoc();
	$sid=$data['subcat_id'];
	$sname=$data['subcat_name'];
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
            padding: 20px;
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 600px; /* Medium width */
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .table-container {
            margin-top: 30px;
            max-width: 800px; /* Medium width */
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<<body>

<div class="container">
    <div class="form-container">
        <form id="form1" name="form1" method="post" action="">
            <div class="mb-3">
                <label for="sel_cat" class="form-label">Category</label>
                <select name="sel_cat" id="sel_cat" class="form-select">
                    <option>--select--</option>
                    <?php
                    $selQry = "select * from tbl_category";
                    $result = $con->query($selQry);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row["category_id"]; ?>"><?php echo $row["category_name"]; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="txt_subcat" class="form-label">Subcategory</label>
                <input type="text" class="form-control" name="txt_subcat" id="txt_subcat" value="<?php echo $sname; ?>" />
                <input type="hidden" name="txt_subid" id="txt_subid" value="<?php echo $sid; ?>" />
            </div>
            <button type="submit" class="btn btn-primary" name="btn_add" id="btn_add">Add</button>
        </form>
    </div>

    <div class="table-container">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Sl No.</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $selQry = "SELECT tbl_subcategory.*, tbl_category.category_name 
                           FROM tbl_subcategory 
                           INNER JOIN tbl_category 
                           ON tbl_subcategory.category_id = tbl_category.category_id";
                $result = $con->query($selQry);
                while ($row = $result->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["category_name"]; ?></td>
                    <td><?php echo $row["subcat_name"]; ?></td>
                    <td>
                        <a href="subcategory.php?sid=<?php echo $row["subcat_id"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                        <a href="subcategory.php?eid=<?php echo $row["subcat_id"]; ?>" class="btn btn-warning btn-sm">Edit</a>
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