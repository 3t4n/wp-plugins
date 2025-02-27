<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\TransactionalEmails\GetTransactionalEmails;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetTransactionalEmailsFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['transactionalEmailId', 'fromField', 'recipients', 'subject', 'tag', 'href'];
    }
}
