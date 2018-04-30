<?php
namespace fruitstudios\selectit\variables;

use fruitstudios\selectit\Selectit;
use fruitstudios\selectit\models\SelectUsers;
use fruitstudios\selectit\models\SelectEntries;
use fruitstudios\selectit\models\SelectCategories;

use Craft;
use craft\helpers\Template as TemplateHelper;

class SelectitVariable
{
    // Public Methods
    // =========================================================================

    public function users($attributes = [])
    {
        $select = new SelectUsers($attributes);
        return TemplateHelper::raw($select->render());
    }

    public function entries($attributes = [])
    {
        $select = new SelectCategories($attributes);
        return TemplateHelper::raw($select->render());
    }

    public function categories($attributes = [])
    {
        $select = new SelectEntries($attributes);
        return TemplateHelper::raw($select->render());
    }
}
