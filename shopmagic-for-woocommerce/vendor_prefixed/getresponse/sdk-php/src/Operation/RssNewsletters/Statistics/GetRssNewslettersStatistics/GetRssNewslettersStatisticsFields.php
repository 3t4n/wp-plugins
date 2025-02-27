<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\RssNewsletters\Statistics\GetRssNewslettersStatistics;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetRssNewslettersStatisticsFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['timeInterval', 'sent', 'totalOpened', 'uniqueOpened', 'totalClicked', 'uniqueClicked', 'goals', 'uniqueGoals', 'forwarded', 'unsubscribed', 'bounced', 'complaints'];
    }
}
