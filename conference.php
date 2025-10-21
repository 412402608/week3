<?php
if ($_POST){
  $program_price = array(0, 150, 100, 60);
  $name = $_POST["name"]??"N/A";

  //new syntax in php 7
  $programlist = $_POST["program"]?? [0];
  $price = 0;
  foreach( $programlist as $program ) {  
    $price += $program_price[$program];
  }
  echo "$name ，您要繳交 $price 元 <br/>";
}
else {
  header("Location: 一日營.php");
}
?>