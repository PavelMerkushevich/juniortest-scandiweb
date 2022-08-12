<?php

/* @var $this components\web\View */

use components\routing\UrlHelper;

$this->title = "Product Add";
?>

<header>
    <div id="header-content">
        <h1 class="title"><?= $this->title ?></h1>
        <div class="button-container">
            <button class="btn btn-success header-button" onclick="saveFormData()">Save</button>
            <a href="<?= UrlHelper::getLink('site/index') ?>">
                <button class="btn btn-secondary header-button">Cancel</button>
            </a>
        </div>
    </div>
</header>
<main id="root">

</main>
