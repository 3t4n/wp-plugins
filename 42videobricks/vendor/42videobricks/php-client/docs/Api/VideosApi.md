# Api42Vb\Client\VideosApi

All URIs are relative to https://api-sbx.42videobricks.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addAttachmentByVideoId()**](VideosApi.md#addAttachmentByVideoId) | **POST** /videos/{videoId}/attachments/{attachmentType}/{locale} | Upload an attachement |
| [**addThumbnailByVideoId()**](VideosApi.md#addThumbnailByVideoId) | **POST** /videos/{videoId}/thumbnail | Upload a thumbnail |
| [**addVideo()**](VideosApi.md#addVideo) | **POST** /videos | Add a new video |
| [**deleteAttachmentByVideoId()**](VideosApi.md#deleteAttachmentByVideoId) | **DELETE** /videos/{videoId}/attachments/{attachmentType}/{locale} | Delete an attachment |
| [**deleteThumbnailByVideoId()**](VideosApi.md#deleteThumbnailByVideoId) | **DELETE** /videos/{videoId}/thumbnail | Delete a thumbnail |
| [**deleteVideoById()**](VideosApi.md#deleteVideoById) | **DELETE** /videos/{videoId} | Delete a video |
| [**finalizeMultipartUploadVideoById()**](VideosApi.md#finalizeMultipartUploadVideoById) | **POST** /videos/{videoId}/multipart-upload/finalize | Multipart upload finalization |
| [**finalizeUploadVideoById()**](VideosApi.md#finalizeUploadVideoById) | **PUT** /videos/{videoId}/upload/finalize | Single file upload finalization |
| [**getAttachmentByVideoId()**](VideosApi.md#getAttachmentByVideoId) | **GET** /videos/{videoId}/attachments/{attachmentType}/{locale} | Get the attachment |
| [**getAttachmentFileByVideoId()**](VideosApi.md#getAttachmentFileByVideoId) | **GET** /videos/{videoId}/attachments/{attachmentType}/{locale}/file | Get attachement file |
| [**getAttachmentsByVideoId()**](VideosApi.md#getAttachmentsByVideoId) | **GET** /videos/{videoId}/attachments | List of attachments |
| [**getVideoById()**](VideosApi.md#getVideoById) | **GET** /videos/{videoId} | Retun a single video |
| [**getVideoStatusById()**](VideosApi.md#getVideoStatusById) | **GET** /videos/{videoId}/status | Retun the detailed status of the video |
| [**getVideos()**](VideosApi.md#getVideos) | **GET** /videos | List videos |
| [**initMultipartUploadVideoById()**](VideosApi.md#initMultipartUploadVideoById) | **POST** /videos/{videoId}/multipart-upload/init | Multipart upload intialization |
| [**initUploadVideoById()**](VideosApi.md#initUploadVideoById) | **GET** /videos/{videoId}/upload/init | Single file upload intialization |
| [**updateVideoById()**](VideosApi.md#updateVideoById) | **PUT** /videos/{videoId} | Update an existing video |


## `addAttachmentByVideoId()`

```php
addAttachmentByVideoId($video_id, $attachment_type, $locale, $file)
```

Upload an attachement

Upload an attachement file and attached it to a video Currently: - attachement file type is limited to \"subtitle\" and \"caption\" (close caption) - supported file types: SRT (text/plain), VTT (text/vtt)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\VideosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$video_id = {{videoId}}; // string | Id of the video
$attachment_type = {{attachmentType}}; // string | Type of attachment
$locale = {{locale}}; // string | Le locale value of the attachment
$file = "/path/to/file.txt"; // \SplFileObject | The file to upload

try {
    $apiInstance->addAttachmentByVideoId($video_id, $attachment_type, $locale, $file);
} catch (Exception $e) {
    echo 'Exception when calling VideosApi->addAttachmentByVideoId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **video_id** | **string**| Id of the video | |
| **attachment_type** | **string**| Type of attachment | |
| **locale** | **string**| Le locale value of the attachment | |
| **file** | **\SplFileObject****\SplFileObject**| The file to upload | [optional] |

### Return type

void (empty response body)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addThumbnailByVideoId()`

```php
addThumbnailByVideoId($video_id, $file)
```

Upload a thumbnail

Upload an image file and set it as Thumbnail to the video

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\VideosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$video_id = {{videoId}}; // string | Id of the video
$file = "/path/to/file.txt"; // \SplFileObject | The file to upload

try {
    $apiInstance->addThumbnailByVideoId($video_id, $file);
} catch (Exception $e) {
    echo 'Exception when calling VideosApi->addThumbnailByVideoId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **video_id** | **string**| Id of the video | |
| **file** | **\SplFileObject****\SplFileObject**| The file to upload | [optional] |

### Return type

void (empty response body)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addVideo()`

```php
addVideo($video_properties): \Api42Vb\Client\Model\Video
```

Add a new video

You can create a video object by using this endpoint.  Once the video is created you can then upload the video.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\VideosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$video_properties = new \Api42Vb\Client\Model\VideoProperties(); // \Api42Vb\Client\Model\VideoProperties

try {
    $result = $apiInstance->addVideo($video_properties);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideosApi->addVideo: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **video_properties** | [**\Api42Vb\Client\Model\VideoProperties**](../Model/VideoProperties.md)|  | |

### Return type

[**\Api42Vb\Client\Model\Video**](../Model/Video.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteAttachmentByVideoId()`

```php
deleteAttachmentByVideoId($video_id, $attachment_type, $locale)
```

Delete an attachment

Delete an attachment (and the attached file)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\VideosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$video_id = {{videoId}}; // string | Id of the video
$attachment_type = {{attachmentType}}; // string | Type of attachment
$locale = {{locale}}; // string | Le locale value of the attachment

try {
    $apiInstance->deleteAttachmentByVideoId($video_id, $attachment_type, $locale);
} catch (Exception $e) {
    echo 'Exception when calling VideosApi->deleteAttachmentByVideoId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **video_id** | **string**| Id of the video | |
| **attachment_type** | **string**| Type of attachment | |
| **locale** | **string**| Le locale value of the attachment | |

### Return type

void (empty response body)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteThumbnailByVideoId()`

```php
deleteThumbnailByVideoId($video_id)
```

Delete a thumbnail

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\VideosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$video_id = {{videoId}}; // string | Id of the video

try {
    $apiInstance->deleteThumbnailByVideoId($video_id);
} catch (Exception $e) {
    echo 'Exception when calling VideosApi->deleteThumbnailByVideoId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **video_id** | **string**| Id of the video | |

### Return type

void (empty response body)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteVideoById()`

```php
deleteVideoById($video_id)
```

Delete a video

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\VideosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$video_id = {{videoId}}; // string | Id of the video

try {
    $apiInstance->deleteVideoById($video_id);
} catch (Exception $e) {
    echo 'Exception when calling VideosApi->deleteVideoById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **video_id** | **string**| Id of the video | |

### Return type

void (empty response body)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `finalizeMultipartUploadVideoById()`

```php
finalizeMultipartUploadVideoById($video_id, $video_multipart_upload_finalize)
```

Multipart upload finalization

Once video parts are uploaded, finalize the upload by requesting to transcode the file.  New video file is replacing previous video file.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\VideosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$video_id = {{videoId}}; // string | Id of the video
$video_multipart_upload_finalize = new \Api42Vb\Client\Model\VideoMultipartUploadFinalize(); // \Api42Vb\Client\Model\VideoMultipartUploadFinalize

try {
    $apiInstance->finalizeMultipartUploadVideoById($video_id, $video_multipart_upload_finalize);
} catch (Exception $e) {
    echo 'Exception when calling VideosApi->finalizeMultipartUploadVideoById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **video_id** | **string**| Id of the video | |
| **video_multipart_upload_finalize** | [**\Api42Vb\Client\Model\VideoMultipartUploadFinalize**](../Model/VideoMultipartUploadFinalize.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `finalizeUploadVideoById()`

```php
finalizeUploadVideoById($video_id)
```

Single file upload finalization

Once video file is uploaded, finalize the upload by requesting to transcode the file. Finalize apply to the last signedurl provided by the upload initialization.  New video file is replacing previous video file.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\VideosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$video_id = {{videoId}}; // string | Id of the video

try {
    $apiInstance->finalizeUploadVideoById($video_id);
} catch (Exception $e) {
    echo 'Exception when calling VideosApi->finalizeUploadVideoById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **video_id** | **string**| Id of the video | |

### Return type

void (empty response body)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAttachmentByVideoId()`

```php
getAttachmentByVideoId($video_id, $attachment_type, $locale)
```

Get the attachment

Get a video attachement object

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\VideosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$video_id = {{videoId}}; // string | Id of the video
$attachment_type = {{attachmentType}}; // string | Type of attachment
$locale = {{locale}}; // string | Le locale value of the attachment

try {
    $apiInstance->getAttachmentByVideoId($video_id, $attachment_type, $locale);
} catch (Exception $e) {
    echo 'Exception when calling VideosApi->getAttachmentByVideoId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **video_id** | **string**| Id of the video | |
| **attachment_type** | **string**| Type of attachment | |
| **locale** | **string**| Le locale value of the attachment | |

### Return type

void (empty response body)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAttachmentFileByVideoId()`

```php
getAttachmentFileByVideoId($video_id, $attachment_type, $locale)
```

Get attachement file

Get the attachement file Currently only text/plain files are handled.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\VideosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$video_id = {{videoId}}; // string | Id of the video
$attachment_type = {{attachmentType}}; // string | Type of attachment
$locale = {{locale}}; // string | Le locale value of the attachment

try {
    $apiInstance->getAttachmentFileByVideoId($video_id, $attachment_type, $locale);
} catch (Exception $e) {
    echo 'Exception when calling VideosApi->getAttachmentFileByVideoId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **video_id** | **string**| Id of the video | |
| **attachment_type** | **string**| Type of attachment | |
| **locale** | **string**| Le locale value of the attachment | |

### Return type

void (empty response body)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAttachmentsByVideoId()`

```php
getAttachmentsByVideoId($video_id, $attachment_type, $locale, $limit, $offset): \Api42Vb\Client\Model\VideoAttachmentList
```

List of attachments

Return a list of attachments to a videos

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\VideosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$video_id = {{videoId}}; // string | Id of the video
$attachment_type = 'attachment_type_example'; // string | The type of attachments
$locale = 'locale_example'; // string | The locale
$limit = 56; // int | Number of elements to return (default=10)
$offset = 56; // int | offset for pagination

try {
    $result = $apiInstance->getAttachmentsByVideoId($video_id, $attachment_type, $locale, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideosApi->getAttachmentsByVideoId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **video_id** | **string**| Id of the video | |
| **attachment_type** | **string**| The type of attachments | [optional] |
| **locale** | **string**| The locale | [optional] |
| **limit** | **int**| Number of elements to return (default&#x3D;10) | [optional] |
| **offset** | **int**| offset for pagination | [optional] |

### Return type

[**\Api42Vb\Client\Model\VideoAttachmentList**](../Model/VideoAttachmentList.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getVideoById()`

```php
getVideoById($video_id, $token): \Api42Vb\Client\Model\Video
```

Retun a single video

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\VideosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$video_id = {{videoId}}; // string | Id of the video
$token = true; // bool | add a token to assets to alloaw access to private video

try {
    $result = $apiInstance->getVideoById($video_id, $token);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideosApi->getVideoById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **video_id** | **string**| Id of the video | |
| **token** | **bool**| add a token to assets to alloaw access to private video | [optional] |

### Return type

[**\Api42Vb\Client\Model\Video**](../Model/Video.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getVideoStatusById()`

```php
getVideoStatusById($video_id): \Api42Vb\Client\Model\VideoStatus
```

Retun the detailed status of the video

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\VideosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$video_id = {{videoId}}; // string | Id of the video

try {
    $result = $apiInstance->getVideoStatusById($video_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideosApi->getVideoStatusById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **video_id** | **string**| Id of the video | |

### Return type

[**\Api42Vb\Client\Model\VideoStatus**](../Model/VideoStatus.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getVideos()`

```php
getVideos($limit, $offset, $search, $sort): \Api42Vb\Client\Model\VideoList
```

List videos

Return the list of videos.  Return an empty list it there is no video to return.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\VideosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 56; // int | Number of elements to return (default=10)
$offset = 56; // int | offset for pagination
$search = {{search}}; // string | Keywords search in all indexed fields
$sort = ctime:asc; // string | Sorting results

try {
    $result = $apiInstance->getVideos($limit, $offset, $search, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideosApi->getVideos: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Number of elements to return (default&#x3D;10) | [optional] |
| **offset** | **int**| offset for pagination | [optional] |
| **search** | **string**| Keywords search in all indexed fields | [optional] |
| **sort** | **string**| Sorting results | [optional] |

### Return type

[**\Api42Vb\Client\Model\VideoList**](../Model/VideoList.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `initMultipartUploadVideoById()`

```php
initMultipartUploadVideoById($video_id, $video_multipart_upload_init): \Api42Vb\Client\Model\VideoMultipartUploadInitResponse
```

Multipart upload intialization

Get signed urls to upload a big file split in multiparts Once the video is uploaded, do not forget to call the multipart upload finalize  New video file is replacing previous video file.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\VideosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$video_id = {{videoId}}; // string | Id of the video
$video_multipart_upload_init = new \Api42Vb\Client\Model\VideoMultipartUploadInit(); // \Api42Vb\Client\Model\VideoMultipartUploadInit

try {
    $result = $apiInstance->initMultipartUploadVideoById($video_id, $video_multipart_upload_init);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideosApi->initMultipartUploadVideoById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **video_id** | **string**| Id of the video | |
| **video_multipart_upload_init** | [**\Api42Vb\Client\Model\VideoMultipartUploadInit**](../Model/VideoMultipartUploadInit.md)|  | [optional] |

### Return type

[**\Api42Vb\Client\Model\VideoMultipartUploadInitResponse**](../Model/VideoMultipartUploadInitResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `initUploadVideoById()`

```php
initUploadVideoById($video_id): \Api42Vb\Client\Model\VideoUploadInitResponse
```

Single file upload intialization

Get a single signed url to upload a file Once the video is uploaded, do not forget to call the single upload finalize  File formats currently supported: avi, mov, mp4, mpeg, mpg, mxf, ts. New video file is replacing previous video file.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\VideosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$video_id = {{videoId}}; // string | Id of the video

try {
    $result = $apiInstance->initUploadVideoById($video_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideosApi->initUploadVideoById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **video_id** | **string**| Id of the video | |

### Return type

[**\Api42Vb\Client\Model\VideoUploadInitResponse**](../Model/VideoUploadInitResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateVideoById()`

```php
updateVideoById($video_id, $video_properties)
```

Update an existing video

Update video properties  Only properties provided are updated.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\VideosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$video_id = {{videoId}}; // string | Id of the video
$video_properties = new \Api42Vb\Client\Model\VideoProperties(); // \Api42Vb\Client\Model\VideoProperties

try {
    $apiInstance->updateVideoById($video_id, $video_properties);
} catch (Exception $e) {
    echo 'Exception when calling VideosApi->updateVideoById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **video_id** | **string**| Id of the video | |
| **video_properties** | [**\Api42Vb\Client\Model\VideoProperties**](../Model/VideoProperties.md)|  | |

### Return type

void (empty response body)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
