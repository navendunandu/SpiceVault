<?php
include("../Assets/Connection/connection.php");
session_start();
ob_start();
include("Head.php");
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4OaXp2QnEJSwEXa2B3iLlAplgYIKfv56z6tk4s0GgdZj2g/4F4AvwOTw0mEqE6d1" crossorigin="anonymous">

  <style>
    body {
      background-color: #f8f9fa;
      padding: 20px;
    }

    .table-responsive {
      max-width: 1000px;
      margin: 0 auto;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      background: white;
      padding: 15px;
    }

    table {
      width: 100%;
    }

    th,
    td {
      text-align: center;
      vertical-align: middle;
    }

    img {
      max-width: 150px;
      height: auto;
      border-radius: 5px;
    }

    .btn-reply {
      background-color: #28a745;
      color: white;
      padding: 5px 10px;
      text-decoration: none;
      border-radius: 5px;
    }

    .btn-reply:hover {
      background-color: #218838;
    }

    .status-label {
      font-weight: bold;
      color: #17a2b8;
    }

    .date-cell {
      color: #6c757d;
      font-size: 0.9rem;
    }
  </style>
</head>

<body>

  <div class="container">
    <h2 class="mb-4 text-center">Your Complaints</h2>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>Sl No.</th>
            <th>Title</th>
            <th>Description</th>
            <th>Product</th>
            <th>File</th>
            <th>Reply</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
        $i = 0;
        $selQry = "select * from tbl_complaint c inner join tbl_product p on c.product_id=p.product_id where p.company_id=".$_SESSION['cid'];
        $result = $con->query($selQry);
        while ($row = $result->fetch_assoc()) {
            $i++;
        ?>
          <tr>
            <td>
              <?php echo $i; ?>
            </td>
            <td>
              <?php echo $row['complaint_title']; ?>
            </td>
            <td>
              <?php echo $row['complaint_content']; ?>
            </td>
            <td>
              <?php echo $row['product_name']; ?>
            </td>
            <td><img src="../Assets/Files/User/Complaint/<?php echo $row['complaint_file']; ?>" alt="Complaint File" />
            </td>
            <td>
              <?php
          if($row['complaint_reply']=="")
          {          
          ?>
              <a href="Reply.php?cid=<?php echo $row['complaint_id']; ?>" class="btn-reply">Reply</a>
              <?php
              }
        else{
          echo $row['complaint_reply'];
        }
        ?>
            </td>
            <td class="date-cell">
              <?php echo $row['complaint_date']; ?>
            </td>
          </tr>
          <?php
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kgjVfLvOwO1wn5YIjrIprf4hH5qht27i5Mti2KnQKA7HYPXa9w14Wt4rYYAIe96g"
    crossorigin="anonymous"></script>
</body>

</html>