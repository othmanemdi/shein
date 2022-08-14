<?php

ob_start();

$title = "Ajouter une nouvelle couleur";

// dd($_POST);

if (isset($_POST['couleur_add_btn'])) {

    $nom = strtolower($_POST['nom_input']);

    $pdo->query("INSERT INTO `couleurs` (`id`, `nom`) VALUES (NULL, '$nom')");

    header('Location: couleurs');
    exit();
}
















if (isset($_POST['couleur_add_btna'])) {
    $nom = ucfirst(strtolower($_POST['nom_input']));
    $pdo->query("INSERT INTO couleurs (id, nom) VALUES (NULL, '$nom')");

    header('Location: couleurs');
    die();

    // dd($nom);
}


$content_php = ob_get_clean();

ob_start(); ?>
<style>

</style>

<?php $content_css = ob_get_clean();

ob_start(); ?>

<h1>Ajouter une nouvelle couleur</h1>

<div class="card">
    <div class="card-body">

        <form method="post">

            <div class="mb-3">
                <label for="nom" class="form-label">Nom:</label>
                <input name="nom_input" type="text" class="form-control" id="nom" placeholder="Nom:">
            </div>

            <button name="couleur_add_btn" type="submit" class="btn btn-success">Ajouter</button>

        </form>

    </div>
</div>


<?php $content_html = ob_get_clean();

ob_start(); ?>

<script>
    // alert(123)
</script>

<?php $content_js = ob_get_clean(); ?>