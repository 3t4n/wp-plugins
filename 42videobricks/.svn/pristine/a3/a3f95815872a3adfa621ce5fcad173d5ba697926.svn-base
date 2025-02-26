# Api42Vb\Client\TagsApi

All URIs are relative to https://api-sbx.42videobricks.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getTags()**](TagsApi.md#getTags) | **GET** /tags | List Video Tags |


## `getTags()`

```php
getTags($limit, $offset, $partial): \Api42Vb\Client\Model\TagList
```

List Video Tags

Return the list of tags created and set to videos

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\TagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 56; // int | Number of elements to return (default=10)
$offset = 56; // int | offset for pagination
$partial = {{partial}}; // string | \\'partial\\' string to filter list

try {
    $result = $apiInstance->getTags($limit, $offset, $partial);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TagsApi->getTags: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Number of elements to return (default&#x3D;10) | [optional] |
| **offset** | **int**| offset for pagination | [optional] |
| **partial** | **string**| \\&#39;partial\\&#39; string to filter list | [optional] |

### Return type

[**\Api42Vb\Client\Model\TagList**](../Model/TagList.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
