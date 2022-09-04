<?php

ob_start();

$title = "Produits page";

if (isset($_POST['produit_add_btn'])) {

    $nom = ucfirst(strtolower($_POST['nom_input']));
    $pdo->query("INSERT INTO produits (id, nom) VALUES (NULL, '$nom')");
    $_SESSION['flash']['success'] = "Bien ajouter";

    header('Location: produits');
    exit();
}

if (isset($_POST['produit_update_btn'])) {

    $produit_id = (int) $_POST['id_input'];
    $nom = ucfirst(strtolower($_POST['nom_input']));
    $pdo->query("UPDATE produits SET nom = '$nom', updated_at = NOW( WHERE id = $produit_id");

    $_SESSION['flash']['success'] = 'Bien enregister';
    header('Location: produits');
    die();
}


if (isset($_POST['produit_delete_btn'])) {
    $produit_id = (int) $_POST['id_input'];

    // $pdo->query("UPDATE produits SET is_active = 0 WHERE id = $produit_id");
    $pdo->query("UPDATE produits SET deleted_at = NOW() WHERE id = $produit_id");
    // $pdo->query("DELETE FROM produits WHERE id = $produit_id");

    $_SESSION['flash']['success'] = "Bien supprimer";
    header('Location: produits');
    die();
}

$produits = $pdo->query("SELECT 
p.id AS produit_id,
p.image,
p.reference,
p.nom AS produit_nom,
p.prix,
p.ancien_prix,
p.description,
m.nom AS marque_nom,
cg.nom AS categorie_nom,
c.nom AS couleur_nom
FROM 
produits p
LEFT JOIN marques m ON m.id = p.marque_id
LEFT JOIN categories cg ON cg.id = p.categorie_id
LEFT JOIN couleurs c ON c.id = p.couleur_id

WHERE p.deleted_at IS NULL ORDER BY p.id DESC")->fetchAll();






// $produits = $pdo->query("SELECT * FROM produits WHERE is_active = 1 ORDER BY id DESC")->fetchAll();

$content_php = ob_get_clean();

ob_start(); ?>

<?php $content_css = ob_get_clean();

ob_start(); ?>

<h1>Produits</h1>

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

                    <button name="produit_add_btn" type="submit" class="btn btn-success">Ajouter</button>
                </div>

            </form>
        </div>
    </div>
</div>


<table class="table table-sm table-bordered table-hover">
    <thead>
        <tr class="table-dark">
            <th>Id</th>
            <th>IMG</th>
            <th>Référence</th>
            <th>Nom</th>
            <th>Marque</th>
            <th>Catégorie</th>
            <th>Couleur</th>
            <th>Prix</th>
            <th>Ancien Prix</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($produits as $key => $m) : ?>
            <tr>
                <td><?= $m->produit_id ?></td>
                <td>
                    <img src="images/produits/<?= $m->image ?>" width="40" alt="">
                </td>
                <td><?= $m->reference == '' ? '' :  ucfirst($m->reference) ?></td>

                <td><?= ucfirst($m->produit_nom) ?></td>

                <td><?= ucfirst($m->marque_nom) ?></td>
                <td><?= ucfirst($m->categorie_nom) ?></td>
                <td><?= ucfirst($m->couleur_nom) ?></td>

                <td>
                    <?= $m->prix ?> DH
                </td>
                <td>
                    <?= $m->ancien_prix ?> DH
                </td>
                <td>


                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#brand_show_<?= $m->produit_id ?>">
                        Afficher
                    </button>

                    <div class="modal fade" id="brand_show_<?= $m->produit_id ?>" tabindex="-1" aria-labelledby="brand_show_<?= $m->produit_id ?>Label" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="brand_show_<?= $m->produit_id ?>Label">

                                        Produit info

                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="images/produits/<?= $m->image ?>" alt="">

                                        </div>

                                        <div class="col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <b>Id:</b> <?= $m->produit_id ?>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Nom:</b> <?= ucfirst($m->produit_nom) ?>
                                                </li>

                                                <li class="list-group-item">
                                                    <b>Référence:</b> <?= ucfirst($m->reference) ?>
                                                </li>

                                                <li class="list-group-item">
                                                    <b>Prix:</b>
                                                    <span class="fw-bold">
                                                        <?= $m->prix ?> DH
                                                    </span>
                                                    <del class="text-danger">
                                                        <?= $m->ancien_prix ?> DH
                                                    </del>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Déscription:</b>
                                                    <p>
                                                        <?= $m->description ?>
                                                    </p>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>






                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#brand_update_<?= $m->produit_id ?>">
                        Modifier
                    </button>

                    <div class="modal fade" id="brand_update_<?= $m->produit_id ?>" tabindex="-1" aria-labelledby="brand_update_<?= $m->produit_id ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="brand_update_<?= $m->produit_id ?>Label">
                                            Modifier la produit
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">




                                        <input name="id_input" type="hidden" value="<?= $m->produit_id ?>">


                                        <div class="mb-3">
                                            <label class="form-label">Nom:</label>

                                            <input name="nom_input" type="text" class="form-control" value="<?= $m->produit_nom ?>" placeholder="Nom:">
                                        </div>



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        <button name="produit_update_btn" type="submit" class="btn btn-primary">
                                            Modifier
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>



                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#brand_delete_<?= $m->produit_id ?>">
                        Supprimer
                    </button>

                    <div class="modal fade" id="brand_delete_<?= $m->produit_id ?>" tabindex="-1" aria-labelledby="brand_delete_<?= $m->produit_id ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="brand_delete_<?= $m->produit_id ?>Label">
                                            Supprimer la produit
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <h5 class="text-danger">Voulez vous vraiment supprimer <?= $m->produit_nom ?> ?</h5>



                                        <input name="id_input" type="hidden" value="<?= $m->produit_id ?>">





                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        <button name="produit_delete_btn" type="submit" class="btn btn-danger">
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