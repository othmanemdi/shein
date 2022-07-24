<?php

ob_start();

$title = "Marques page";


$marques = $pdo->query("SELECT * FROM marques")->fetchAll();

// echo '<pre>';
// print_r($marques);
// echo '</pre>';
// die();



$content_php = ob_get_clean();

ob_start(); ?>
<style>

</style>

<?php $content_css = ob_get_clean();

ob_start(); ?>

<h1>Marques</h1>



<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Actiond</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($marques as $key => $value): ?>
        <tr>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
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