<?php

namespace ShopMagicVendor;

use ShopMagicVendor\Getresponse\Sdk\GetresponseClientFactory;
use ShopMagicVendor\Getresponse\Sdk\Operation\CustomFields\CreateCustomField\CreateCustomField;
use ShopMagicVendor\Getresponse\Sdk\Operation\CustomFields\DeleteCustomField\DeleteCustomField;
use ShopMagicVendor\Getresponse\Sdk\Operation\Model\CustomFieldFormatEnum;
use ShopMagicVendor\Getresponse\Sdk\Operation\Model\CustomFieldTypeEnum;
use ShopMagicVendor\Getresponse\Sdk\Operation\Model\NewCustomField;
use ShopMagicVendor\Getresponse\Sdk\Operation\Model\StringBooleanEnum;
require_once __DIR__ . '/../vendor/autoload.php';
/**
 * Create GetResponse client with URL defined in Getresponse\Sdk\Environment\GetResponse
 * and API_KEY from environment variable
 *
 */
$client = GetresponseClientFactory::createWithApiKey(\getenv('API_KEY'));
$customFieldType = new CustomFieldTypeEnum('text');
$customFieldFormat = new CustomFieldFormatEnum('text');
$isCustomFieldHidden = new StringBooleanEnum('false');
$customFieldModel = new NewCustomField('mytmpcustomfield', $customFieldType, $isCustomFieldHidden, array());
$customFieldOperation = new CreateCustomField($customFieldModel);
$result = $client->call($customFieldOperation);
if ($result->isSuccess()) {
    $customField = $result->getData();
    \var_dump($customField);
    $deleteCustomFieldOperation = new DeleteCustomField($customField['customFieldId']);
    $result = $client->call($deleteCustomFieldOperation);
    \var_dump($result->getResponse()->getStatusCode());
} else {
    /**
     * implement error handling here
     */
}
