<?php

ob_start();

$title = "Shop page";


if (isset($_POST['add_to_cart'])) {
    $ip_server = IP_SERVER;
    $produit_id = (int)$_POST['produit_id'];
    // $prix = (float)$_POST['prix'];


    $cart_info_from_db = $pdo->query("SELECT id FROM carts WHERE ip = '$ip_server' LIMIT 1")->fetch();

    if (!$cart_info_from_db) {
        $cart = $pdo->prepare("INSERT INTO carts SET ip = :ip");
        $cart->execute(
            ['ip' => $ip_server]
        );

        $cart_id = $pdo->lastInsertId();
    } else
        $cart_id = $cart_info_from_db->id;


    $check_if_product_in_cart_product = $pdo->query("SELECT id FROM cart_produit WHERE cart_id = $cart_id AND produit_id = $produit_id LIMIT 1")->fetch();

    // dd($check_if_product_in_cart_product);

    if ($check_if_product_in_cart_product) {
        // echo "Update";
        $produit_id_checked = $check_if_product_in_cart_product->id;

        $pdo->query("UPDATE cart_produit SET qt = qt + 1 WHERE id = $produit_id_checked");
    } else {
        // echo "Insert";
        $cart_produit = $pdo->prepare("INSERT INTO cart_produit 
        SET
        cart_id = :cart_id,
        produit_id = :produit_id
        ");
        $cart_produit->execute(
            [
                'cart_id' => $cart_id,
                'produit_id' => $produit_id
            ]
        );
    }

    $_SESSION['flash']['success'] = 'Bien ajouter';
    header('Location: cart');
    die();
}





$marques = $pdo->query("SELECT * FROM marques ORDER BY id DESC")->fetchAll();
$categories = $pdo->query("SELECT * FROM categories ORDER BY id DESC")->fetchAll();
$couleurs = $pdo->query("SELECT * FROM couleurs ORDER BY id DESC")->fetchAll();


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

$content_php = ob_get_clean();

ob_start(); ?>
<style>

</style>

<?php $content_css = ob_get_clean();

ob_start(); ?>

<h1>Shop</h1>



<nav aria-label="breadcrumb mt-5">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            Shop
        </li>
    </ol>
</nav>

<!-- row 1 -->

<div class="row">
    <!-- les filtres -->
    <div class="col-md-3">
        <h4>Marques</h4>
        <ul class="list-group list-group-flush">
            <?php foreach ($marques as $marque) : ?>
                <label class="list-group-item">
                    <input class="form-check-input" type="checkbox">
                    <span class="ms-1">
                        <?= ucwords(strtolower($marque->nom)) ?>
                    </span>
                </label>
            <?php endforeach ?>

        </ul>

        <h4 class="mt-3">Catégories</h4>


        <div class="list-group list-group-flush mx-0">
            <?php foreach ($categories as $categorie) : ?>
                <label class="list-group-item">
                    <input class="form-check-input" type="checkbox">
                    <span class="ms-1">
                        <?= ucwords(strtolower($categorie->nom)) ?>
                    </span>
                </label>
            <?php endforeach ?>
        </div>

        <h4 class="mt-3">Couleurs</h4>
        <ul class="list-group list-group-flush">
            <?php foreach ($couleurs as $key => $couleur) : ?>

                <label class="list-group-item ">
                    <input class="form-check-input" type="checkbox">
                    <span class="ms-1">
                        <?= ucwords(strtolower($couleur->nom)) ?>
                    </span>
                </label>
            <?php endforeach ?>

        </ul>


    </div>
    <!-- col -->

    <!-- catalogue -->
    <div class="col-md-9">

        <!-- row 2 -->
        <div class="row">
            <?php foreach ($produits as $key => $p) : ?>

                <div class="col-md-4">
                    <div class="card mb-3">

                        <a href="products_details&id=<?= $p->produit_id ?>">
                            <img src="images/produits/<?= $p->image ?>" class="card-img-top" alt="...">
                        </a>

                        <div class="card-body">
                            <h5 class="card-title"><?= $p->produit_nom ?></h5>
                            <p class="card-text">
                                <span class="fw-bold"><?= _number_format($p->prix) ?> DH</span>
                                <del class="text-danger"><?= _number_format($p->ancien_prix) ?> DH</del>
                            </p>

                            <form method="post">
                                <input type="hidden" name="produit_id" value="<?= $p->produit_id ?>">

                                <button name="add_to_cart" type="submit" class="btn btn-dark ">

                                    <i class="fa-solid fa-cart-shopping"></i>
                                    Add to cart
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- card -->
                </div>
                <!-- col -->

            <?php endforeach ?>

        </div>
        <!-- fin row 2 -->
    </div>
    <!-- col -->


</div>
<!-- fin row 1 -->






<?php $content_html = ob_get_clean();

ob_start(); ?>

<script>
    // alert(123)
</script>

<?php $content_js = ob_get_clean(); ?>