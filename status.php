

<?php

session_start();

require_once 'db.php';

if ($_POST) {

  $account = $_SESSION["account"] ?? "";

  // 查詢目前登入使用者
  $sql = "SELECT * FROM user WHERE account = '$account'";
  $result = mysqli_query($conn, $sql);


  // 檢查查詢是否成功
  if (!$result) {
    die("查詢失敗：" . mysqli_error($conn));
  }

  // 取出一筆資料
  $row = mysqli_fetch_assoc($result);
  echo $row["name"], "<br/>";


  // 取得 dinner 值
  $dinner = $_POST["dinner"] ?? "";
  echo "$dinner <br/>";
  if ($_SESSION["role"] == "S" && $dinner == "dinner"){
    echo "60";
    
  }
  else{
    echo "0";
  }

}

else {
  header('Location:' . $_SERVER["REQUEST_URI"]);
  exit;
}







?>

