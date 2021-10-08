<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "gogo";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect($host, $user, $pass, $db);
if (!$mysqli) {
  echo "Error: Unable to connect to MySQL." . mysqli_connect_error();
}
// $res = $mysqli->query("INSERT INTO transa(itemName,
// itemQty,
// paymentMethod,
// customerName,
// merchantId,
// referencesId,
// itemStatus)
// VALUES (1,2,'test',2,5,6,1)");
// echo $res;
?>