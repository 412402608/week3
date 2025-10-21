<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.datatables.net/2.3.0/css/dataTables.bootstrap5.css" rel="stylesheet">

</head>
<body>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  
    <!-- https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js -->
    <script src= "https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
    <script src= "https://cdn.datatables.net/2.3.0/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>


    <?php
require_once "header.php";
try {
  require_once 'db.php';
  $sql="select * from job";
  $result = mysqli_query($conn, $sql);

session_start();
if (!isset($_SESSION["account"])) {
   $_SESSION["redirect_to"] = $_SERVER["REQUEST_URI"];
	header("Location: login.php");
	exit;
}


?>
<div class="container">
<table class="table table-bordered table-striped" id="product_table">
<thead>
 <tr>
  <th>求才廠商</th>
  <th>求才內容</th>
  <th>日期</th>
 </tr>
</thead>
 <?php
 while($row = mysqli_fetch_assoc($result)) {?>
 <tr>
  <td><?=$row["company"]?></td>
  <td><?=$row["content"]?></td>
  <td><?=$row["pdate"]?></td>
 </tr>
 <?php
  }
 ?>
</table>
</div>
    <script>
      $(document).ready( function () {
        $('#product_table').DataTable(); 
      } );
    </script>
<?php
  mysqli_close($conn);
}
//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
require_once "footer.php";
?>

</body>
</html>





    