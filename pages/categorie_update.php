<?php

ob_start();


$title = "Modifier page";

$categorie_id = (int)$_GET['id'];

if ($categorie_id == 0) {
    $_SESSION['flash']['danger'] = "Id introuvable";
    header('Location: categories');
    exit();
}

if (isset($_POST['categorie_update_btn'])) {

    $nom = ucfirst(strtolower($_POST['nom_input']));
    $pdo->query("UPDATE categories SET nom = '$nom' WHERE id = $categorie_id");

    $_SESSION['flash']['success'] = 'Bien enregister';
    header('Location: categories');
    die();
}

// UPDATE categories SET nom = 'Sourie' WHERE id = 20;
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

<h1>Modifier la categorie</h1>
<h2>
    <?php
    echo $_SESSION['message'];
    ?>
</h2>

<div class="card">
    <div class="card-body">

        <form method="post">

            <div class="mb-3">
                <label for="nom" class="form-label">Nom:</label>
                <input name="nom_input" type="text" class="form-control" id="nom" value="<?= $categorie->nom ?>" placeholder="Nom:">
            </div>

            <button name="categorie_update_btn" type="submit" class="btn btn-primary">
                Modifier
            </button>

        </form>

    </div>
</div>


<?php $content_html = ob_get_clean();

ob_start(); ?>

<script>
    // alert(123)
</script>

<?php $content_js = ob_get_clean(); ?>