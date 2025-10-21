<?php include 'header.php';?>

<!-- 晚餐 -->

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<?php session_start();
if (!isset($_SESSION["account"])) {
   $_SESSION["redirect_to"] = $_SERVER["REQUEST_URI"];
	header("Location: login.php");
	exit;
}?>
<body>

  <form action="status.php" method="post">


      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="dinner" id="dinner" value="dinner" checked />
        <label class="form-check-label" for="dinner">需要晚餐</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="nodinner" value="nodinner" />
        <label class="form-check-label" for="nodinner">不需要晚餐</label>
      </div>

<!-- name="status" id="faculty" value="faculty" 教職員 -->
<!-- name="status" id="student" value="student" 學生-->

  <input type="submit" value="Submit" />

  </form>
</body>

</html>




<?php include 'footer.php';?>