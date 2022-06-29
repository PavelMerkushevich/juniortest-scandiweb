<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="libraries/bootstrap/css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
        <div id="wrapper">
            <?php $this->renderView();?>
            <?php var_dump(components\web\Settings::config()->config) ?>
        </div>
        <script src="libraries/bootstrap/js/bootstrap.min.js"></script>
        <script src="libraries/masonry/masonry.pkgd.min.js"></script>
        <script src="js/grid.js"></script>
    </body>
</html>