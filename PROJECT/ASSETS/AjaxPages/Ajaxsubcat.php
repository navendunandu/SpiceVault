<option value="">select subcategory</option>
<?php
include("../connection/connection.php");
	  $selQry=" select * from tbl_subcategory where category_id=".$_GET['cid'];
	  $result=$con->query($selQry);
	  while($data=$result->fetch_assoc())
	  {
		  ?>
          <option value="<?php echo $data['subcat_id']?>"><?php echo $data['subcat_name']; ?></option>
          <?php
	  }