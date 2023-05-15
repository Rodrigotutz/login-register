<?php

define("DATA_LAYER_CONFIG", [
    "driver" => getenv("DATABASE_DRIVER"),
    "host" => getenv("DATABASE_HOST"),
    "port" => getenv("DATABASE_PORT"),
    "dbname" => getenv("DATABASE_NAME"),
    "username" => getenv("DATABASE_USER"),
    "passwd" => getenv("DATABASE_PASS"),
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);
