<?php

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
    <?= $content ?>
</div>
<?= $this->endBody(); ?>
</body>
</html>