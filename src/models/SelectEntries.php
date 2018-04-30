<?php
namespace fruitstudios\selectit\models;

use fruitstudios\selectit\Selectit;
use fruitstudios\selectit\base\SelectElements;
use fruitstudios\selectit\helpers\SelectitHelper;

use Craft;
use craft\elements\Entry;

class SelectEntries extends SelectElements
{

    // Static
    // =========================================================================

    public static function elementType(): string
    {
        return Entry::class;
    }

    // Public
    // =========================================================================

    // Public Methods
    // =========================================================================

    public function __construct(array $attributes = [])
    {
        parent::__construct();
        $this->selectText = Craft::t('selectit', 'Select entries');


        // Populate
        $this->setAttributes($attributes, false);
    }

    public function rules()
    {
        $rules = parent::rules();
        // $rules[] = [['id'], 'required'];
        // $rules[] = [['target'], 'required', 'message' => Craft::t('selectit', 'A valid volume and optional folder / path must be set.')];
        return $rules;
    }
}
