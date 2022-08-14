<?php

ob_start();

$title = "Ajouter une nouvelle catégorie";

// dd($_POST);

if (isset($_POST['categorie_add_btn'])) {

    $nom = ucfirst(strtolower($_POST['nom_input']));

    $pdo->query("INSERT INTO `categories` (`id`, `nom`) VALUES (NULL, '$nom')");
    $_SESSION['flash']['success'] = "Bien ajouter";

    header('Location: categories');
    exit();
}


















$content_php = ob_get_clean();

ob_start(); ?>
<style>

</style>

<?php $content_css = ob_get_clean();

ob_start(); ?>

<h1>Ajouter une nouvelle categorie</h1>

<div class="card">
    <div class="card-body">

        <form method="post">

            <div class="mb-3">
                <label for="nom" class="form-label">Nom:</label>
                <input name="nom_input" type="text" class="form-control" id="nom" placeholder="Nom:">
            </div>

            <button name="categorie_add_btn" type="submit" class="btn btn-success">Ajouter</button>

        </form>

    </div>
</div>


<?php $content_html = ob_get_clean();

ob_start(); ?>

<script>
    // alert(123)
</script>

<?php $content_js = ob_get_clean(); ?>