<?php
$api_gateway = "http://192.168.1.120:5000";
$assets = "http://192.168.1.120/jlite/assets/public_html";

session_save_path("../sessions");
session_start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$_SESSION["crud"] = $_GET["crud"]??$_SESSION["crud"]??"employees";
