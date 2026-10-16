<?php
$url = "http://localhost:5001/students";
$response = file_get_contents($url);
echo "<pre>";
echo $response;
echo "</pre>";
