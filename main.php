<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <title>Pokemon Manager</title>
</head>

<body class="main-body">
    <!-- Header section -->
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

    <!-- Main body section -->
    <div class="main-content">
        <h1 class="welcome-user">Welcome, FirstName LastName</h1>
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