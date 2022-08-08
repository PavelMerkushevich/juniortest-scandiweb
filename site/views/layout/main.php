<?php

/* @var $this components\web\View */

use app\assets\AppAsset;

$this->asset = new AppAsset($this->path);
?>
<html>
<head>
    <meta charset="UTF-8">
    <?= $this->head(); ?>
</head>
<body>
<div id="wrapper">
    <?= $this->content ?>
</div>
<?= $this->endBody(); ?>
</body>
</html>