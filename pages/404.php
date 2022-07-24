<?php

ob_start();

$title = "404 page";

$content_php = ob_get_clean();

ob_start(); ?>
<style>

</style>

<?php $content_css = ob_get_clean();

ob_start(); ?>

<h1>404</h1>


<?php $content_html = ob_get_clean();

ob_start(); ?>

<script>
    // alert(123)
</script>

<?php $content_js = ob_get_clean(); ?>