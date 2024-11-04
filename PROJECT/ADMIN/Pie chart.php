
<?php
include("../Assets/Connection/Connection.php");
ob_start();
// include("Head.php");

$xValues = [];
$yValues = [];

// Fetch category names
$selX = "SELECT * FROM tbl_category";
$resX = $con->query($selX);
while ($dataX = $resX->fetch_assoc()) {
    $xValues[] = $dataX['category_name'];

    // Fetch count of items in cart per category
    $selY = "SELECT COUNT(*) as count 
             FROM tbl_cart c 
             INNER JOIN tbl_product p ON p.product_id = c.product_id 
             INNER JOIN tbl_subcategory s ON s.subcat_id = p.subcat_id 
             WHERE s.category_id = " . $dataX['category_id'] . " 
             AND cart_status BETWEEN 0 AND 5";
    $resY = $con->query($selY);
    $dataY = $resY->fetch_assoc();
    $yValues[] = $dataY['count'];
}

// Encode PHP arrays to JSON for use in JavaScript
$xValuesJson = json_encode($xValues);
$yValuesJson = json_encode($yValues);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../Assets/JQ/jQuery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
    <style>
        .chart-con{
            height: 500px !important;
            width: 500px !important;
        }
        .chart-main {
            display: flex;
            justify-content: center;
            align-items: center;   
        }
    </style>
</head>
<body>
<div class="container my-5">
        <h2 class="text-center">Items in Cart per Category</h2>
        <div class="chart-main"><div class="chart-con"><canvas id="pieChart" width="500px" height="500px"></canvas></div></div>
    </div>

    <script>
        // Fetch PHP arrays as JavaScript variables
        const xValues = <?php echo $xValuesJson; ?>;
        const yValues = <?php echo $yValuesJson; ?>;

        // Function to generate pastel bright colors
        function generatePastelBrightColorPalettes(numColors) {
            const fillColors = [];
            const borderColors = [];
            const colorStep = 360 / numColors;

            for (let i = 0; i < numColors; i++) {
                const hue = Math.round(i * colorStep);

                // Generate pastel RGB values for bright colors
                const saturation = 50 + Math.random() * 30; // Adjust the saturation range
                const lightness = 65 + Math.random() * 30;  // Adjust the lightness for pastel effect

                const fillColor = `hsla(${hue}, ${saturation}%, ${lightness}%, 0.65)`;
                const borderColor = `hsla(${hue}, ${saturation}%, ${lightness}%, 1)`;


                fillColors.push(fillColor);
                borderColors.push(borderColor);
            }
            return { fillColors, borderColors };
        }

        // Generate colors based on the number of categories
        const colorPalettes = generatePastelBrightColorPalettes(xValues.length);

        // Create Pie Chart using Chart.js
        const ctx = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: xValues,
                datasets: [{
                    data: yValues,
                    backgroundColor: colorPalettes.fillColors,
                    borderColor: colorPalettes.borderColors,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return xValues[tooltipItem.dataIndex] + ': ' + yValues[tooltipItem.dataIndex];
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
<?php
// include("Foot.php");
ob_flush();
?>