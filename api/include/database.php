<?php

$db = new mysqli("127.0.0.1", "slp01", "cop4331slp01", "contacts");

$createUserStmt = $db->prepare("INSERT INTO user (
    username,
    password,
    firstName,
    lastName,
    email,
    phone
) VALUES (?, ?, ?, ?, ?, ?)");
function createUser($data, & $errors) {
    global $db, $createUserStmt;

    $firstName = $data["first-name"];
    $lastName = $data["last-name"];
    $email = $data["email"];
    $phone = $data["phone"];
    $username = $data["username"];
    $password = $data["password"];

    try {
        $createUserStmt->bind_param("ssssss",
            $username,
            password_hash($password, PASSWORD_DEFAULT),
            $firstName,
            $lastName,
            $email,
            $phone
        );
        $createUserStmt->execute();
        return $db->insert_id;
    }
    catch (Exception $ex) {
        $errors[] = array(
            "field" => "username",
            "message" => "Username already in use.",
        );
        return -1;
    }
}

$loginUserStmt = $db->prepare("SELECT userId, password, firstName, lastName FROM user WHERE username = ?");
function loginUser($data) {
    global $db, $loginUserStmt;

    $loginUserStmt->bind_param("s", $data["username"]);

    $loginUserStmt->execute();

    $row = $loginUserStmt->get_result()->fetch_assoc();

    if ($row) {
        if (password_verify($data["password"], $row["password"])) {
            return array(
                "success" => true,
                "user-id" => $row["userId"],
                "first-name" => $row["firstName"],
                "last-name" => $row["lastName"],
            );
        }
        else {
            return array(
                "success" => false,
                "errors" => [array(
                    "field" => "password",
                    "message" => "Invalid password",
                )],
            );
        }
    }
    else {
        return array(
            "success" => false,
            "errors" => [array(
                "field" => "username",
                "message" => "That user doesn't exist",
            )],
        );
    }
}

$profileInfoStmt = $db->prepare("SELECT
    username, password, firstName, lastName, email, phone
FROM user WHERE userId = ?");
function profileInfo($userId) {
    global $db, $profileInfoStmt;

    $profileInfoStmt->bind_param("i", $userId);

    $profileInfoStmt->execute();

    $row = $profileInfoStmt->get_result()->fetch_assoc();

    if (!$row)
        trigger_error("Error while reading from database", E_USER_ERROR);

    return array(
        "username" => $row["username"],
        "password" => $row["password"],
        "first-name" => $row["firstName"],
        "last-name" => $row["lastName"],
        "email" => $row["email"],
        "phone" => $row["phone"],
    );
}

$updateProfileInfoStmt = $db->prepare("UPDATE user
SET username = ?, password = ?, firstName = ?, lastName = ?, email = ?, phone = ?
WHERE userId = ?");
function updateProfileInfo($info, $userId) {
    global $db, $updateProfileInfoStmt;

    $updateProfileInfoStmt->bind_param("ssssssi",
        $info["username"],
        $info["password"],
        $info["first-name"],
        $info["last-name"],
        $info["email"],
        $info["phone"],
        $userId
    );

    $updateProfileInfoStmt->execute();
}

$getContactInfoStmt = $db->prepare("SELECT
    userIdAdded, firstName, lastName, email, phone, dateRecorded
FROM contactData WHERE contactId = ?");
function getContactInfo($contactId) {
    global $db, $getContactInfoStmt;

    $getContactInfoStmt->bind_param("i", $contactId);

    $getContactInfoStmt->execute();

    $row = $getContactInfoStmt->get_result()->fetch_assoc();

    if (!$row) {
        return NULL;
    }
    else {
        return array(
            "user-id" => $row["userIdAdded"],
            "first-name" => $row["firstName"],
            "last-name" => $row["lastName"],
            "email" => $row["email"],
            "phone" => $row["phone"],
            "date-recorded" => $row["dateRecorded"],
        );
    }
}

function escapeLikeQuery($query) {
    return "%" . preg_replace("/(?<!\\\)([%_])/", "\\\$1", $query) . "%";
}

$CONTACTS_PER_PAGE = 20;
$getUserContactsStmt = $db->prepare(
    "SELECT contactId, firstName, lastName, email, phone, dateRecorded
    FROM contactData
    WHERE userIdAdded = ? AND (firstName LIKE ? OR lastName LIKE ?)
    ORDER BY contactId
    LIMIT $CONTACTS_PER_PAGE OFFSET ?
");
function getUserContacts($userId, $offset, $searchQuery) {
    global $db, $getUserContactsStmt;

    $searchQuery = escapeLikeQuery($searchQuery);

    $getUserContactsStmt->bind_param("issi", $userId, $searchQuery, $searchQuery, $offset);

    $getUserContactsStmt->execute();

    $dbResult = $getUserContactsStmt->get_result();

    $results = array();

    while (true) {
        $row = $dbResult->fetch_assoc();
        if (!$row)
            break;
        $results[] = array(
            "contact-id" => $row["contactId"],
            "first-name" => $row["firstName"],
            "last-name" => $row["lastName"],
            "email" => $row["email"],
            "phone" => $row["phone"],
            "date-recorded" => $row["dateRecorded"],
        );
    }

    return $results;
}

$countContactsStmt = $db->prepare(
    "SELECT COUNT(*)
    FROM contactData
    WHERE userIdAdded = ? AND (firstName LIKE ? OR lastName LIKE ?)
");
function countContacts($userId, $searchQuery) {
    global $db, $countContactsStmt;

    $searchQuery = escapeLikeQuery($searchQuery);

    $countContactsStmt->bind_param("iss", $userId, $searchQuery, $searchQuery);

    $countContactsStmt->execute();

    $row = $countContactsStmt->get_result()->fetch_assoc();

    if (!$row) {
        return 0;
    }
    else {
        return $row["COUNT(*)"];
    }
}

$updateContactStmt = $db->prepare("UPDATE contactData
SET firstName = ?, lastName = ?, email = ?, phone = ?
WHERE userIdAdded = ? AND contactId = ?");
function updateContact($info, $userId, $contactId) {
    global $db, $updateContactStmt;

    $updateContactStmt->bind_param("ssssii",
        $info["first-name"],
        $info["last-name"],
        $info["email"],
        $info["phone"],
        $userId,
        $contactId
    );

    $updateContactStmt->execute();
}

$deleteContactStmt = $db->prepare("DELETE FROM contactData
WHERE userIdAdded = ? AND contactId = ?");
function deleteContact($userId, $contactId) {
    global $db, $deleteContactStmt;

    $deleteContactStmt->bind_param("ii",
        $userId,
        $contactId
    );

    $deleteContactStmt->execute();
}

$addContactStmt = $db->prepare("INSERT INTO contactData (
    userIdAdded,
    firstName,
    lastName,
    email,
    phone,
    dateRecorded
) VALUES (?, ?, ?, ?, ?, ?)");
function addContact($info, $userId) {
    global $db, $addContactStmt;

    $addContactStmt->bind_param("isssss",
        $userId,
        $info["first-name"],
        $info["last-name"],
        $info["email"],
        $info["phone"],
        date("m/d/Y"),
    );

    try {
        $addContactStmt->execute();
        return $db->insert_id;
    }
    catch (Exception $ex) {
        return -1;
    }
}
