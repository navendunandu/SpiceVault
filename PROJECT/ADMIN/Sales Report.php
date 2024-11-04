
<?php
include("../Assets/Connection/Connection.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px; /* Set a max-width for the container */
            margin-top: 30px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 1.5rem; /* Adjust the title size */
            margin-bottom: 20px;
            text-align: center;
            color: #343a40;
        }

        .form-control {
            width: 100%; /* Make inputs take full width */
        }

        table {
            width: 100%; /* Set table to full width */
            margin-top: 20px;
            margin-bottom: 20px;
        }

        td, th {
            padding: 10px;
            text-align: center;
            vertical-align: middle;
        }

        .table img {
            width: 100px; /* Adjust image size */
            height: auto;
            object-fit: cover;
            border-radius: 5px;
        }

        .btn-submit {
            display: block;
            width: 100%;
            font-size: 1rem;
            padding: 10px;
        }

        .table th {
            background-color: #343a40;
            color: white;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e0f7fa; /* Light teal background */
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px; /* Set a max-width for the container */
            margin-top: 30px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            text-align: center;
            color: #00796b; /* Teal color for the heading */
        }

        .form-control {
            width: 100%; /* Make inputs take full width */
        }

        table {
            width: 100%;
            margin-top: 20px;
            margin-bottom: 20px;
            background-color: white;
        }

        td, th {
            padding: 10px;
            text-align: center;
            vertical-align: middle;
        }

        .table img {
            width: 100px;
            height: auto;
            object-fit: cover;
            border-radius: 5px;
        }

        .btn-submit {
            display: block;
            width: 100%;
            background-color: #00796b; /* Teal button */
            border: none;
            color: white;
            padding: 10px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #004d40; /* Darker teal on hover */
        }

        .table th {
            background-color: #00796b; /* Teal header */
            color: white;
        }

        .table tbody tr:nth-child(even) {
            background-color: #e0f2f1; /* Light teal for alternate rows */
        }

        .alert-warning {
            background-color: #fdd835;
            color: black;
            padding: 15px;
            border-radius: 5px;
        }
    </style>

</head>

<body>

<div class="container">
    <h2>Sales Report</h2>
    <form id="form1" name="form1" method="post" action="">
        <div class="row">
            <div class="col-md-6">
                <label for="txt_start" class="form-label">Start Date</label>
                <input type="date" class="form-control" name="txt_start" max="<?php echo Date('Y-m-d') ?>" id="txt_start">
            </div>
            <div class="col-md-6">
                <label for="txt_end" class="form-label">End Date</label>
                <input type="date" class="form-control" name="txt_end" max="<?php echo Date('Y-m-d') ?>" id="txt_end">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <input type="submit" class="btn btn-submit" name="btn_submit" id="btn_submit" value="Submit">
            </div>
        </div>
    </form>

    <?php
    if (isset($_POST['btn_submit'])) {
        $start = $_POST['txt_start'];
        $end = $_POST['txt_end'];
        $SelQry = "SELECT * FROM tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id INNER JOIN tbl_product p on p.product_id=c.product_id where b.booking_date BETWEEN '$start' and '$end'";
        $result = $con->query($SelQry);
        $i = 0;
        if ($result->num_rows > 0) {
            echo '<table class="table table-bordered table-striped table-hover">';
            echo '<thead><tr><th>Sl No.</th><th>Product</th><th>Photo</th><th>Price</th><th>Quantity</th></tr></thead>';
            echo '<tbody>';
            while ($row = $result->fetch_assoc()) {
                $i++;
                echo '<tr>';
                echo '<td>' . $i . '</td>';
                echo '<td>' . $row['product_name'] . '</td>';
                echo '<td><img src="../Assets/Files/Company/productphoto/' . $row["product_photo"] . '" alt="Product Image"></td>';
                echo '<td>$' . $row['product_price'] . '</td>';
                echo '<td>' . $row['cart_quantity'] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<div class="alert alert-warning">No records found for the selected date range.</div>';
        }
    }
    ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>