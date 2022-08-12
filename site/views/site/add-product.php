<?php

/* @var $this components\web\View */

use components\routing\UrlHelper;

$this->title = "Product Add";
?>
<div id="root">
    <script>
        var documentTitle = "<?= $this->title ?>";
        var cancelButtonHref = "<?= UrlHelper::getLink('site/index') ?>"
    </script>
</div>




