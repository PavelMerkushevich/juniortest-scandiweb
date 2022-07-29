<?php

namespace app\assets;

class AppAsset extends \components\web\Asset
{
    public array $css = [
        'global' => [
            'libraries/bootstrap/css/bootstrap.min.css' => null,
            'css/style.css' => null
        ]
    ];
    public array $js = [
        'global' => [
            'libraries/bootstrap/js/bootstrap.min.js' => null,
            'https://unpkg.com/react@18/umd/react.development.js' => null,
            'https://unpkg.com/react-dom@18/umd/react-dom.development.js'  => null
        ],
        'site/index' => [
            'libraries/masonry/masonry.pkgd.min.js'  => null,
            'js/react/index.js' => ["type" => "module"]
        ],
        'site/add-product' => [
            'module' => [
                'js/react/add-product.js' => null
            ]
        ]
    ];

}
