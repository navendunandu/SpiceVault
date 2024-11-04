<?php
include("../Assets/connection/connection.php");
if(isset($_POST['btn_submit']))
{
	
	$name=$_POST['txt_Name'];
	$email=$_POST['txt_Email'];
	$contact=$_POST['txt_contact'];
	$address=$_POST['txt_address'];
	$district=$_POST['scl_district'];
	$place=$_POST['sel_place'];
	$logo=$_FILES['file_logo']['name'];
	$templogo=$_FILES['file_logo']['tmp_name'];
	move_uploaded_file($templogo, '../ASSETS/files/Company/logo/'.$logo);
	$proof=$_FILES['file_proof']['name'];
	$tempproof=$_FILES['file_proof']['tmp_name'];
	move_uploaded_file($tempproof, '../ASSETS/files/Company/proof/'.$proof);
	$password=$_POST['txt_Password'];
	$cpassword=$_POST['txt_cpassword'];
	
	$InsQry = "insert into tbl_company(company_name,company_email,company_contact,company_address,place_id,company_logo,company_proof,company_password)
	values('$name','$email','$contact','$address','$place','$logo','$proof','$password')";
	
	if($con->query($InsQry))
	{
		echo "inserted";
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
      background-color: #f0f2f5;
      padding: 20px;
    }
    .form-container {
      max-width: 600px;
      margin: 50px auto;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .form-container h3 {
      margin-bottom: 20px;
      text-align: center;
    }
  </style>

</head>

<<body>
  <div class="container">
    <div class="form-container">
      <h3>Registration Form</h3>
      <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <div class="mb-3">
          <label for="txt_Name" class="form-label">Name</label>
          <input type="text" class="form-control" name="txt_Name" id="txt_Name" placeholder="Enter your name">
        </div>

        <div class="mb-3">
          <label for="txt_Email" class="form-label">Email</label>
          <input type="email" class="form-control" name="txt_Email" id="txt_Email" placeholder="Enter your email">
        </div>

        <div class="mb-3">
          <label for="txt_contact" class="form-label">Contact</label>
          <input type="text" class="form-control" name="txt_contact" id="txt_contact" placeholder="Enter your contact number">
        </div>

        <div class="mb-3">
          <label for="txt_address" class="form-label">Address</label>
          <textarea class="form-control" name="txt_address" id="txt_address" rows="3" placeholder="Enter your address"></textarea>
        </div>

        <div class="mb-3">
          <label for="scl_district" class="form-label">District</label>
          <select class="form-select" name="scl_district" id="scl_district" onchange="getPlace(this.value)">
            <option value="">--select--</option>
            <?php
            $selQry = "SELECT * FROM tbl_district";
            $row = $con->query($selQry);
            while ($data = $row->fetch_assoc()) {
              ?>
              <option value="<?php echo $data['district_id']; ?>"><?php echo $data['district_name']; ?></option>
              <?php
            }
            ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="sel_place" class="form-label">Place</label>
          <select class="form-select" name="sel_place" id="sel_place">
            <option>--select--</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="file_logo" class="form-label">Logo</label>
          <input type="file" class="form-control" name="file_logo" id="file_logo">
        </div>

        <div class="mb-3">
          <label for="file_proof" class="form-label">Proof</label>
          <input type="file" class="form-control" name="file_proof" id="file_proof">
        </div>

        <div class="mb-3">
          <label for="txt_Password" class="form-label">Password</label>
          <input type="password" class="form-control" name="txt_Password" id="txt_Password" placeholder="Enter your password">
        </div>

        <div class="mb-3">
          <label for="txt_cpassword" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" name="txt_cpassword" id="txt_cpassword" placeholder="Confirm your password">
        </div>

        <div class="d-grid">
          <button type="submit" name="btn_submit" class="btn btn-primary">Register</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="../Assets/JQ/jQuery.js"></script>
  <script>
    function getPlace(did) {
      $.ajax({
        url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
        success: function (result) {
          $("#sel_place").html(result);
        }
      });
    }
  </script>
</body>
</html>
