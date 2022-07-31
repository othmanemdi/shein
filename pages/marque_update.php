<?php

ob_start();

$title = "Modifier page";

$marque_id = (int)$_GET['id'];

if ($marque_id == 0) {
    header('Location: marques');
    exit();
}

if (isset($_POST['marque_update_btn'])) {

    $nom = ucfirst(strtolower($_POST['nom_input']));
    $pdo->query("UPDATE marques SET nom = '$nom' WHERE id = $marque_id");

    header('Location: marques');
    die();
}

// UPDATE marques SET nom = 'Sourie' WHERE id = 20;
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

<h1>Modifier la marque</h1>


<div class="card">
    <div class="card-body">

        <form method="post">

            <div class="mb-3">
                <label for="nom" class="form-label">Nom:</label>
                <input name="nom_input" type="text" class="form-control" id="nom" value="<?= $marque->nom ?>" placeholder="Nom:">
            </div>

            <button name="marque_update_btn" type="submit" class="btn btn-primary">
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