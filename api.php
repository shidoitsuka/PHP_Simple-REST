<?php
require_once "connection.php";
class Api {
  public function getTrans($refId, $merchId) {
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM transa WHERE referencesId = $refId AND merchantId = $merchId");
    while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
        }
        $response=array(
                     'referencesId' => $data[0]->referencesId,
                     'invoiceId' => $data[0]->invoiceId,
                     'itemStatus' => $data[0]->itemStatus
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
  }
  public function createTrans() {
    $itemName = $_POST["itemName"];
    $itemQty = $_POST["itemQty"];
    $paymentMethod = $_POST["paymentMethod"];
    $customerName = $_POST["customerName"];
    $merchantId = $_POST["merchantId"];
    global $mysqli;
    $refId = rand(1000,1000000);
    $result = $mysqli->query("INSERT INTO transa (
      itemName,
      itemQty,
      paymentMethod,
      customerName,
      merchantId,
      referencesId,
      itemStatus)
      VALUES (
      '$itemName',
      $itemQty,
      $paymentMethod,
      '$customerName',
      $merchantId,
      $refId,
      1)"
    );
    header('Content-Type: application/json');
    if ($_POST["paymentMethod"] == 0) {
      $vaNumber = rand(1000000,1000000000);
    } else {
      $vaNumber = 0;
    }
    $response=array(
      'referencesId' => $refId,
      'numberVA' => $vaNumber,
      'paymentMethod' => $result
    );
    if ($result) {
    }
    echo json_encode($response);
  }

  public function updateTrans($id, $status) {
    global $mysqli;
    $mysqli->query("UPDATE transa SET itemStatus=$status WHERE referencesId=$id");
  }
}