<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <title>Contacts - Pokemon Manager</title>
</head>

<body class="contact-body">
    <header>
        <a href="main.php" class="main-logo">POKEMON MANAGER</a>
        <nav class="main-nav-container">
            <ul class="main-nav-links">
                <li>
                    <a href="profile.php" class="main-link">Profile</a>
                </li>
                <li>
                    <a href="contacts.php" class="main-link">Contacts</a>
                </li>
            </ul>
            <form action="https://httpbin.org/post" method="post">
                <button id="sign-out" class="main-button" type="submit">Sign Out</button>
            </form>
        </nav>
    </header>

    <div class="contact-container">
        <div class="contact-header">
            <span>Contacts</span>
            <input type="search" placeholder="Search...">
        </div>
        <div class="table-container">
            <table class="contact-table">
                <thead>
                    <tr>
                        <th class="tb-last-name">Last Name</th>
                        <th class="tb-first-name">First Name</th>
                        <th class="tb-email">Email</th>
                        <th class="tb-phone">Phone</th>
                        <th class="tb-username">Username</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tmplastname</td>
                        <td>Tmpfirstname</td>
                        <td>whatisyouremail@gmail.com</td>
                        <td>1234567890</td>
                        <td>myusernameisuser</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="contact-footer-container">
            <div class="contact-footer">
                <button class="main-button">+ Add Contact</button>
                <button class="main-button">- Delete</button>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <ul class="footer-links">
                <li>
                    <a href="profile.php" class="main-link">Profile</a>
                </li>
                <li>
                    <a href="contacts.php" class="main-link">Contacts</a>
                </li>
            </ul>
        </div>
    </footer>
</body>

</html>