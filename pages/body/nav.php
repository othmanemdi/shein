<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Shein</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'home' ? 'fw-bold text-primary' : '' ?>" href="home">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $page == 'shop' ? 'fw-bold text-primary' : '' ?>" href="shop">Shop</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link <?= $page == 'cart' ? 'fw-bold text-primary' : '' ?>" href="cart">Cart</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $page == 'contact' ? 'fw-bold text-primary' : '' ?> " href="contact">Contact</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link <?= $page == 'marques' ? 'fw-bold text-primary' : '' ?>  " href="marques">Marques</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link <?= $page == 'couleurs' ? 'fw-bold text-primary' : '' ?>  " href="couleurs">Couleurs</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link 
                    <?= $page == 'categories' ? 'fw-bold text-primary' : '' ?>" href="categories">Catégories</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $page == 'produits' ? 'fw-bold text-primary' : '' ?>  " href="produits">Produits</a>
                </li>

            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>