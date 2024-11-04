<?php
session_start();
 include("../Assets/Connection/Connection.php");
 ob_start();
include("Head.php");

 if(isset($_POST["btn_submit"]))
 {
	$agent=$_POST["selAgent"];
	$upQry="update tbl_cart set cart_status=3, deliveryagent_id=".$_POST['selAgent']." where cart_id=".$_GET['id'];
	if($con->query($upQry)){
	?>
    <script>
	alert("Assigned")
	window.location="booking.php"
	</script>
    <?php	
	}
 }
?>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Custom CSS -->
  <style>
    .form-container {
      max-width: 500px;
      margin: 50px auto;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background-color: #f9f9f9;
    }
    .form-title {
      text-align: center;
      margin-bottom: 20px;
      font-size: 24px;
      font-weight: bold;
    }
    .btn {
      width: 100%;
    }
  </style>

<div class="container">
  <div class="form-container shadow-sm">
    <h2 class="form-title">Select Agent</h2>
    
    <form name="form1" method="post" action="">
      <div class="mb-3">
        <label for="selAgent" class="form-label">Agent</label>
        <select class="form-select" name="selAgent" id="selAgent" required>
          <option value="" selected>----Select----</option>
          <?php
          // Your query to fetch the agents
          $SelQry = "SELECT * FROM tbl_deliveryagent WHERE company_id='".$_SESSION['cid']."'";
          $result = $con->query($SelQry);
          while ($data = $result->fetch_assoc()) {
              echo "<option value='{$data['deliveryagent_id']}'>{$data['deliveryagent_name']}</option>";
          }
          ?>
        </select>
      </div>

      <div class="text-center">
        <button type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<!-- Bootstrap JS and dependencies (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>