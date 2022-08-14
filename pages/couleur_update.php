<?php

ob_start();


$title = "Modifier page";

$couleur_id = (int)$_GET['id'];

if ($couleur_id == 0) {
    $_SESSION['flash']['danger'] = "Id introuvable";
    header('Location: couleurs');
    exit();
}

if (isset($_POST['couleur_update_btn'])) {

    $nom = ucfirst(strtolower($_POST['nom_input']));
    $pdo->query("UPDATE couleurs SET nom = '$nom' WHERE id = $couleur_id");

    $_SESSION['flash']['success'] = 'Bien enregister';
    header('Location: couleurs');
    die();
}

// UPDATE couleurs SET nom = 'Sourie' WHERE id = 20;
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

<h1>Modifier la couleur</h1>
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
                <input name="nom_input" type="text" class="form-control" id="nom" value="<?= $couleur->nom ?>" placeholder="Nom:">
            </div>

            <button name="couleur_update_btn" type="submit" class="btn btn-primary">
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