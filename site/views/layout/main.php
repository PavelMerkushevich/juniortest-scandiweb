<?php
use app\assets\AppAsset;

$asset = new AppAsset();
$asset->register();
$this->asset = $asset;
?>

<html>
    <head>
        <meta charset="UTF-8">
        <?php $this->head(); ?>
        <title></title>
    </head>
    <body>
        <div id="wrapper">
            <?php $this->renderView();?>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>