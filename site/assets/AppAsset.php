<?php

namespace app\assets;

class AppAsset extends \components\web\Asset
{
    public array $css = [
        'global' => [
            'css/style.css',
            'libraries/bootstrap/css/bootstrap.min.css'
        ]
    ];
    public array $js = [
        'global' => [
            'libraries/bootstrap/js/bootstrap.min.js',
        ],
        'site/index' => [
            'libraries/masonry/masonry.pkgd.min.js',
            'js/grid.js'
        ],
    ];

}
