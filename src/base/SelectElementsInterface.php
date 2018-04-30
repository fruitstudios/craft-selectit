<?php
namespace fruitstudios\selectit\base;

use Craft;

interface UploaderInterface
{
    // Static
    // =========================================================================

    public static function elementType(): string;

    // Public Methods
    // =========================================================================

    public function getJavascriptProperties(): array;
}
