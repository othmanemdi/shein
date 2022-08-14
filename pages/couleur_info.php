<?php

ob_start();

$title = "Couleur info page";

$couleur_id = (int)$_GET['id'];

if ($couleur_id == 0) {
    $_SESSION['flash']['danger'] = "Id introuvable";
    header('Location: couleurs');
    exit();
}

$couleur = $pdo->query("SELECT * FROM couleurs WHERE id = $couleur_id LIMIT 1")->fetch();

// Check if $couleur false
if (!$couleur) {
    $_SESSION['flash']['danger'] = "couleur introuvable";
    header('Location: couleurs');
    exit();
}



$content_php = ob_get_clean();

ob_start(); ?>
<style>

</style>

<?php $content_css = ob_get_clean();

ob_start(); ?>

<h1>Couleur info</h1>

<div class="card">
    <div class="card-body">
        <ul>
            <li>Id: <?= $couleur->id ?></li>
            <li>Nom: <?= $couleur->nom ?></li>
        </ul>
    </div>
</div>

<?php $content_html = ob_get_clean();

ob_start(); ?>

<script>
    // alert(123)
</script>

<?php $content_js = ob_get_clean(); ?>