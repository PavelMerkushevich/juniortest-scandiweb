<?php

use components\routing\UrlHelper;

$this->title = "Product List";
?>

<header>
    <div id="header-content">
        <h1 class="title"><?= $this->title ?></h1>
        <div class="button-container">
            <a href="<?= UrlHelper::getLink('site/add-product') ?>">
                <button class="btn btn-success header-button">ADD</button>
            </a>
            <button id="delete-product-btn" class="btn btn-danger header-button">MASS DELETE</button>
        </div>
    </div>
</header>
<main id="root">

</main>