<?php
include("../ASSETS/connection/connection.php");
session_start();
ob_start();
include("Head.php");
$selQry="select * from tbl_company where company_id=".$_SESSION['cid'];
$result=$con->query($selQry);
$row=$result->fetch_assoc();
if(isset($_POST['btn_edit']))
{
$name=$_POST["txt_name"];
	$contact=$_POST["txt_contact"];
	$email=$_POST["txt_email"];
	$address=$_POST["txt_address"];
	$uid=$_SESSION['uid'];
	$upQry="update tbl_company  set company_name='$name', company_email='$email', company_contact='$contact', company_address='$address' where company_id=".$_SESSION['cid'];
	if($con->query($upQry))
	{
		echo"Updated";
		?>
        <script>
		window.location="EditProfile.php";
		</script>
        <?php
	}
}
		

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4OaXp2QnEJSwEXa2B3iLlAplgYIKfv56z6tk4s0GgdZj2g/4F4AvwOTw0mEqE6d1" crossorigin="anonymous">

  <style>
    body {
      background-color: #f8f9fa;
      padding: 20px;
    }
    .form-container {
      max-width: 600px;
      margin: 0 auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .form-container h3 {
      text-align: center;
      margin-bottom: 20px;
    }
    .form-group {
      margin-bottom: 1rem;
    }
    .form-container button {
      display: block;
      width: 100%;
    }
  </style>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4OaXp2QnEJSwEXa2B3iLlAplgYIKfv56z6tk4s0GgdZj2g/4F4AvwOTw0mEqE6d1" crossorigin="anonymous">

<style>
  body {
    background-color: #e3f2fd; /* Light blue background */
    padding: 20px;
  }
  .form-container {
    max-width: 500px; /* Medium size */
    margin: 0 auto;
    background-color: #ffffff; /* White background */
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Slightly darker shadow */
  }
  .form-container h3 {
    text-align: center;
    color: #0d6efd; /* Bootstrap primary blue */
    margin-bottom: 20px;
  }
  label {
    color: #495057; /* Dark gray for labels */
  }
  .btn-primary {
    background-color: #0d6efd; /* Custom blue button */
    border: none;
  }
  .btn-primary:hover {
    background-color: #0b5ed7; /* Darker blue on hover */
  }
  .form-container textarea, .form-container input {
    background-color: #f8f9fa; /* Light gray for input fields */
  }
</style>
</head>

<body>

<div class="container">
  <div class="form-container">
    <h3>Edit Company Profile</h3>
    <form id="form1" name="form1" method="post" action="">
      <div class="mb-3">
        <label for="txt_name" class="form-label">Name</label>
        <input type="text" class="form-control" name="txt_name" id="txt_name" value="<?php echo $row['company_name']; ?>" required>
      </div>

      <div class="mb-3">
        <label for="txt_email" class="form-label">Email</label>
        <input type="email" class="form-control" name="txt_email" id="txt_email" value="<?php echo $row['company_email']; ?>" required>
      </div>

      <div class="mb-3">
        <label for="txt_contact" class="form-label">Contact</label>
        <input type="text" class="form-control" name="txt_contact" id="txt_contact" value="<?php echo $row['company_contact']; ?>" required>
      </div>

      <div class="mb-3">
        <label for="txt_address" class="form-label">Address</label>
        <textarea class="form-control" name="txt_address" id="txt_address" cols="45" rows="4" required><?php echo $row['company_address']; ?></textarea>
      </div>

      <button type="submit" class="btn btn-primary" name="btn_edit" id="btn_edit">Edit</button>
    </form>
  </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-kgjVfLvOwO1wn5YIjrIprf4hH5qht27i5Mti2KnQKA7HYPXa9w14Wt4rYYAIe96g" crossorigin="anonymous"></script>
</body>
</html>