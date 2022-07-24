<?php

ob_start();

$title = "Ajouter une nouvelle marque";

if (isset($_POST['marque_add_btn'])) {
    // $nom = ucfirst(strtolower($_POST['nom_input']));
    $nom = $_POST['nom_input'];
    $pdo->query("INSERT INTO marques (id, nom) VALUES (NULL, '$nom')");

    header('Location: marques');
    die();

    // dd($nom);
}


$content_php = ob_get_clean();

ob_start(); ?>
<style>

</style>

<?php $content_css = ob_get_clean();

ob_start(); ?>

<h1>Ajouter une nouvelle marque</h1>

<div class="card">
    <div class="card-body">

        <form method="post">

            <div class="mb-3">
                <label for="nom" class="form-label">Nom:</label>
                <input name="nom_input" type="text" class="form-control" id="nom" placeholder="Nom:">
            </div>

            <button name="marque_add_btn" type="submit" class="btn btn-success">Ajouter</button>

        </form>

    </div>
</div>


<?php $content_html = ob_get_clean();

ob_start(); ?>

<script>
    // alert(123)
</script>

<?php $content_js = ob_get_clean(); ?>