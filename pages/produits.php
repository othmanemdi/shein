<?php

ob_start();

$title = "Produits page";

if (isset($_POST['produit_add_btn'])) {
    // dd($_FILES);

    $target_dir = "images/produits/";

    // $target_file = $target_dir . basename($_FILES["image_product"]["name"]);
    $image_name =  basename($_FILES["image_product"]["name"]);
    $target_file = $target_dir . $image_name;
    $uploadOk = 1;

    // var_dump();
    $extention_image = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // dd();
    // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extentions = ["jpeg", "jpg", "JPEG", "JPG"];
    if (!in_array($extention_image, $extentions)) {
        $_SESSION['flash']['danger'] = "Cette extention n'est pas valide (.$extention_image) Seule les images (JPG) sont autorisez";
        header('Location: produits');
        die();
    }

    if (move_uploaded_file($_FILES["image_product"]["tmp_name"], $target_file)) {
    }

    $reference = ucfirst(strtolower($_POST['reference_input']));
    $nom = ucfirst(strtolower($_POST['nom_input']));
    $marque_id = (int)$_POST['marque_id_input'];
    $categorie_id = (int)$_POST['categorie_id_input'];
    $couleur_id = (int)$_POST['couleur_id_input'];
    $prix = $_POST['prix_input'];
    $ancien_prix = $_POST['ancien_prix_input'];
    $description = $_POST['description_input'];

    $product = $pdo->prepare("INSERT INTO produits SET 
        nom = :nom,
        reference = :reference,
        prix = :prix,
        ancien_prix = :ancien_prix,
        marque_id = :marque_id,
        categorie_id = :categorie_id,
        couleur_id = :couleur_id,
        description = :description,
        image = :image
");
    $product->execute(
        [
            'nom' => $nom,
            'reference' => $reference,
            'prix' => $prix,
            'ancien_prix' => $ancien_prix,
            'marque_id' => $marque_id,
            'categorie_id' => $categorie_id,
            'couleur_id' => $couleur_id,
            'description' => $description,
            'image' => $image_name
        ]
    );



    // $pdo->query("INSERT INTO produits (id, nom) VALUES (NULL, '$nom')");
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

$marques = $pdo->query("SELECT id,nom FROM marques WHERE deleted_at IS NULL ORDER BY id DESC")->fetchAll();

$categories = $pdo->query("SELECT id,nom FROM categories WHERE deleted_at IS NULL ORDER BY id DESC")->fetchAll();

$couleurs = $pdo->query("SELECT id,nom FROM couleurs WHERE deleted_at IS NULL ORDER BY id DESC")->fetchAll();





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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">

                <div class="modal-header">
                    <h5 class="modal-title" id="brand_addLabel">
                        <i class="fa fa-plus"></i>
                        Ajouter
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="reference" class="form-label">Référence:</label>
                                <input name="reference_input" type="text" class="form-control" id="reference" placeholder="Référence:">
                            </div>
                            <!-- mb-3 -->
                        </div>
                        <!-- col -->


                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom:</label>
                                <input name="nom_input" type="text" class="form-control" id="nom" placeholder="Nom:">
                            </div>
                            <!-- mb-3 -->
                        </div>
                        <!-- col -->

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="marque_id" class="form-label">Marques:</label>

                                <select name="marque_id_input" id="marque_id" class="form-select" aria-label="Default select example">
                                    <?php foreach ($marques as $key => $m) : ?>

                                        <option value="<?= $m->id ?>"><?= ucfirst($m->nom) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <!-- mb-3 -->
                        </div>
                        <!-- col -->


                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="categorie_id" class="form-label">Catégories:</label>

                                <select name="categorie_id_input" id="categorie_id" class="form-select" aria-label="Default select example">
                                    <?php foreach ($categories as $key => $m) : ?>

                                        <option value="<?= $m->id ?>"><?= ucfirst($m->nom) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <!-- mb-3 -->
                        </div>
                        <!-- col -->



                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="couleur_id" class="form-label">Couleur:</label>

                                <select name="couleur_id_input" id="couleur_id" class="form-select" aria-label="Default select example">
                                    <?php foreach ($couleurs as $key => $m) : ?>

                                        <option value="<?= $m->id ?>"><?= ucfirst($m->nom) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <!-- mb-3 -->
                        </div>
                        <!-- col -->






                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="prix" class="form-label">Prix:</label>
                                <input name="prix_input" type="number" class="form-control" id="prix" placeholder="Prix:">
                            </div>
                            <!-- mb-3 -->
                        </div>
                        <!-- col -->

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="ancien_prix" class="form-label">Ancien Prix:</label>
                                <input name="ancien_prix_input" type="number" class="form-control" id="ancien_prix" placeholder="Ancien Prix:">
                            </div>
                            <!-- mb-3 -->
                        </div>
                        <!-- col -->

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="image_product" class="form-label">Image:</label>
                                <input type="file" name="image_product" id="image_product" class="form-control">
                            </div>
                            <!-- mb-3 -->
                        </div>
                        <!-- col -->


                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="ancien_prix" class="form-label">Déscription:</label>
                                <textarea name="description_input" id="description" class="form-control" placeholder="Déscription"></textarea>

                            </div>
                            <!-- mb-3 -->
                        </div>
                        <!-- col -->




                    </div>
                    <!-- row -->

                </div>
                <!-- modal-body -->

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
                                                    <b>Marque:</b> <?= ucfirst($m->marque_nom) ?>
                                                </li>


                                                <li class="list-group-item">
                                                    <b>Catégorie:</b> <?= ucfirst($m->categorie_nom) ?>
                                                </li>

                                                <li class="list-group-item">
                                                    <b>Couleur:</b>

                                                    <i class="fas fa-circle" style="color:<?= $m->couleur_nom ?>"></i>
                                                    <?= ucfirst($m->couleur_nom) ?>
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