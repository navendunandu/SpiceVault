<?php
include("../Assets/Connection/connection.php");
session_start();
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
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>

<<body>

<div class="container">
    <div class="table-container">
        <h2 class="text-center mb-4">Complaint List</h2>
        <form id="form1" name="form1" method="post" action="">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>Sl No.</th>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Product</th>
                        <th>File</th>
                        <th>Description</th>
                        <th>Reply</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=0;
                    $selQry="select * from tbl_complaint c inner join tbl_product p on p.product_id=c.product_id where c.user_id=".$_SESSION['uid'];
                    $result=$con->query($selQry);
                    while($row=$result->fetch_assoc())
                    {
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['complaint_date']; ?></td>
                        <td><?php echo $row['complaint_title']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><img src="../Assets/Files/User/Complaint/<?php echo $row['complaint_file']; ?>" class="img-fluid" /></td>
                        <td><?php echo $row['complaint_content']; ?></td>
                        <td>
                            <?php 
                            if($row['complaint_status']==0){
                                echo "Your complaint is not reviewed yet";
                            } else if($row['complaint_status']==1){
                                echo $row['complaint_reply'];
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>