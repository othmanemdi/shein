<?php

ob_start();

$title = "Delete page";


$marque_id = (int)$_GET['id'];

if ($marque_id == 0) {
    $_SESSION['flash']['danger'] = "Id introuvable";
    header('Location: marques');
    exit();
}


if (isset($_POST['marque_delete_btn'])) {

    $pdo->query("DELETE FROM marques WHERE id = $marque_id");

    $_SESSION['flash']['success'] = "Bien supprimer";
    header('Location: marques');
    die();
}



$marque = $pdo->query("SELECT * FROM marques WHERE id = $marque_id LIMIT 1")->fetch();

// Check if $marque false
if (!$marque) {
    header('Location: marques');
    exit();
}

$content_php = ob_get_clean();

ob_start(); ?>
<style>

</style>

<?php $content_css = ob_get_clean();

ob_start(); ?>

<h1>Delete <?= $marque->nom ?></h1>


<div class="card">
    <div class="card-body">
        <ul>
            <li>Id: <?= $marque->id ?></li>
            <li>Nom: <?= $marque->nom ?></li>
        </ul>
    </div>
</div>

<h3 class="text-danger">
    Voulez vous vraiment supprimer <?= strtolower($marque->nom) ?> ?
</h3>

<form method="post">

    <button name="marque_delete_btn" type="submit" class="btn btn-danger">Supprimer</button>

</form>


<a href="marques" class="btn btn-dark">Retour</a>








<?php $content_html = ob_get_clean();

ob_start(); ?>

<script>
    // alert(123)
</script>

<?php $content_js = ob_get_clean(); ?>