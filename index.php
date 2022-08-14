<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['page']) && preg_match("/^[a-zA-Z0-9_-]*$/", $_GET['page'])) {
    $page = htmlspecialchars(trim($_GET['page']));
} else {
    $page = "home";
}

$page_file = $page . ".php";

$pages = scandir('pages/');

// $personnes = [];
// $personnes[] = "Abdellah";
// $personnes[] = "Nordine";
// $personnes[] = "Youssra";
// $personnes[] = "Hind";
// $personnes[] = "Nabila";
// $personnes[] = "Mohammed";

// if (in_array("Lahcen", $personnes)) {
//     echo "Ok";
// } else {
//     echo "Pas Ok";
// }

// echo '<pre>';
// print_r($personnes);
// echo '</pre>';
// die();
require_once "database/db.php";
// print_r($pdo);
// die();
require_once "helpers/functions.php";

if (in_array($page_file, $pages)) {
    require_once 'pages/' . $page_file;
    // echo "Ok ";
} else {
    require_once 'pages/404.php';
    // echo "Pas Ok ";
}
// die();
// echo "<pre>";
// print_r($page_file);
// echo "</pre>";


echo $content_php ?? ""

?>
<!doctype html>
<html lang="en">

<head>
    <?php require_once "pages/body/head.php" ?>
    <?= $content_css ?? "" ?>

</head>

<body>

    <?php require_once "pages/body/nav.php" ?>

    <div class="container mt-5">

        <?php if (isset($_SESSION['flash'])) : ?>
            <?php foreach ($_SESSION['flash'] as $color => $message) : ?>
                <div class="alert alert-<?= $color ?> mt-3">
                    <?= $message; ?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>

        <?= $content_html ?? ""  ?>
    </div>

    <?php require_once "pages/body/footer.php" ?>

    <?= $content_js ?? "" ?>

    <?php require_once "pages/body/script.php" ?>

</body>

</html>