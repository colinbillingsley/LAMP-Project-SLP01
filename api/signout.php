<?php

header("Content-Type: application/json");

session_start();

$_SESSION = [];

echo json_encode(array(
    "success" => true,
));
