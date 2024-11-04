<?php
include("../ASSETS/connection/connection.php");
ob_start();
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
       
        .container-m {
            margin: 15px auto; /* Center the container-m */
            padding: 50px;
            background-color: white; /* White background for form */
            border-radius: 10px; /* Rounded corners */
            /* box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); */
        }
        h2 {
            text-align: center; /* Center align heading */
            margin-bottom: 20px; /* Space below heading */
            color: #007bff; /* Bootstrap primary color */
        }
        .form-group {
            margin-bottom: 15px; /* Space below each form group */
        }
        .btn {
            width: 100%; /* Full width for buttons */
        }
        #result {
            margin-top: 20px; /* Space above result area */
        }
    </style>
    
</head>

<body onload="getproduct()">

<div class="container-m">
    <h2>Product Search</h2>
    <p class="text-end"><a href="MyCart.php" class="btn btn-link">View Cart</a></p>
    <form id="form1" name="form1" method="post" action="">
        <div class="row mb-2">
            <div class="col">
                <label for="txt_search" class="form-label">Search</label>
                <input type="text" class="form-control form-control-sm" name="txt_search" id="txt_search" onkeyup="getproduct()" />
            </div>
            <div class="col">
                <label for="sel_category" class="form-label">Category</label>
                <select class="form-select form-select-sm" name="sel_category" id="sel_category" onchange="getsubcategory(this.value),getproduct()">
                    <option value="">--Select--</option>
                    <?php
                    $selQry = "SELECT * FROM tbl_category";
                    $result = $con->query($selQry);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $row["category_id"]; ?>"><?php echo $row["category_name"]; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col">
                <label for="sel_subcat" class="form-label">Sub Category</label>
                <select class="form-select form-select-sm" name="sel_subcat" id="sel_subcat">
                    <option value="">--Select--</option>
                </select>
            </div>
            <div class="col">
                <label for="txt_search" class="form-label">Min Rate</label>
                <input type="text" class="form-control form-control-sm" name="txt_min" id="txt_min" onkeyup="getproduct()" />
            </div>
            <div class="col">
                <label for="txt_search" class="form-label">Max Rate</label>
                <input type="text" class="form-control form-control-sm" name="txt_max" id="txt_max" onkeyup="getproduct()" />
            </div>
        </div>
    </form>
    <div id="result">
        <!-- This is where the search results will be displayed -->
    </div>
</div>

<!-- Bootstrap JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="../ASSETS/JQ/jQuery.js"></script>
<script>
  function getsubcategory(cid) {
    $.ajax({
      url: "../ASSETS/AjaxPages/Ajaxsubcat.php?cid=" + cid,
      success: function (result) {

        $("#sel_subcat").html(result);
      }
    });
  }
  
  
  
  function getproduct() {
	  
	  var txt=document.getElementById('txt_search').value.trim();
	  var cat=document.getElementById('sel_category').value.trim();
	  var subcat=document.getElementById('sel_subcat').value.trim();
	  var min=document.getElementById('txt_min').value.trim();
	  var max=document.getElementById('txt_max').value.trim();
    $.ajax({
      url: "../ASSETS/AjaxPages/Ajaxsearch.php?txt="+txt+"&cat="+cat+"&subcat="+subcat+"&min="+min+"&max="+max,
        
      success: function (result) {

        $("#result").html(result);
      }
    });
  }
  function addCart(pid){
    $.ajax({
        url:'../ASSETS/Ajaxpages/AjaxAddCart.php?pid=' + pid,
        success: function(response) {
            alert(response);
        }
    });
  }
  
  </script>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>