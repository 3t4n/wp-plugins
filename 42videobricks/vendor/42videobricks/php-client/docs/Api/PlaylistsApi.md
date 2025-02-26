# Api42Vb\Client\PlaylistsApi

All URIs are relative to https://api-sbx.42videobricks.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addPlaylist()**](PlaylistsApi.md#addPlaylist) | **POST** /playlists | Add a new playlist |
| [**deletePlaylistById()**](PlaylistsApi.md#deletePlaylistById) | **DELETE** /playlists/{playlistId} | Delete a playlist |
| [**getPlaylistById()**](PlaylistsApi.md#getPlaylistById) | **GET** /playlists/{playlistId} | Retun a single playlist |
| [**getPlaylists()**](PlaylistsApi.md#getPlaylists) | **GET** /playlists | List playlists |
| [**updatePlaylistById()**](PlaylistsApi.md#updatePlaylistById) | **PUT** /playlists/{playlistId} | Update an existing playlist |


## `addPlaylist()`

```php
addPlaylist($playlist_properties): \Api42Vb\Client\Model\Playlist
```

Add a new playlist

Create a new playlist.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\PlaylistsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$playlist_properties = new \Api42Vb\Client\Model\PlaylistProperties(); // \Api42Vb\Client\Model\PlaylistProperties

try {
    $result = $apiInstance->addPlaylist($playlist_properties);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PlaylistsApi->addPlaylist: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **playlist_properties** | [**\Api42Vb\Client\Model\PlaylistProperties**](../Model/PlaylistProperties.md)|  | |

### Return type

[**\Api42Vb\Client\Model\Playlist**](../Model/Playlist.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deletePlaylistById()`

```php
deletePlaylistById($playlist_id)
```

Delete a playlist

Delete a playlist.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\PlaylistsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$playlist_id = {{playlistId}}; // string | Id of the playlist

try {
    $apiInstance->deletePlaylistById($playlist_id);
} catch (Exception $e) {
    echo 'Exception when calling PlaylistsApi->deletePlaylistById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **playlist_id** | **string**| Id of the playlist | |

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

## `getPlaylistById()`

```php
getPlaylistById($playlist_id): \Api42Vb\Client\Model\Playlist
```

Retun a single playlist

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\PlaylistsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$playlist_id = {{playlistId}}; // string | Id of the playlist

try {
    $result = $apiInstance->getPlaylistById($playlist_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PlaylistsApi->getPlaylistById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **playlist_id** | **string**| Id of the playlist | |

### Return type

[**\Api42Vb\Client\Model\Playlist**](../Model/Playlist.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPlaylists()`

```php
getPlaylists($limit, $offset, $search, $sort): \Api42Vb\Client\Model\PlaylistList
```

List playlists

Return the list of playlist.  Return an empty list it there is no playlist to return.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\PlaylistsApi(
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
    $result = $apiInstance->getPlaylists($limit, $offset, $search, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PlaylistsApi->getPlaylists: ', $e->getMessage(), PHP_EOL;
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

[**\Api42Vb\Client\Model\PlaylistList**](../Model/PlaylistList.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updatePlaylistById()`

```php
updatePlaylistById($playlist_id, $playlist_properties)
```

Update an existing playlist

Update a existing playlist.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new Api42Vb\Client\Api\PlaylistsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$playlist_id = {{playlistId}}; // string | Id of the playlist
$playlist_properties = new \Api42Vb\Client\Model\PlaylistProperties(); // \Api42Vb\Client\Model\PlaylistProperties

try {
    $apiInstance->updatePlaylistById($playlist_id, $playlist_properties);
} catch (Exception $e) {
    echo 'Exception when calling PlaylistsApi->updatePlaylistById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **playlist_id** | **string**| Id of the playlist | |
| **playlist_properties** | [**\Api42Vb\Client\Model\PlaylistProperties**](../Model/PlaylistProperties.md)|  | |

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
