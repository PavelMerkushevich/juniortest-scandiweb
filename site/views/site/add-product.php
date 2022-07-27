<?php

use components\routing\UrlHelper;

$this->title = "Product Add";
?>

<header>
    <div class="header-content">
        <h1 class="title"><?= $this->title ?></h1>
        <div class="button-container">
            <button class="btn btn-success header-button">Save</button>
            <a href="<?= UrlHelper::getLink('site/index') ?>">
                <button class="btn btn-secondary header-button">Cancel</button>
            </a>
        </div>
    </div>
</header>
<main>
    <div class="main-content">
        <form action="" id="product_form">
            <label for="sku">SKU</label>
            <input id="sku" class="form-control input" type="text">

            <label for="name">Name</label>
            <input id="name" class="form-control input" type="text">

            <label for="price">Price ($)</label>
            <input id="price" class="form-control input" type="text">

            <label for="productType">Type Switcher</label>
            <select name="productType" id="productType" class="form-select">
                <option selected disabled>Select Type</option>
                <option value="dvd">DVD</option>
                <option value="book">Book</option>
                <option value="furniture">Furniture</option>
            </select>
        </form>
    </div>
</main>
