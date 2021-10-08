<?php
require_once "api.php";
$mhs = new Api();
$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
  case 'GET':
    $mhs->getTrans($_GET["refId"], $_GET["merchId"]);
    break;
  case 'PUT':
    $mhs->updateTrans($_GET["id"], $_GET["status"]);
    break;
  case 'POST':
    $mhs->createTrans(); 
    break;
  default:
    header("HTTP/1.0 405 Method Not Allowed");
    break;
}
