<?php
include("../ASSETS/connection/connection.php");
ob_start();
include("Head.php");

if(isset($_POST['btn_submit']))
{
	$dis=$_POST["txt_dis"];
	$id=$_POST["txt_id"];
	if($id!='')
	{
		$upQry="update tbl_district set district_name='$dis' where district_id='$id'";
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
		
	$insQry ="insert into tbl_district(district_name) values('".$dis."')";
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
	
	if(isset($_GET["did"]))
	{
		$delQry="delete from tbl_district where district_id=".$_GET["did"];
		if($con->query($delQry))
		{
			?>
            <script>
			window.location="district.php";
			</script>
            <?php
		}
		}
$did='';
$dname='';

if(isset($_GET["eid"]))
{
	$selQry= " select * from tbl_district where district_id='". $_GET['eid']."'";
	$row=$con->query($selQry);
	$data=$row->fetch_assoc();
	$did=$data['district_id'];
	$dname=$data['district_name'];
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
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .table-container {
            margin-top: 40px;
        }
    </style>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 400px; /* Smaller width for the form */
            margin: 0 auto;
            background: #ffffff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .table-container {
            margin-top: 20px;
            max-width: 500px; /* Smaller width for the table */
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
                <label for="txt_dis" class="form-label">District Name</label>
                <input type="text" class="form-control form-control-sm" name="txt_dis" id="txt_dis" value="<?php echo $dname; ?>" />
                <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $did; ?>" />
            </div>
            <button type="submit" class="btn btn-primary btn-sm" name="btn_submit" id="btn_submit">Submit</button>
            <button type="reset" class="btn btn-secondary btn-sm" name="btn_clear" id="btn_clear">Clear</button>
        </form>
    </div>

    <div class="table-container">
        <table class="table table-sm table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>District</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $selQry = "select * from tbl_district";
                $result = $con->query($selQry);
                while ($row = $result->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["district_name"]; ?></td>
                    <td>
                        <a href="district.php?did=<?php echo $row["district_id"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                        <a href="district.php?eid=<?php echo $row["district_id"]; ?>" class="btn btn-warning btn-sm">Edit</a>
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