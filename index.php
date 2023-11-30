<?php
include_once 'actions/bootstrap.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Survey Mass</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap");
    </style>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $action = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $action = trim($action, '/');

        $allowedActions = ['login', 'register']; // List of allowed pages
        $actionFile = 'actions/' . $action . '.php';

        if (in_array($action, $allowedActions) && file_exists($actionFile)) {
            include_once $actionFile;
        } else {
            include_once 'views/404.php'; // Default or 404 page
        }
    } else {
        $page = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $page = trim($page, '/');

        $allowedPages = ['login', 'register']; // List of allowed pages
        $pageFile = 'views/' . $page . '.php';

        if (in_array($page, $allowedPages) && file_exists($pageFile)) {
            include_once $pageFile;
        } else {
            include_once 'views/404.php'; // Default or 404 page
        }
    }
    ?>
</body>

</html>