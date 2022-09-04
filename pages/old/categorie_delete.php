<?php

ob_start();

$title = "Delete page";


$categorie_id = (int)$_GET['id'];

if ($categorie_id == 0) {
    $_SESSION['flash']['danger'] = "Id introuvable";
    header('Location: categories');
    exit();
}


if (isset($_POST['categorie_delete_btn'])) {

    $pdo->query("DELETE FROM categories WHERE id = $categorie_id");

    $_SESSION['flash']['success'] = "Bien supprimer";
    header('Location: categories');
    die();
}



$categorie = $pdo->query("SELECT * FROM categories WHERE id = $categorie_id LIMIT 1")->fetch();

// Check if $categorie false
if (!$categorie) {
    header('Location: categories');
    exit();
}

$content_php = ob_get_clean();

ob_start(); ?>
<style>

</style>

<?php $content_css = ob_get_clean();

ob_start(); ?>

<h1>Delete <?= $categorie->nom ?></h1>


<div class="card">
    <div class="card-body">
        <ul>
            <li>Id: <?= $categorie->id ?></li>
            <li>Nom: <?= $categorie->nom ?></li>
        </ul>
    </div>
</div>

<h3 class="text-danger">
    Voulez vous vraiment supprimer <?= strtolower($categorie->nom) ?> ?
</h3>

<form method="post">

    <button name="categorie_delete_btn" type="submit" class="btn btn-danger">Supprimer</button>

</form>


<a href="categories" class="btn btn-dark">Retour</a>








<?php $content_html = ob_get_clean();

ob_start(); ?>

<script>
    // alert(123)
</script>

<?php $content_js = ob_get_clean(); ?>