<?php

include_once("include/database.php");
include_once("include/profile-validation.php");

header("Content-Type: application/json");

session_start();

if (!isset($_SESSION["user-id"])) {
    echo json_encode(array(
        "success" => false,
        "errors" => [array(
            "field" => "global",
            "message" => "User is not logged in",
        )],
    ));
    die();
}

// if we just posted, that means we're processing a sign-up request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = (array) json_decode(file_get_contents("php://input"));

    $errors = array();

    if (!isset($data["id"])) {
        echo json_encode(array(
            "success" => false,
            "errors" => [array(
                "field" => "global",
                "message" => "Contact ID not provided",
            )],
        ));
        die();
    }

    $userId = $_SESSION["user-id"];
    $contactId = $data["id"];
    deleteContact($userId, $contactId);

    echo json_encode(array(
        "success" => true,
    ));
}
else {
    echo json_encode(array(
        "success" => false,
        "errors" => [array(
            "field" => "global",
            "message" => "Malformed request",
        )],
    ));
}
