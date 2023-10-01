<?php

include_once("api/include/database.php");

session_start();

// if the user is not logged in, redirect them to the login page
if (!isset($_SESSION["user-id"])) {
    header("Location: /login.php");
    die();
}

$searchQuery = "";

if (isset($_GET["q"]))
    $searchQuery = $_GET["q"];

if (is_numeric($_GET["page"]))
    $currPage = $_GET["page"];
else
    $currPage = 1;

$numContacts = countContacts($_SESSION["user-id"], $searchQuery);
$numPages = intdiv($numContacts + 19, 20);

if ($currPage > $numPages)
    $currPage = $numPages;
if ($currPage < 1)
    $currPage = 1;

$contacts = getUserContacts($_SESSION["user-id"], ($currPage - 1) * $CONTACTS_PER_PAGE, $searchQuery);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <script defer src="contacts.js"></script>
    <script defer src="signout.js"></script>
    <title>Contacts - Pokemon Manager</title>
</head>

<body class="contact-body">
    <header>
        <nav class="top-nav-bar">
            <div class="left-links">
                <a href="main.php" class="top-nav-bar-logo">POKEMON MANAGER</a>
            </div>

            <div class="right-links">
                <ul class="top-nav-main-links">
                    <li>
                        <a href="profile.php" class="main-link border">Edit Profile</a>
                    </li>
                    <li>
                        <a href="contacts.php" class="main-link border">Contacts</a>
                    </li>
                </ul>

                <button id="sign-out" class="main-button border" type="submit">Sign Out</button>
            </div>
        </nav>
    </header>

    <div class="contact-container">
        <div class="contact-header">
            <span>Contacts</span>
            <input id="search" type="search" value="<?php
                if (isset($_GET["q"])) {
                    echo htmlspecialchars($_GET["q"]);
                }
            ?>" placeholder="Search...">
        </div>
        <div class="table-container">
            <table id="contacts-table" class="contact-table">
                <thead>
                    <tr>
                        <th class="tb-first-name">First Name</th>
                        <th class="tb-last-name">Last Name</th>
                        <th class="tb-email">Email</th>
                        <th class="tb-phone">Phone</th>
                        <th class="tb-date">Date</th>
                        <th class="tb-actions"></th>
                    </tr>
                </thead>
                <tbody id="contact-tbody">
                    <?php if (count($contacts) === 0): ?>
                        <tr>
                            <td colspan="6" style="text-align: center;">No results</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($contacts as $key => $contact): ?>
                        <tr data-contact-id="<?= $contact["contact-id"] ?>">
                            <td><?= $contact["first-name"] ?></td>
                            <td><?= $contact["last-name"] ?></td>
                            <td><?= $contact["email"] ?></td>
                            <td><?= $contact["phone"] ?></td>
                            <td><?= $contact["date-recorded"] ?></td>
                            <td>
                                <button class="main-button border delete edit-button">Edit</button>
                                <button class="main-button border delete delete-button">Del</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="contact-footer-container">
            <div class="contact-footer">
                <?php if (count($contacts) !== 0): ?>
                    <button id="prev-page" data-page="<?= $currPage - 1 ?>" class="main-button border" <?php
                        if ($currPage <= 1)
                            echo "disabled";
                    ?>>◀</button>
                    <div class="page-display">Page<br><?= $currPage ?>/<?= $numPages ?></div>
                    <button id="next-page" data-page="<?= $currPage + 1 ?>" class="main-button border" <?php
                        if ($currPage >= $numPages)
                            echo "disabled";
                    ?>>▶</button>
                <?php endif; ?>
            </div>
            <div id="table-footer" class="contact-footer">
                <button id="add-contact" class="main-button border">Add Contact</button>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <ul class="footer-links">
                <li>
                    <a href="profile.php" class="main-link border">Edit Profile</a>
                </li>
                <li>
                    <a href="contacts.php" class="main-link border">Contacts</a>
                </li>
            </ul>
        </div>
    </footer>
</body>

</html>