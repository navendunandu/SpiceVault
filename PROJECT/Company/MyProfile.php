<?php
include("../Assets/connection/connection.php");
ob_start();
include("Head.php");
session_start();
	$selQry="select * from tbl_company u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p. district_id  where company_id=".$_SESSION['cid'];
	$result=$con->query($selQry);
	$row=$result->fetch_assoc()
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
  .profile-container {
    max-width: 600px;
    margin: 0 auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
  }
  .profile-container img {
    display: block;
    margin: 0 auto;
    border-radius: 5px;
  }
  .profile-container h3 {
    text-align: center;
    margin-bottom: 20px;
  }
  .profile-container table {
    width: 100%;
  }
  .profile-container td {
    padding: 10px;
    vertical-align: middle;
  }
  .action-buttons {
    text-align: center;
    margin-top: 20px;
  }
  .action-buttons a {
    margin-right: 10px;
  }
</style>
</head>
<body>

<div class="container">
  <div class="profile-container">
    <h3>Company Profile</h3>
    <form id="form1" name="form1" method="post" action="">
      <table class="table table-borderless">
        <tr>
          <td colspan="2" class="text-center">
            <img src="../Assets/Files/Company/logo/<?php echo $row['company_logo']; ?>" height="150" alt="Company Logo"/>
          </td>
        </tr>
        <tr>
          <td><strong>Name</strong></td>
          <td><?php echo $row['company_name']; ?></td>
        </tr>
        <tr>
          <td><strong>Email</strong></td>
          <td><?php echo $row['company_email']; ?></td>
        </tr>
        <tr>
          <td><strong>Contact</strong></td>
          <td><?php echo $row['company_contact']; ?></td>
        </tr>
        <tr>
          <td><strong>Address</strong></td>
          <td><?php echo $row['company_address']; ?></td>
        </tr>
        <tr>
          <td><strong>District</strong></td>
          <td><?php echo $row['company_district']; ?></td>
        </tr>
        <tr>
          <td><strong>Place</strong></td>
          <td><?php echo $row['place_name']; ?></td>
        </tr>
      </table>
      
      <div class="action-buttons">
        <a href="EditProfile.php" class="btn btn-primary">Edit Profile</a>
        <a href="ChangePassword.php" class="btn btn-secondary">Change Password</a>
      </div>
    </form>
  </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-kgjVfLvOwO1wn5YIjrIprf4hH5qht27i5Mti2KnQKA7HYPXa9w14Wt4rYYAIe96g" crossorigin="anonymous"></script>
</body>
</html>