<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Newsletters\GetNewsletter;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetNewsletterFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['clickTracks', 'flags', 'newsletterId', 'href', 'name', 'type', 'status', 'editor', 'subject', 'fromField', 'replyTo', 'campaign', 'sendOn', 'content', 'attachments', 'sendSettings', 'sendMetrics', 'createdOn'];
    }
}
