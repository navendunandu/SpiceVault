<?php
include("../ASSETS/connection/connection.php");
session_start();
if(isset($_POST['btn_submit']))
{
	$title=$_POST['txt_title'];
	$des=$_POST['txt_des'];
	$file=$_FILES['file_complaint']['name'];
	$tmpfile=$_FILES['file_complaint']['tmp_name'];
	move_uploaded_file($tmpfile, '../ASSETS/files/user/complaint/'.$file);
	$pid=$_GET['pid'];
	$uid=$_SESSION['uid'];
	$insQry="insert into tbl_complaint(complaint_title,complaint_content,complaint_date,user_id,product_id,complaint_file)values ('$title','$des',curdate(),'$uid','$pid','$file')";
	if($con->query($insQry))
	{
	}
	else
	{
		echo "ERROR";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        .form-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-group input[type="text"],
        .form-group textarea,
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form-group textarea {
            resize: vertical;
            height: 100px;
        }

        .form-group input[type="file"] {
            border: none;
            padding: 0;
        }

        .form-group button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
<title>Untitled Document</title>
</head>

<body>
    <div class="form-container">
        <h2>Submit Your Complaint</h2>
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <div class="form-group">
                <label for="txt_title">Title</label>
                <input type="text" name="txt_title" id="txt_title" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="txt_des">Description</label>
                <textarea name="txt_des" id="txt_des" cols="45" rows="5" placeholder="Enter description"></textarea>
            </div>
            <div class="form-group">
                <label for="file_complaint">File</label>
                <input type="file" name="file_complaint" id="file_complaint">
            </div>
            <div class="form-group">
                <button type="submit" name="btn_submit" id="btn_submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>