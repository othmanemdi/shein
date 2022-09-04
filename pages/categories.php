<?php

ob_start();

$title = "Catégories page";

if (isset($_POST['categorie_add_btn'])) {

    $nom = ucfirst(strtolower($_POST['nom_input']));
    $pdo->query("INSERT INTO categories (id, nom) VALUES (NULL, '$nom')");
    $_SESSION['flash']['success'] = "Bien ajouter";

    header('Location: categories');
    exit();
}

if (isset($_POST['categorie_update_btn'])) {

    $categorie_id = (int) $_POST['id_input'];
    $nom = ucfirst(strtolower($_POST['nom_input']));
    $pdo->query("UPDATE categories SET nom = '$nom', updated_at = NOW( WHERE id = $categorie_id");

    $_SESSION['flash']['success'] = 'Bien enregister';
    header('Location: categories');
    die();
}


if (isset($_POST['categorie_delete_btn'])) {
    $categorie_id = (int) $_POST['id_input'];

    // $pdo->query("UPDATE categories SET is_active = 0 WHERE id = $categorie_id");
    $pdo->query("UPDATE categories SET deleted_at = NOW() WHERE id = $categorie_id");
    // $pdo->query("DELETE FROM categories WHERE id = $categorie_id");

    $_SESSION['flash']['success'] = "Bien supprimer";
    header('Location: categories');
    die();
}

$categories = $pdo->query("SELECT * FROM categories WHERE deleted_at IS NULL ORDER BY id DESC")->fetchAll();
// $categories = $pdo->query("SELECT * FROM categories WHERE is_active = 1 ORDER BY id DESC")->fetchAll();

$content_php = ob_get_clean();

ob_start(); ?>

<?php $content_css = ob_get_clean();

ob_start(); ?>

<h1>Catégories</h1>

<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#brand_add">
    <i class="fa fa-plus"></i>
    Ajouter
</button>

<div class="modal fade" id="brand_add" tabindex="-1" aria-labelledby="brand_addLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="post">

                <div class="modal-header">
                    <h5 class="modal-title" id="brand_addLabel">
                        <i class="fa fa-plus"></i>
                        Ajouter
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom:</label>
                        <input name="nom_input" type="text" class="form-control" id="nom" placeholder="Nom:">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                    <button name="categorie_add_btn" type="submit" class="btn btn-success">Ajouter</button>
                </div>

            </form>
        </div>
    </div>
</div>


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


                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#brand_show_<?= $m->id ?>">
                        Afficher
                    </button>

                    <div class="modal fade" id="brand_show_<?= $m->id ?>" tabindex="-1" aria-labelledby="brand_show_<?= $m->id ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="brand_show_<?= $m->id ?>Label">

                                        Catégorie info

                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <ul class="list-group">
                                        <li class="list-group-item"><b>Id:</b> <?= $m->id ?></li>
                                        <li class="list-group-item"><b>Nom:</b> <?= ucfirst($m->nom) ?></li>
                                    </ul>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#brand_update_<?= $m->id ?>">
                        Modifier
                    </button>

                    <div class="modal fade" id="brand_update_<?= $m->id ?>" tabindex="-1" aria-labelledby="brand_update_<?= $m->id ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="brand_update_<?= $m->id ?>Label">
                                            Modifier la categorie
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">




                                        <input name="id_input" type="hidden" value="<?= $m->id ?>">


                                        <div class="mb-3">
                                            <label class="form-label">Nom:</label>

                                            <input name="nom_input" type="text" class="form-control" value="<?= $m->nom ?>" placeholder="Nom:">
                                        </div>



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        <button name="categorie_update_btn" type="submit" class="btn btn-primary">
                                            Modifier
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>



                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#brand_delete_<?= $m->id ?>">
                        Supprimer
                    </button>

                    <div class="modal fade" id="brand_delete_<?= $m->id ?>" tabindex="-1" aria-labelledby="brand_delete_<?= $m->id ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="brand_delete_<?= $m->id ?>Label">
                                            Supprimer la categorie
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <h5 class="text-danger">Voulez vous vraiment supprimer <?= $m->nom ?> ?</h5>



                                        <input name="id_input" type="hidden" value="<?= $m->id ?>">





                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        <button name="categorie_delete_btn" type="submit" class="btn btn-danger">
                                            Supprimer
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

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