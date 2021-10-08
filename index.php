<?php
$refId = $argv[1];
$status = $argv[2];

if ($status > 3) {
  die("Status tidak boleh lebih dari 3");
}

//The URL that we want to send a PUT request to.
$url = "http://localhost/test/transaction.php?id=$refId&status=$status";

//Initiate cURL
$ch = curl_init($url);

//Use the CURLOPT_PUT option to tell cURL that
//this is a PUT request.
curl_setopt($ch, CURLOPT_PUT, true);

//We want the result / output returned.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Execute the request.
curl_exec($ch);