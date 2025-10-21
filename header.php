<?php
// week03/header.php
$title=$title??"活動系統";
function nav_active($file) {
    $current = basename($_SERVER['PHP_SELF']);
    return $current === $file ? ' active' : '';
}


?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="custom.css" />
</head>
<body class="bg-light">
  <nav class="navbar navbar-expand-lg custom-bg">
    <div class="container">
      <a class="navbar-brand" href="index.php">活動報名系統</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link<?=nav_active('index.php')?>" aria-current="page" href="index.php">首頁</a>
          </li>
          <li class="nav-item">
            <a class="nav-link<?=nav_active('茶會.php')?>" href="茶會.php">迎新茶會</a>
          </li>
          <li class="nav-item">
            <a class="nav-link<?=nav_active('一日營.php')?>" href="一日營.php">資管一日營</a>
          </li>
          <li class="nav-item">
            <a class="nav-link<?=nav_active('job.php')?>" href="job.php">資料表</a>
          </li>
          <li class="nav-item">
            <if !isset($_SESSION[ "account" ])
            a class="nav-link<?=nav_active('login.php')?>" href="login.php">
              <else:
              class="nav-link<?=nav_active('logout.php')?>" href="logout.php"?>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

