<?php
include("../Assets/Connection/connection.php");
ob_start();
include("Head.php");
if(isset($_POST['btn_reply']))
{
	$reply=$_POST['txt_reply'];
	$upQry="update tbl_complaint set complaint_reply='$reply',complaint_status='1' where complaint_id=".$_GET['cid'];
	if($con->query($upQry))
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
      padding: 20px;
    }
    .form-container {
      max-width: 400px;
      margin: 0 auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .form-container h4 {
      text-align: center;
      margin-bottom: 20px;
    }
    .btn-reply {
      width: 100px;
    }
  </style>
</head>

<body>

<div class="container">
  <div class="form-container">
    <h4>Reply Form</h4>
    <form id="form1" name="form1" method="post" action="">
      <!-- Reply Input -->
      <div class="form-group mb-3">
        <label for="txt_reply" class="form-label">Reply</label>
        <input type="text" name="txt_reply" id="txt_reply" class="form-control" placeholder="Enter your reply" required />
      </div>

      <!-- Submit Button -->
      <div class="text-center">
        <button type="submit" name="btn_reply" id="btn_reply" class="btn btn-primary btn-reply">Reply</button>
      </div>
    </form>
  </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>