<?php

ob_start();

$title = "Proced to checkout page";


if (isset($_POST['proced_checkout'])) {
    dd($_POST);
    exit();
}




$ip_server = IP_SERVER;

$total_cart_info = $pdo->query("SELECT 
sum(p.prix * cp.qt) As total_price

FROM cart_produit cp

LEFT JOIN carts c ON c.id = cp.cart_id
LEFT JOIN produits p ON p.id = cp.produit_id

WHERE c.ip = '$ip_server'
limit 1
")->fetch();

$content_php = ob_get_clean();

ob_start(); ?>
<style>

</style>

<?php $content_css = ob_get_clean();

ob_start(); ?>

<h1>Proced to checkout</h1>

<form method="post">

    <div class="row">
        <div class="col-md-8">
            <h3>Invoice Adresse</h3>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom:</label>
                                <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom:">
                            </div>
                            <!-- mb-3 -->
                        </div>
                        <!-- col -->

                        <div class="col">
                            <div class="mb-3">
                                <label for="telephone" class="form-label">Téléphone:</label>
                                <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Téléphone:">
                            </div>
                            <!-- mb-3 -->
                        </div>
                        <!-- col -->


                        <div class="col">
                            <div class="mb-3">
                                <label for="ville" class="form-label">Ville:</label>
                                <input type="text" class="form-control" name="ville" id="ville" placeholder="Ville:">
                            </div>
                            <!-- mb-3 -->
                        </div>
                        <!-- col -->
                    </div>
                    <!-- row -->

                </div>
                <!-- card-body -->
            </div>
            <!-- card -->
        </div>
        <!-- col -->

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
                            <?= _number_format($total_cart_info->total_price) ?> DH
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

                <button name="proced_checkout" class="btn btn-dark mt-3 rounded-pill">
                    PROCED TO CHECKOUT
                </button>
            </div>



        </div>
        <!-- col -->
    </div>
    <!-- row -->

</form>

<?php $content_html = ob_get_clean();

ob_start(); ?>

<script>
    // alert(123)
</script>

<?php $content_js = ob_get_clean(); ?>