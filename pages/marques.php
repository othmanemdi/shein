<?php

ob_start();

$title = "Marques page";

if (isset($_POST['marque_add_btn'])) {

    $nom = ucfirst(strtolower($_POST['nom_input']));
    $pdo->query("INSERT INTO marques (id, nom) VALUES (NULL, '$nom')");
    $_SESSION['flash']['success'] = "Bien ajouter";

    header('Location: marques');
    exit();
}

$marques = $pdo->query("SELECT * FROM marques ORDER BY id DESC")->fetchAll();

$content_php = ob_get_clean();

ob_start(); ?>

<?php $content_css = ob_get_clean();

ob_start(); ?>

<h1>Marques</h1>

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

                    <button name="marque_add_btn" type="submit" class="btn btn-success">Ajouter</button>
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

        <?php foreach ($marques as $key => $m) : ?>
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

                                        Marque info

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


                    <a href="marque_update&id=<?= $m->id ?>" class="btn btn-sm btn-dark">
                        Modifier
                    </a>

                    <a href="marque_delete&id=<?= $m->id ?>" class="btn btn-sm btn-danger">
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