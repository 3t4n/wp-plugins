<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Splittests\GetSplittest;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetSplittestFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['splittestId', 'href', 'name', 'campaign', 'status', 'winningCriteria', 'winningTarget', 'stage', 'type', 'samplingPercentage', 'samplingTime', 'chooseWinning', 'winningScoreOpens', 'winningScoreClicks', 'winningDelivered', 'winningScheduleOn', 'nextStepOn', 'evaluationSkippedOn', 'canceledOn', 'createdOn', 'newsletters', 'sendSettings'];
    }
}
