<?php
include("../Assets/connection/connection.php");

if(isset($_POST['btn_register']))
{
	
	$name=$_POST['txt_name'];
	$email=$_POST['txt_email'];
	$contact=$_POST['txt_contact'];
	$address=$_POST['txt_address'];
	$place=$_POST['sel_place'];
	$photo=$_FILES['file_photo']['name'];
	$tmpphoto=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($tmpphoto, '../ASSETS/files/User/Photo/'.$photo);
	
	$password=$_POST['txt_password'];
	$cpassword=$_POST['txt_cpassword'];
	
	$InsQry = "insert into tbl_user(user_name,user_email,user_contact,user_address,place_id,user_photo,user_password)
	values('$name','$email','$contact','$address','$place','$photo','$password')";
	
	if($con->query($InsQry))
	{
		echo "inserted";
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'thespicevault51@gmail.com'; // Your gmail
    $mail->Password = ''; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('thespicevault51@gmail.com'); // Your gmail
  
    $mail->addAddress($email);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Greetings ";  //Your Subject goes here
    $mail->Body = `Welcome to the Spice Vault`; //Mail Body goes here
  if($mail->send())
  {
    ?>
<script>
    alert("Email Send")
</script>
    <?php
  }
  else
  {
    ?>
<script>
    alert("Email Failed")
</script>
    <?php
  }
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Register</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="txt_name">Name</label>
                    <input type="text" class="form-control" name="txt_name" id="txt_name" placeholder="Enter your name" />
                </div>
                <div class="form-group">
                    <label for="txt_email">Email</label>
                    <input type="email" class="form-control" name="txt_email" id="txt_email" placeholder="Enter your email" />
                </div>
                <div class="form-group">
                    <label for="txt_contact">Contact</label>
                    <input type="text" class="form-control" name="txt_contact" id="txt_contact" placeholder="Enter your contact number" />
                </div>
                <div class="form-group">
                    <label for="txt_address">Address</label>
                    <textarea class="form-control" name="txt_address" id="txt_address" cols="45" rows="3" placeholder="Enter your address"></textarea>
                </div>
                <div class="form-group">
                    <label for="sel_district">District</label>
                    <select name="sel_district" id="sel_district" class="form-control" onchange="getPlace(this.value)">
                        <option>--select--</option>
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
                    <label for="sel_place">Place</label>
                    <select name="sel_place" id="sel_place" class="form-control">
                        <option>--select--</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="file_photo">Photo</label>
                    <input type="file" class="form-control-file" name="file_photo" id="file_photo" />
                </div>
                <div class="form-group">
                    <label for="txt_password">Password</label>
                    <input type="password" class="form-control" name="txt_password" id="txt_password" placeholder="Enter password" />
                </div>
                <div class="form-group">
                    <label for="txt_cpassword">Confirm Password</label>
                    <input type="password" class="form-control" name="txt_cpassword" id="txt_cpassword" placeholder="Confirm your password" />
                </div>
                <div class="text-center">
                    <button type="submit" name="btn_register" id="btn_register" class="btn btn-primary">Register</button>
                </div>
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function getPlace(did) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
                success: function(result) {
                    $("#sel_place").html(result);
                }
            });
        }
    </script>
</body>
</html>