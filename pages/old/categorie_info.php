<?php

ob_start();

$title = "Catégorie info page";

$categorie_id = (int)$_GET['id'];

if ($categorie_id == 0) {
    $_SESSION['flash']['danger'] = "Id introuvable";
    header('Location: categories');
    exit();
}

$categorie = $pdo->query("SELECT * FROM categories WHERE id = $categorie_id LIMIT 1")->fetch();

// Check if $categorie false
if (!$categorie) {
    $_SESSION['flash']['danger'] = "categorie introuvable";
    header('Location: categories');
    exit();
}



$content_php = ob_get_clean();

ob_start(); ?>
<style>

</style>

<?php $content_css = ob_get_clean();

ob_start(); ?>

<h1>Catégorie info</h1>

<div class="card">
    <div class="card-body">
        <ul>
            <li>Id: <?= $categorie->id ?></li>
            <li>Nom: <?= $categorie->nom ?></li>
        </ul>
    </div>
</div>

<?php $content_html = ob_get_clean();

ob_start(); ?>

<script>
    // alert(123)
</script>

<?php $content_js = ob_get_clean(); ?>