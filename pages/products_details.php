<?php

ob_start();

$title = "Product Details page";

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
        <img src="images/products/product_img10.jpg" class="card-img-top" alt="Design">
    </div>

    <div class="col-md-6">
        <h1>Red Shirt</h1>
        <i class="fas fa-star text-warning"></i>
        <i class="fas fa-star text-warning"></i>
        <i class="fas fa-star text-warning"></i>
        <i class="fas fa-star text-warning"></i>
        <i class="fas fa-star-half-alt text-warning"></i>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos pariatur, praesentium assumenda
            incidunt labore, nemo expedita necessitatibus voluptate nam libero velit perferendis accusantium
            eum. Laborum ad quo hic totam maxime.
        </p>


        <form>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Size:</label>

                        <select class="form-select">
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Colors:</label>

                        <select class="form-select">
                            <option>Red</option>
                            <option>Blue</option>
                            <option>White</option>
                        </select>
                    </div>
                </div>
            </div>


        </form>
        <h3 class="mb-4 mt-4">
            <span class="fw-bold">$45.00</span>
            <del class="text-danger">$75.00</del>
        </h3>

        <a href="cart
        " class="btn btn-lg bg-magenta text-white">
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