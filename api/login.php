<?php

include_once("include/database.php");

header("Content-Type: application/json");

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = (array) json_decode(file_get_contents("php://input"));

    if (!is_string($data["username"]) || !is_string($data["password"])) {
        echo json_encode(array(
            "success" => false,
            "errors" => [array(
                "field" => "global",
                "message" => "Malformed request",
            )],
        ));
        die();
    }

    $res = loginUser($data);

    if ($res["success"]) {
        $_SESSION["user-id"] = $res["user-id"];
        $_SESSION["first-name"] = $res["first-name"];
        $_SESSION["last-name"] = $res["last-name"];

        echo json_encode(array(
            "success" => true,
        ));
    }
    else {
        echo json_encode($res);
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
