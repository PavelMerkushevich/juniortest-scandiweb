<?php
use app\assets\AppAsset;
$this->asset = new AppAsset($this->path);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <?php $this->head(); ?>
    </head>
    <body>
        <div id="wrapper">
            <?php $this->renderView();?>
        </div>
        <?php $this->endBody(); ?>
    </body>
</html>