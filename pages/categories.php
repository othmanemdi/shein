<?php

ob_start();


$title = "Catégories page";

$categories = $pdo->query("SELECT * FROM categories ORDER BY id DESC")->fetchAll();
// dd($categories);

$content_php = ob_get_clean();

ob_start(); ?>
<style>

</style>

<?php $content_css = ob_get_clean();

ob_start(); ?>

<h1>Catégories</h1>

<a href="categorie_add" class="btn btn-primary mb-2">Ajouter</a>

<table class="table table-sm table-bordered table-hover">
    <thead>
        <tr class="table-dark">
            <th>Id</th>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($categories as $key => $m) : ?>
            <tr>
                <td><?= $m->id ?></td>
                <td><?= ucfirst($m->nom) ?></td>

                <td>
                    <a href="categorie_info&id=<?= $m->id ?>" class="btn btn-sm btn-primary">
                        Afficher
                    </a>

                    <a href="categorie_update&id=<?= $m->id ?>" class="btn btn-sm btn-dark">
                        Modifier
                    </a>

                    <a href="categorie_delete&id=<?= $m->id ?>" class="btn btn-sm btn-danger">
                        Supprimer
                    </a>
                </td>
            </tr>
        <?php endforeach ?>


    </tbody>
</table>

<?php $content_html = ob_get_clean();

ob_start(); ?>

<script>
    // alert(123)
</script>

<?php $content_js = ob_get_clean(); ?>