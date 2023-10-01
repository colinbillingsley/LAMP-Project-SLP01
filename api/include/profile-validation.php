<?php

function validateFirstName($firstName, & $errors) {
    if (trim($firstName) !== $firstName) {
        $errors[] = array(
            "field" => "first-name",
            "message" => "Names must not contain leading or trailing spaces.",
        );
    }
    else if (preg_match("/\\s{2,}/", $firstName)) {
        $errors[] = array(
            "field" => "first-name",
            "message" => "Names cannot contain two spaces in a row.",
        );
    }
    else if (strlen($firstName) === 0) {
        $errors[] = array(
            "field" => "first-name",
            "message" => "First name cannot be empty.",
        );
    }
}

function validateLastName($lastName, & $errors) {
    if (trim($lastName) !== $lastName) {
        $errors[] = array(
            "field" => "last-name",
            "message" => "Names must not contain leading or trailing spaces.",
        );
    }
    else if (preg_match("/\\s{2,}/", $lastName)) {
        $errors[] = array(
            "field" => "last-name",
            "message" => "Names cannot contain two spaces in a row.",
        );
    }
}

function validateEmail($email, & $errors) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = array(
            "field" => "email",
            "message" => "Invalid email provided. Please check for typos.",
        );
    }
}

function validatePhone($phone, & $errors) {
    if (!preg_match("/^\\(\\d{3,3}\\) \\d{3,3}\\-\\d{4,4}$/", $phone)) {
        $errors[] = array(
            "field" => "phone",
            "message" => "Invalid phone number.",
        );
    }
}

function validateUsername($username, & $errors) {
    if (!preg_match("/^[A-Za-z0-9]{3,30}$/", $username)) {
        $errors[] = array(
            "field" => "username",
            "message" => "Username should be alphanumeric and 3-30 characters long.",
        );
    }
}

function validatePassword($password, & $errors) {
    if (strlen($password) < 8 || strlen($password) > 255) {
        $errors[] = array(
            "field" => "password",
            "message" => "Password must be 8-255 characters long.",
        );
    }
}
