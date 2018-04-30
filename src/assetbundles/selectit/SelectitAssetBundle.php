<?php
namespace fruitstudios\selectit\assetbundles\selectit;

use Craft;

use yii\web\AssetBundle;
use craft\web\assets\cp\CpAsset;


class SelectitAssetBundle extends AssetBundle
{
    // Public Methods
    // =========================================================================

    public function init()
    {
        $this->sourcePath = "@fruitstudios/selectit/assetbundles/selectit/build";

        $this->depends = [];

        $this->js = [
            'js/vendor/polyfill.js',
            'js/vendor/ready.js',
            'js/vendor/extend.js',
            'js/vendor/Sortable.js',
            'js/Selectit.js',
        ];

        $this->css = [
            'css/styles.css',
        ];

        parent::init();
    }
}
