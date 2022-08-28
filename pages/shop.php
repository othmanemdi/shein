<?php

ob_start();

$title = "Shop page";
$marques = $pdo->query("SELECT * FROM marques ORDER BY id DESC")->fetchAll();
$categories = $pdo->query("SELECT * FROM categories ORDER BY id DESC")->fetchAll();
$couleurs = $pdo->query("SELECT * FROM couleurs ORDER BY id DESC")->fetchAll();

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
            <div class="col-md-4">
                <div class="card mb-3">




                    <a href="products_details">

                        <img src="images/products/product_img1.jpg" class="card-img-top" alt="...">
                    </a>



                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text">
                            <span class="fw-bold">$45.00</span>
                            <del class="text-danger">$75.00</del>
                        </p>


                        <a href="cart" class="btn bg-magenta text-white">

                            <i class="fa-solid fa-cart-shopping"></i>
                            Add to cart
                        </a>




                    </div>
                </div>
                <!-- card -->
            </div>
            <!-- col -->

            <div class="col-md-4">
                <div class="card mb-3">
                    <a href="products_details">
                        <img src="images/products/product_img2.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text">
                            <span class="fw-bold">$45.00</span>
                            <del class="text-danger">$75.00</del>
                        </p>
                        <a href="cart" class="btn bg-magenta text-white">
                            <i class="fa-solid fa-cart-shopping"></i>
                            Add to cart</a>
                    </div>
                </div>
                <!-- card -->
            </div>
            <!-- col -->

            <div class="col-md-4">
                <div class="card mb-3">
                    <a href="products_details">

                        <img src="images/products/product_img3.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text">
                            <span class="fw-bold">$45.00</span>
                            <del class="text-danger">$75.00</del>
                        </p>
                        <a href="cart" class="btn bg-magenta text-white">
                            <i class="fa-solid fa-cart-shopping"></i>
                            Add to cart</a>
                    </div>
                </div>
                <!-- card -->
            </div>
            <!-- col -->

            <div class="col-md-4">
                <div class="card mb-3">
                    <a href="products_details">

                        <img src="images/products/product_img4.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text">
                            <span class="fw-bold">$45.00</span>
                            <del class="text-danger">$75.00</del>
                        </p>
                        <a href="cart" class="btn bg-magenta text-white">
                            <i class="fa-solid fa-cart-shopping"></i>
                            Add to cart</a>
                    </div>
                </div>
                <!-- card -->
            </div>
            <!-- col -->

            <div class="col-md-4">
                <div class="card mb-3">
                    <a href="products_details">

                        <img src="images/products/product_img5.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text">
                            <span class="fw-bold">$45.00</span>
                            <del class="text-danger">$75.00</del>
                        </p>
                        <a href="cart" class="btn bg-magenta text-white">
                            <i class="fa-solid fa-cart-shopping"></i>
                            Add to cart</a>
                    </div>
                </div>
                <!-- card -->
            </div>
            <!-- col -->

            <div class="col-md-4">
                <div class="card mb-3">
                    <a href="products_details">

                        <img src="images/products/product_img6.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text">
                            <span class="fw-bold">$45.00</span>
                            <del class="text-danger">$75.00</del>
                        </p>
                        <a href="cart" class="btn bg-magenta text-white">
                            <i class="fa-solid fa-cart-shopping"></i>
                            Add to cart</a>
                    </div>
                </div>
                <!-- card -->
            </div>
            <!-- col -->
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