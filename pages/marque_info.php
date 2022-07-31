<?php

ob_start();

$title = "Marque info page";

$marque_id = (int)$_GET['id'];

if ($marque_id == 0) {
    header('Location: marques');
    exit();
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

<h1>Marque info</h1>

<div class="card">
    <div class="card-body">
        <ul>
            <li>Id: <?= $marque->id ?></li>
            <li>Nom: <?= $marque->nom ?></li>
        </ul>
    </div>
</div>

<?php $content_html = ob_get_clean();

ob_start(); ?>

<script>
    // alert(123)
</script>

<?php $content_js = ob_get_clean(); ?>