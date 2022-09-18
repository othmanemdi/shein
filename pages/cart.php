<?php

ob_start();

$title = "Cart page";

$ip_server = IP_SERVER;

$cart_produit = $pdo->query("SELECT 
cp.id As cart_produit_id,
cp.qt,
p.image,
p.nom,
p.prix,
p.ancien_prix

FROM cart_produit cp

LEFT JOIN carts c ON c.id = cp.cart_id
LEFT JOIN produits p ON p.id = cp.produit_id

WHERE c.ip = '$ip_server'

ORDER BY cp.id DESC

")->fetchAll();

// dd($cart_produit);



$content_php = ob_get_clean();

ob_start(); ?>
<style>

</style>

<?php $content_css = ob_get_clean();

ob_start(); ?>

<h1>Cart</h1>


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index
        ">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cart</li>
    </ol>
</nav>


<div class="row">
    <div class="col-md-8">
        <h3>Order</h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $total_cart = 0;
                    foreach ($cart_produit as $cp) :
                        $prix_ttc = $cp->prix * $cp->qt;
                    ?>
                        <tr>
                            <td>
                                <img src="images/products/<?= $cp->image ?>" width="50" alt="">
                            </td>
                            <td>
                                <?= $cp->nom ?>
                            </td>

                            <td>
                                <input type="number" class="form-control w-25" value="<?= $cp->qt ?>">
                            </td>
                            <td>
                                <span class="fw-bold me-2">
                                    <?= _number_format($cp->prix) ?> DH
                                </span>
                                <small> <del class="text-danger">
                                        <?= _number_format($cp->ancien_prix) ?> DH
                                    </del></small>
                            </td>

                            <td>
                                <span class="fw-bold me-2">

                                    <?= _number_format($prix_ttc) ?> DH
                                </span>

                            </td>
                            <td>
                                <a href="" class="text-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php

                        $total_cart += $prix_ttc;

                    endforeach ?>
                </tbody>
            </table>

        </div>


    </div>

    <div class="col-md-4">
        <h3>Payement Summary</h3>

        <div class="p-3 bg-light">
            <div class="d-flex mb-3">
                <div class="me-auto p-2">
                    <input type="text" class="form-control" placeholder="COUPON CODE">
                </div>
                <div class="p-2">
                    <button type="button" class="btn btn-dark">Apply</button>
                </div>
            </div>

            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-start">

                    <div class="ms-2 me-auto">

                        <div class="fw-bold">Order Summary:</div>

                    </div>

                    <span class="badge bg-dark rounded-pill">
                        <?= _number_format($total_cart) ?> DH
                    </span>

                </li>


                <!-- <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Discount:</div>
                    </div>
                    <span class="badge bg-dark rounded-pill">0%</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Subheading:</div>
                    </div>
                    <span class="badge bg-dark rounded-pill">$129.16</span>
                </li> -->



            </ul>

            <a href="proced_checkout" class="btn btn-dark mt-3 rounded-pill">
                PROCED TO CHECKOUT
            </a>
        </div>



    </div>
</div>



<?php $content_html = ob_get_clean();

ob_start(); ?>

<script>
    // alert(123)
</script>

<?php $content_js = ob_get_clean(); ?>