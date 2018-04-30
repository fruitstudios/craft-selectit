<?php
namespace fruitstudios\selectit\services;

use fruitstudios\selectit\Selectit;
use fruitstudios\selectit\helpers\SelectitHelper;

use Craft;
use craft\base\Component;

class SelectitService extends Component
{
    // Public Methods
    // =========================================================================

    public function getAssetFieldByHandleOrId($handleOrId)
    {
    	if(!$handleOrId)
    	{
    		return false;
    	}

    	if(is_numeric($handleOrId))
    	{
			$field = SelectitHelper::getFieldById($handleOrId);
    	}
    	else
    	{
    		$field = SelectitHelper::getFieldByHandle($handleOrId);
    	}
    	return $field;
    }

    public function getVolumeByHandleOrId($handleOrId)
    {
    	if(!$handleOrId)
    	{
    		return false;
    	}

    	if(is_numeric($handleOrId))
    	{
			$volume = Craft::$app->getVolumes()->getVolumeById($handleOrId);
    	}
    	else
    	{
    		$volume = Craft::$app->getVolumes()->getVolumeByHandle($handleOrId);
    	}
    	return $volume;
    }

    public function getFirstViewableVolume()
    {
    	$viewableVolumes = Craft::$app->getVolumes()->getViewableVolumes();
    	return $viewableVolumes[0] ?? false;
    }

}
