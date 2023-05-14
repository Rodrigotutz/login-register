<?php 

require __DIR__ . "/../vendor/autoload.php";

echo getenv("APP_URL");
echo "<br>";
echo getenv("APP_NAME");