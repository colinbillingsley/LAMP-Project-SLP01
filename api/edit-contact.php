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

    // check constraints
    validateFirstName($data["first-name"], $errors);
    validateLastName($data["last-name"], $errors);
    validateEmail($data["email"], $errors);
    validatePhone($data["phone"], $errors);

    // if any constraints were violated, don't go any further
    if (count($errors)) {
        echo json_encode(array(
            "success" => false,
            "errors" => $errors,
        ));
        die();
    }

    $userId = $_SESSION["user-id"];

    // create the contact
    if (!isset($data["id"])) {
        addContact($data, $userId);

        echo json_encode(array(
            "success" => true,
        ));
    }
    else {
        $contactId = $data["id"];
        updateContact($data, $userId, $contactId);

        echo json_encode(array(
            "success" => true,
        ));
    }
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
