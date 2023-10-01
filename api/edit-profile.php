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
    if (isset($data["first-name"])) validateFirstName($data["first-name"], $errors);
    if (isset($data["last-name"])) validateLastName($data["last-name"], $errors);
    if (isset($data["email"])) validateEmail($data["email"], $errors);
    if (isset($data["phone"])) validatePhone($data["phone"], $errors);
    if (isset($data["username"])) validateUsername($data["username"], $errors);
    if (isset($data["password"])) validatePassword($data["password"], $errors);

    // if any constraints were violated, don't go any further
    if (count($errors)) {
        echo json_encode(array(
            "success" => false,
            "errors" => $errors,
        ));
        die();
    }

    // modify the user
    $userId = $_SESSION["user-id"];
    $profile = profileInfo($userId);
    if (isset($data["first-name"])) $_SESSION["first-name"] = $profile["first-name"] = $data["first-name"];
    if (isset($data["last-name"])) $_SESSION["last-name"] = $profile["last-name"] = $data["last-name"];
    if (isset($data["email"])) $profile["email"] = $data["email"];
    if (isset($data["phone"])) $profile["phone"] = $data["phone"];
    if (isset($data["username"])) $profile["username"] = $data["username"];
    if (isset($data["password"])) $profile["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
    updateProfileInfo($profile, $userId);

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
