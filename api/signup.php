<?php

include_once("include/database.php");
include_once("include/profile-validation.php");

header("Content-Type: application/json");

session_start();

// if we just posted, that means we're processing a sign-up request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = (array) json_decode(file_get_contents("php://input"));
    $firstName = $data["first-name"];
    $lastName = $data["last-name"];
    $email = $data["email"];
    $phone = $data["phone"];
    $username = $data["username"];
    $password = $data["password"];

    $errors = array();

    // check constraints
    validateFirstName($firstName, $errors);
    validateLastName($lastName, $errors);
    validateEmail($email, $errors);
    validatePhone($phone, $errors);
    validateUsername($username, $errors);
    validatePassword($password, $errors);

    // if any constraints were violated, don't go any further
    if (count($errors)) {
        echo json_encode(array(
            "success" => false,
            "errors" => $errors,
        ));
        die();
    }

    // make the user
    $userId = createUser($data, $errors);

    if ($userId !== -1) {
        $_SESSION["user-id"] = $userId;
        $_SESSION["first-name"] = $firstName;
        $_SESSION["last-name"] = $lastName;

        echo json_encode(array(
            "success" => true,
        ));
    }
    else {
        echo json_encode(array(
            "success" => false,
            "errors" => $errors,
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
