<?php include 'header.php';?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
</head>

<body>

 <form action="conference.php" method="post">


  <input type="checkbox" name="program[]" value="1" checked="checked" /> 上午場 ($150)
  <input type="checkbox" name="program[]" value="2" /> 下午場 ($100) <br />
  <input type="checkbox" name="program[]" value="3" checked="checked" /> 午餐 ($60)<br />
  <input type="submit" value="Submit" />

 </form>

<?php session_start();
if (!isset($_SESSION["account"])) {
  $_SESSION["redirect_to"] = $_SERVER["REQUEST_URI"]; // 記錄目前頁面
	header("Location: login.php");
	exit;
}


?>

</body>

</html>



<?php include 'footer.php';?>