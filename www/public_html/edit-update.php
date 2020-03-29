<?php
require_once "../inc.config.php";

$update_api = "{$api_gateway}/crud/{$_SESSION['crud']}/update";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $update_api);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST["data"]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close ($ch);

header("Location: index.php");
