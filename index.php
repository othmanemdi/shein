<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
if (isset($_GET['page']) && preg_match("/^[a-zA-Z0-9_-]*$/", $_GET['page'])) {
    $page = htmlspecialchars(trim($_GET['page']));
} else {
    $page = "home";
}

$page_file = $page . ".php";

$pages = scandir('pages/');

if (in_array($page_file, $pages)) {
    require_once 'pages/' . $page_file;
    // echo "Ok ";
} else {
    require_once 'pages/404.php';
    // echo "Pas Ok ";
}

// echo "<pre>";
// print_r($page_file);
// echo "</pre>";

require_once "database/db.php";

require_once "helpers/functions.php";

?>


<!doctype html>
<html lang="en">

<head>
    <?php require_once "pages/body/head.php" ?>
</head>

<body>

    <?php require_once "pages/body/nav.php" ?>

    <div class="container mt-5">
        <h1>Hello, world! Master page</h1>
    </div>

    <?php require_once "pages/body/footer.php" ?>

    <?php require_once "pages/body/script.php" ?>

</body>

</html>