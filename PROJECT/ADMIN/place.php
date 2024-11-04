<?php
include("../ASSETS/connection/connection.php");
ob_start();
include("Head.php");

if (isset($_POST['btn_submit'])) {
    $pname = $_POST["txt_place"];
    $did = $_POST["sel_dis"];
    $insQry = "insert into tbl_place(place_name,district_id) values('$pname','$did')";
    if ($con->query($insQry)) {
        echo "<div class='notification success'>Place inserted successfully!</div>";
    } else {
        echo "<div class='notification error'>Error inserting place. Please try again.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Places</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"], select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"], input[type="reset"] {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
        }
        input[type="reset"] {
            background-color: #f44336;
            color: white;
        }
        .notification {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Places</h1>
        <form id="form1" name="form1" method="post" action="">
            <div class="form-group">
                <label for="sel_dis">Select District</label>
                <select name="sel_dis" id="sel_dis">
                    <option value="">--Select--</option>
                    <?php
                    $selQry = "select * from tbl_district";
                    $result = $con->query($selQry);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row["district_id"]; ?>"><?php echo $row["district_name"]; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="txt_place">Place Name</label>
                <input type="text" name="txt_place" id="txt_place" />
            </div>
            <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
            <input type="reset" name="btn_clear" id="btn_clear" value="Clear" />
        </form>

        <table>
            <tr>
                <th>District Name</th>
                <th>Place Name</th>
            </tr>
            <?php
            $selQry = "select tbl_place.*, tbl_district.district_name from tbl_place inner join tbl_district on tbl_place.district_id=tbl_district.district_id";
            $result = $con->query($selQry);
            while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row["district_name"]; ?></td>
                <td><?php echo $row["place_name"]; ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>
