<?php

/* @var $this components\web\View */

use components\routing\UrlHelper;

$this->title = "Product List";
?>
<div id="root">
    <script>
        var documentTitle = "<?= $this->title ?>";
        var addButtonHref = "<?= UrlHelper::getLink('site/add-product') ?>"
    </script>
</div>

