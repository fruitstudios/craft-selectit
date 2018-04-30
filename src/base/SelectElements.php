<?php
namespace fruitstudios\selectit\base;

use fruitstudios\selectit\Selectit;
use fruitstudios\selectit\base\SelectElementsInterface;
use fruitstudios\selectit\helpers\SelectitHelper;
use fruitstudios\selectit\assetbundles\selectit\SelectitAssetBundle;

use Craft;
use craft\web\View;
use craft\base\Model;
use craft\helpers\Json as JsonHelper;

abstract class SelectElements extends Model implements SelectElementsInterface
{

    // Constants
    // =========================================================================

    // Static
    // =========================================================================

    public static function elementType(): string
    {
        return null;
    }

    // Private
    // =========================================================================

    private $_defaultJavascriptVariables;

    // Public
    // =========================================================================

    // ID
    public $id;

    // Name
    public $name;

    // Assets
    public $elements;

    // Styles
    public $customClass;
    public $themeColour = '#000000';

    // Language
    public $selectText;

    // Asset
    public $limit;

    // Public Methods
    // =========================================================================

    public function __construct()
    {
        // Defualt Settings
        $this->id = uniqid('selectit');
        $this->selectText = Craft::t('selectit', 'Select elements');

        // Default Javascript Variables
        $this->_defaultJavascriptVariables = [
            'debug' => Craft::$app->getConfig()->getGeneral()->devMode,
            'csrfTokenName' => Craft::$app->getConfig()->getGeneral()->csrfTokenName,
            'csrfTokenValue' => Craft::$app->getRequest()->getCsrfToken(),
        ];
    }

    public function render()
    {
        return '<p>Selectit Rendered</p>';

        // $this->validate();

        // $view = Craft::$app->getView();
        // $view->registerAssetBundle(SelectitAssetBundle::class);
        // $view->registerJs('new Selectit('.$this->_getJavascriptVariables().');', View::POS_END);
        // $view->registerCss($this->_getCustomCss());

        // return SelectitHelper::renderTemplate('selectit/uploader', [
        //     'uploader' => $this
        // ]);
    }

    public function rules()
    {
        // IDEA: Should target use this for validation: https://www.yiiframework.com/doc/guide/2.0/en/tutorial-core-validators#filter

        $rules = parent::rules();
        // $rules[] = [['id'], 'required'];
        // $rules[] = [['maxSize'], 'integer', 'max' => $this->_defaultMaxUploadFileSize, 'message' => Craft::t('selectit', 'Max file cant be greater than the global setting maxUploadFileSize')];
        return $rules;
    }

    public function beforeValidate()
    {
        // $this->setTarget();
    }

    public function getJavascriptProperties(): array
    {
        return [
            'id',
        ];
    }

    // Private Methods
    // =========================================================================

    private function _getJavascriptVariables(bool $encode = true)
    {
        $settings = $this->_defaultJavascriptVariables;
        foreach ($this->getJavascriptProperties() as $property)
        {
            $settings[$property] = $this->$property ?? null;
        }

        return $encode ? JsonHelper::encode($settings) : $settings;
    }

    private function _getCustomCss()
    {
      $css = '
        #'.$this->id.' .selectit--isLoading:after { border-color: '.$this->themeColour.'; }
        #'.$this->id.' .selectit--label { background-color: '.$this->themeColour.'; }
        #'.$this->id.' .selectit--btn { color: '.$this->themeColour.'; }
      ';

      return $css;
    }
}
