<?php

ob_start();

$title = "Delete page";


$couleur_id = (int)$_GET['id'];

if ($couleur_id == 0) {
    $_SESSION['flash']['danger'] = "Id introuvable";
    header('Location: couleurs');
    exit();
}


if (isset($_POST['couleur_delete_btn'])) {

    $pdo->query("DELETE FROM couleurs WHERE id = $couleur_id");

    $_SESSION['flash']['success'] = "Bien supprimer";
    header('Location: couleurs');
    die();
}



$couleur = $pdo->query("SELECT * FROM couleurs WHERE id = $couleur_id LIMIT 1")->fetch();

// Check if $couleur false
if (!$couleur) {
    header('Location: couleurs');
    exit();
}

$content_php = ob_get_clean();

ob_start(); ?>
<style>

</style>

<?php $content_css = ob_get_clean();

ob_start(); ?>

<h1>Delete <?= $couleur->nom ?></h1>


<div class="card">
    <div class="card-body">
        <ul>
            <li>Id: <?= $couleur->id ?></li>
            <li>Nom: <?= $couleur->nom ?></li>
        </ul>
    </div>
</div>

<h3 class="text-danger">
    Voulez vous vraiment supprimer <?= strtolower($couleur->nom) ?> ?
</h3>

<form method="post">

    <button name="couleur_delete_btn" type="submit" class="btn btn-danger">Supprimer</button>

</form>


<a href="couleurs" class="btn btn-dark">Retour</a>








<?php $content_html = ob_get_clean();

ob_start(); ?>

<script>
    // alert(123)
</script>

<?php $content_js = ob_get_clean(); ?>