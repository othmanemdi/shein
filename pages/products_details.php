<?php

ob_start();

$title = "Product Details page";

if (!isset($_GET['id'])) {
    $_SESSION['flash']['danger'] = 'Error ID';
    header('Location: shop');
    exit();
}

$produit_id = (int)$_GET['id'];

if ($produit_id === 0) {
    $_SESSION['flash']['danger'] = 'Id Introuvable';
    header('Location: shop');
    exit();
}

$produit = $pdo->query("SELECT * FROM 
    produits 
    WHERE id = $produit_id AND deleted_at IS NULL
    LIMIT 1
    ")->fetch();

$couleurs = $pdo->query("SELECT id,nom FROM couleurs WHERE deleted_at IS NULL ORDER BY id DESC")->fetchAll();


// dd($produit);



// die();
$content_php = ob_get_clean();

ob_start(); ?>
<style>

</style>

<?php $content_css = ob_get_clean();

ob_start(); ?>

<h1>Product Details</h1>




<nav aria-label="breadcrumb mt-5">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index
        ">Home</a></li>
        <li class="breadcrumb-item"><a href="shop
        ">Shop</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            Product Details
        </li>
    </ol>
</nav>


<div class="row">
    <div class="col-md-6">
        <img src="images/products/<?= $produit->image ?>" class="card-img-top" alt="Design">
    </div>

    <div class="col-md-6">
        <h1><?= $produit->nom ?></h1>
        <i class="fas fa-star text-warning"></i>
        <i class="fas fa-star text-warning"></i>
        <i class="fas fa-star text-warning"></i>
        <i class="fas fa-star text-warning"></i>
        <i class="fas fa-star-half-alt text-warning"></i>
        <p>
            <?= $produit->description ?>
        </p>


        <form>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Size:</label>

                        <select class="form-select">
                            <option>S</option>
                            <option>M</option>
                            <option selected>L</option>
                            <option>XL</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="couleur_id" class="form-label">Couleur:</label>

                        <select name="couleur_id_input" id="couleur_id" class="form-select" aria-label="Default select example">
                            <?php foreach ($couleurs as $key => $c) : ?>

                                <option value="<?= $c->id ?>" <?php
                                                                if ($c->id == $produit->couleur_id) {
                                                                    echo "selected";
                                                                }
                                                                ?>>

                                    <?= ucfirst($c->nom) ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>


        </form>
        <h3 class="mb-4 mt-4">
            <span class="fw-bold">
                <?= _number_format($produit->prix) ?>

                DH
            </span>
            <del class="text-danger">
                <?= _number_format($produit->ancien_prix) ?>
                DH
            </del>
        </h3>

        <a href="cart
        " class="btn btn-lg bg-dark text-white">
            <i class="fa-solid fa-cart-shopping"></i>
            Add To Cart
        </a>
    </div>
</div>




<?php $content_html = ob_get_clean();

ob_start(); ?>

<script>
    // alert(123)
</script>

<?php $content_js = ob_get_clean(); ?>