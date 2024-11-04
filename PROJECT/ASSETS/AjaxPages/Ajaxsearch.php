<?php
include("../connection/connection.php");

$txt = $_GET['txt'];
$cat = $_GET['cat'];
$subcat = $_GET['subcat'];
$min = $_GET['min'];
$max = $_GET['max'];

$selQry = "SELECT * FROM tbl_product p 
           INNER JOIN tbl_subcategory s ON p.subcat_id = s.subcat_id 
           INNER JOIN tbl_category c ON s.category_id = c.category_id 
           WHERE TRUE";

if ($txt !== "") { 
    $selQry .= " AND product_name LIKE '%$txt%'";
}
if ($cat !== "") {
    $selQry .= " AND s.category_id = " . $cat;
}
if ($subcat !== "") {
    $selQry .= " AND p.subcat_id = " . $subcat;
}
if ($min !== "") {
    $selQry .= " AND p.product_price >= " . $min;
}
if ($max !== "") {
    $selQry .= " AND p.product_price <= " . $max;
}

$result = $con->query($selQry);
?>

<!-- Include Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="row">
        <?php
        while ($data = $result->fetch_assoc()) {
            $id = $data['product_id'];
            $cart = "SELECT SUM(cart_quantity) AS cart_total FROM tbl_cart WHERE product_id='$id'";
            $cresult = $con->query($cart);
            $cdata = $cresult->fetch_assoc();
            
            $stock = "SELECT SUM(stock_quantity) AS total_stock FROM tbl_stock WHERE product_id='$id'";
            $sresult = $con->query($stock);
            $sdata = $sresult->fetch_assoc();
            $rem = $sdata['total_stock'] - $cdata['cart_total'];
            $query = "SELECT SUM(rating_value) as rating, COUNT(*) as count FROM tbl_rating WHERE product_id = $id";
$resultS = $con->query($query);

// Check if the query returned a resultS
    $rowS = $resultS->fetch_assoc();
    $totalRating = $rowS['rating'];
    $ratingCount = $rowS['count'];

    // Avoid division by zero
    if ($ratingCount > 0) {
        $averageRating = $totalRating / $ratingCount;
    } else {
        $averageRating=0;
}
            ?>
            
            <!-- Bootstrap Card for Product -->
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="../ASSETS/files/Company/productphoto/<?php echo $data['product_photo']; ?>" class="card-img-top" alt="Product Image" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['product_name']; ?></h5>
                        <p class="card-text">
                            <?php echo $data['product_description']; ?>
                        </p>
                        <p class="text-muted">Price: ₹<?php echo $data['product_price']; ?></p>
                    </div>
                    <div class='star-rating' style="
    color: #DEAD6F;font-size:30px;
">
		<?php
for ($i = 1; $i <= 5; $i++) {
	if ($i <= $averageRating) {
		echo "<span>&#9733;</span>"; // Filled star
	} else {
		echo "<span>&#9734;</span>"; // Empty star
	}
}
		?>
		</div>
                    <div class="card-footer text-center">
                        <?php if ($rem <= 0) { ?>
                            <span class="text-danger">Out of stock</span>
                        <?php } else { ?>
                            <a href="#" class="btn btn-primary" onclick="addCart('<?php echo $data['product_id']; ?>')">Add to Cart</a>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>
    </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
