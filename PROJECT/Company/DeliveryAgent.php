<?php
session_start();
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");


if(isset($_POST["btn_submit"]))
{
	$companyidid=$_SESSION['cid'];
	$name=$_POST["txt_name"];
	$gender=$_POST["rd_gender"];
	$contact=$_POST["txt_contact"];
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"];
	$confirm=$_POST["txt_confirm"];
	
	
	$photo=$_FILES['file_photo']['name'];
	$tempphoto=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($tempphoto, '../Assets/Files/delivery/'.$photo);
	

	$insQry="insert into tbl_deliveryagent(company_id,deliveryagent_name,deliveryagent_gender,deliveryagent_email,deliveryagent_password,deliveryagent_photo,deliveryagent_contact)VALUES ('$companyidid','$name','$gender','$email','$password','$photo','$contact')";
	
	if($con-> query($insQry))
	{
	?>
		<script>
			alert("inserted");
			//window.location="SellerRegistration.php";
		</script>
		<?php
	}
	else
	{
		echo "Error";
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NewUser</title>
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
  .form-container h2 {
    text-align: center;
    margin-bottom: 20px;
  }
  .btn-submit, .btn-cancel {
    width: 120px;
  }
</style>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
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
  .form-container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #007bff;
  }
  .btn-submit, .btn-cancel {
    width: 120px;
  }
  .form-label {
    font-weight: bold;
    color: #495057;
  }
</style>
</head> <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
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
  .form-container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #007bff;
  }
  .btn-submit, .btn-cancel {
    width: 120px;
  }
  .form-label {
    font-weight: bold;
    color: #495057;
  }
</style>
</head>
  <body>
<div class="container">
  <div class="form-container">
    <h2>Registration Form</h2>
    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
      
      <!-- Name -->
      <div class="mb-3">
        <label for="txt_name" class="form-label">Name</label>
        <input type="text" class="form-control" name="txt_name" id="txt_name" placeholder="Enter your name" required>
      </div>

      <!-- Gender -->
      <div class="mb-3">
        <label class="form-label">Gender</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="rd_gender" id="rd_gender_male" value="Male" required>
          <label class="form-check-label" for="rd_gender_male">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="rd_gender" id="rd_gender_female" value="Female" required>
          <label class="form-check-label" for="rd_gender_female">Female</label>
        </div>
      </div>

      <!-- Contact -->
      <div class="mb-3">
        <label for="txt_contact" class="form-label">Contact</label>
        <input type="text" class="form-control" name="txt_contact" id="txt_contact" placeholder="Enter your contact number" required>
      </div>

      <!-- Email -->
      <div class="mb-3">
        <label for="txt_email" class="form-label">Email</label>
        <input type="email" class="form-control" name="txt_email" id="txt_email" placeholder="Enter your email" required>
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label for="txt_password" class="form-label">Password</label>
        <input type="password" class="form-control" name="txt_password" id="txt_password" placeholder="Enter your password" required>
      </div>

      <!-- Confirm Password -->
      <div class="mb-3">
        <label for="txt_confirm" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="txt_confirm" id="txt_confirm" placeholder="Confirm your password" required>
      </div>

      <!-- Photo Upload -->
      <div class="mb-3">
        <label for="file_photo" class="form-label">Photo</label>
        <input class="form-control" type="file" name="file_photo" id="file_photo" required>
      </div>

      <!-- Submit and Cancel Buttons -->
      <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary btn-submit me-2" id="btn_submit" name="btn_submit">Submit</button>
        <button type="reset" class="btn btn-secondary btn-cancel" id="btn_cancel">Cancel</button>
      </div>
      
    </form>
  </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-kgjVfLvOwO1wn5YIjrIprf4hH5qht27i5Mti2KnQKA7HYPXa9w14Wt4rYYAIe96g" crossorigin="anonymous"></script>

</body>
</html>

<?php


include("Foot.php");
ob_flush();
?>