<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <script src="script.js"></script>
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
            <input type="search" placeholder="Search...">
        </div>
        <div class="table-container">
            <table id="contacts-table" class="contact-table">
                <thead>
                    <tr>
                        <th></th>
                        <th class="tb-first-name">First Name</th>
                        <th class="tb-last-name">Last Name</th>
                        <th class="tb-email">Email</th>
                        <th class="tb-phone">Phone</th>
                        <th class="tb-username">Username</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><button id="delete-btn" class="main-button border delete" onclick="deleteContact(this)">X</button></td>
                        <td>Tmpfirstname</td>
                        <td>Tmplastname</td>
                        <td>whatisyouremail@gmail.com</td>
                        <td>1234567890</td>
                        <td>myusernameisuser</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="contact-footer-container">
            <div id="table-footer" class="contact-footer">
                <button id="add-contact" class="main-button border" onclick="addContact()">+ Add Contact</button>
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