<?php
namespace fruitstudios\selectit\models;

use fruitstudios\selectit\Selectit;
use fruitstudios\selectit\base\SelectElements;
use fruitstudios\selectit\helpers\SelectitHelper;

use Craft;
use craft\elements\User;

class SelectUsers extends SelectElements
{

    // Static
    // =========================================================================

    public static function elementType(): string
    {
        return User::class;
    }

    // Public
    // =========================================================================

    // Public Methods
    // =========================================================================

    public function __construct(array $attributes = [])
    {
        parent::__construct();
        $this->selectText = Craft::t('selectit', 'Select users');


        // Populate
        $this->setAttributes($attributes, false);
    }

    public function rules()
    {
        $rules = parent::rules();
        // $rules[] = [['name'], 'required'];
        // $rules[] = [['target'], 'required', 'message' => Craft::t('selectit', 'A valid field and element must be set.')];
        return $rules;
    }

}
