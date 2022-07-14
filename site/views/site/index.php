<?php

use components\routing\UrlHelper;

$this->title = "Index";
?>

<header>
    <div class="header-content">
        <h1 class="title">Product List</h1>
        <div class="button-container">
            <a href="<?= UrlHelper::getLink('site/add-product') ?>">
                <button class="btn btn-success header-button">ADD</button>
            </a>
            <button id="delete-product-btn" class="btn btn-danger header-button">MASS DELETE</button>
        </div>
    </div>
</header>
<main>
    <div class="main-content">
        <div class="product ">
            <div class="delete-checkbox-container">
                <input class="form-check-input delete-checkbox" type="checkbox" name="checkbox">
            </div>
            <div class="product-data-container">
                <div class="product-data">Apple</div>
            </div>
        </div>
        <div class="product">
            <div class="delete-checkbox-container">
                <input class="form-check-input delete-checkbox" type="checkbox" name="checkbox">
            </div>
            <div class="product-data-container">
                <div class="product-data">Apple</div>
            </div>
        </div>
        <div class="product">
            <div class="delete-checkbox-container">
                <input class="form-check-input delete-checkbox" type="checkbox" name="checkbox">
            </div>
            <div class="product-data-container">
                <div class="product-data">Apple</div>
            </div>
        </div>
        <div class="product">
            <div class="delete-checkbox-container">
                <input class="form-check-input delete-checkbox" type="checkbox" name="checkbox">
            </div>
            <div class="product-data-container">
                <div class="product-data">Apple</div>
            </div>
        </div>
        <div class="product">
            <div class="delete-checkbox-container">
                <input class="form-check-input delete-checkbox" type="checkbox" name="checkbox">
            </div>
            <div class="product-data-container">
                <div class="product-data">Apple</div>
            </div>
        </div>
        <div class="product">
            <div class="delete-checkbox-container">
                <input class="form-check-input delete-checkbox" type="checkbox" name="checkbox">
            </div>
            <div class="product-data-container">
                <div class="product-data">Apple</div>
            </div>
        </div>
    </div>
</main>