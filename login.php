<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>登入</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php include 'header.php';?>
<div class="container mt-5">
<?php
session_start();

//  只在使用者按下登入按鈕時才處理
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $account = $_POST['account'] ?? '';
  $password = $_POST['password'] ?? '';

  try {
    require_once 'db.php';
    
    // 查詢該帳號是否存在
    $sql = "SELECT * FROM user WHERE account = '$account'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
      //  比對密碼
      if ($row["password"] == $password) {
        $_SESSION["account"] = $account;
        $_SESSION["name"] = $row["name"];
        $_SESSION["role"] = $row["role"];

        echo "登入成功";
        $redirect = $_SESSION["redirect_to"] ?? "success.php";
        header("Location:" . $redirect);
        exit;
      } else {
        echo "密碼錯誤";
        header("Location: login.php?msg=帳密錯誤");
        exit;
      }
    } else {
      echo "查無此帳號";
      header("Location: login.php?msg=帳號不存在");
      exit;
    }

    mysqli_close($conn);
  } catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
  }

} else {
  //  如果使用者直接打開 login.php，而不是用表單送出
  // 就顯示登入表單（避免無限重導）
  echo '
  <form method="POST" action="login.php">
    帳號：<input type="text" name="account"><br>
    密碼：<input type="password" name="password"><br>
    <input type="submit" value="登入">
  </form>
  ';
}
?>



</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>