<?php
include("../ASSETS/connection/connection.php");
ob_start();
include("Head.php");
$selQry="select *from tbl_company";
$result=$con->query($selQry);
$row=$result->fetch_assoc();


	if(isset($_GET['rid']))
	{
		$upsQry="update tbl_company set company_vstatus=2 where  company_id=".$_GET['rid'];
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 30px;
            background-color: #f8f9fa;
        }
        .table-container {
            margin-top: 30px;
            max-width: 1000px; /* Moderate width */
            margin-left: auto;
            margin-right: auto;
        }
        .table th, .table td {
            vertical-align: middle; /* Center align the content */
        }
        .company-logo {
            width: 80px;
            height: 80px;
            object-fit: cover; /* Ensure image fits within the dimensions */
            border-radius: 8px;
        }
		</style>
</head>

<body>

<div class="container">
    <div class="table-container">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Sl No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Place</th>
                    <th>District</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selQry = "SELECT * FROM tbl_company u 
                           INNER JOIN tbl_place p ON u.place_id = p.place_id 
                           INNER JOIN tbl_district d ON p.district_id = d.district_id 
                           WHERE company_vstatus = '1'";
                $result = $con->query($selQry);
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["company_name"]; ?></td>
                    <td><?php echo $row["company_email"]; ?></td>
                    <td><?php echo $row["company_contact"]; ?></td>
                    <td><?php echo $row["company_address"]; ?></td>
                    <td><?php echo $row["place_name"]; ?></td>
                    <td><?php echo $row["district_name"]; ?></td>
                    <td><img src="../ASSETS/files/Company/Logo/<?php echo $row['company_logo']; ?>" class="company-logo" /></td>
                    <td>
                        <a href="AcceptCompanyList.php?rid=<?php echo $row['company_id']; ?>" class="btn btn-danger btn-sm">Reject</a>
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
