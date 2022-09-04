<?php

ob_start();

$title = "Marques page";

$marques = $pdo->query("SELECT * FROM marques")->fetchAll();

// dd($marques);
$content_php = ob_get_clean();

ob_start(); ?>
<style>

</style>

<?php $content_css = ob_get_clean();

ob_start(); ?>

<h1>Marques</h1>


<div class="card shadow">
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($marques as $key => $m) : ?>
                    <tr>
                        <th>
                            <?= $m->id ?>
                        </th>
                        <td>
                            <?= strtoupper($m->nom) ?>
                        </td>
                        <td>
                            <a href="" class="btn btn-dark btn-sm">Modifier</a>
                            <a href="" class="btn btn-danger btn-sm">Supprimer

                            </a>
                        </td>

                    </tr>
                <?php endforeach  ?>

            </tbody>
        </table>
    </div>
</div>



<?php $content_html = ob_get_clean();

ob_start(); ?>

<script>
    // alert(123)
</script>

<?php $content_js = ob_get_clean(); ?>