# OpenAPIClient-php

42videobricks is a Video Platform As A Service (VPaaS)


## Installation & Usage

### Requirements

PHP 7.4 and later.
Should also work with PHP 8.0.

### Composer

#### From packagist.org

```bash
composer require 42videobricks/php-client
```

### From github repository

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/42videobricks/42videobricks-php-client"
    }
  ],
  "require": {
    "42videobricks/php-client": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
$config = Api42Vb\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');

$apiInstance = new Api42Vb\Client\Api\VideosApi(
    new GuzzleHttp\Client(),
    $config
);
$limit = 10; // int | Number of elements to return (default=10)
$offset = 0; // int | offset for pagination

try {
    $result = $apiInstance->getVideos($limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideosApi->getVideos: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://api-sbx.42videobricks.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*DataApi* | [**getDataVideoUsage**](docs/Api/DataApi.md#getdatavideousage) | **GET** /data/videos/usage | List Video Usage KPIs
*PlaylistsApi* | [**addPlaylist**](docs/Api/PlaylistsApi.md#addplaylist) | **POST** /playlists | Add a new playlist
*PlaylistsApi* | [**deletePlaylistById**](docs/Api/PlaylistsApi.md#deleteplaylistbyid) | **DELETE** /playlists/{playlistId} | Delete a playlist
*PlaylistsApi* | [**getPlaylistById**](docs/Api/PlaylistsApi.md#getplaylistbyid) | **GET** /playlists/{playlistId} | Retun a single playlist
*PlaylistsApi* | [**getPlaylists**](docs/Api/PlaylistsApi.md#getplaylists) | **GET** /playlists | List playlists
*PlaylistsApi* | [**updatePlaylistById**](docs/Api/PlaylistsApi.md#updateplaylistbyid) | **PUT** /playlists/{playlistId} | Update an existing playlist
*TagsApi* | [**getTags**](docs/Api/TagsApi.md#gettags) | **GET** /tags | List Video Tags
*VideosApi* | [**addAttachmentByVideoId**](docs/Api/VideosApi.md#addattachmentbyvideoid) | **POST** /videos/{videoId}/attachments/{attachmentType}/{locale} | Upload an attachement
*VideosApi* | [**addThumbnailByVideoId**](docs/Api/VideosApi.md#addthumbnailbyvideoid) | **POST** /videos/{videoId}/thumbnail | Upload a thumbnail
*VideosApi* | [**addVideo**](docs/Api/VideosApi.md#addvideo) | **POST** /videos | Add a new video
*VideosApi* | [**deleteAttachmentByVideoId**](docs/Api/VideosApi.md#deleteattachmentbyvideoid) | **DELETE** /videos/{videoId}/attachments/{attachmentType}/{locale} | Delete an attachment
*VideosApi* | [**deleteThumbnailByVideoId**](docs/Api/VideosApi.md#deletethumbnailbyvideoid) | **DELETE** /videos/{videoId}/thumbnail | Delete a thumbnail
*VideosApi* | [**deleteVideoById**](docs/Api/VideosApi.md#deletevideobyid) | **DELETE** /videos/{videoId} | Delete a video
*VideosApi* | [**finalizeMultipartUploadVideoById**](docs/Api/VideosApi.md#finalizemultipartuploadvideobyid) | **POST** /videos/{videoId}/multipart-upload/finalize | Multipart upload finalization
*VideosApi* | [**finalizeUploadVideoById**](docs/Api/VideosApi.md#finalizeuploadvideobyid) | **PUT** /videos/{videoId}/upload/finalize | Single file upload finalization
*VideosApi* | [**getAttachmentByVideoId**](docs/Api/VideosApi.md#getattachmentbyvideoid) | **GET** /videos/{videoId}/attachments/{attachmentType}/{locale} | Get the attachment
*VideosApi* | [**getAttachmentFileByVideoId**](docs/Api/VideosApi.md#getattachmentfilebyvideoid) | **GET** /videos/{videoId}/attachments/{attachmentType}/{locale}/file | Get attachement file
*VideosApi* | [**getAttachmentsByVideoId**](docs/Api/VideosApi.md#getattachmentsbyvideoid) | **GET** /videos/{videoId}/attachments | List of attachments
*VideosApi* | [**getVideoById**](docs/Api/VideosApi.md#getvideobyid) | **GET** /videos/{videoId} | Retun a single video
*VideosApi* | [**getVideoStatusById**](docs/Api/VideosApi.md#getvideostatusbyid) | **GET** /videos/{videoId}/status | Retun the detailed status of the video
*VideosApi* | [**getVideos**](docs/Api/VideosApi.md#getvideos) | **GET** /videos | List videos
*VideosApi* | [**initMultipartUploadVideoById**](docs/Api/VideosApi.md#initmultipartuploadvideobyid) | **POST** /videos/{videoId}/multipart-upload/init | Multipart upload intialization
*VideosApi* | [**initUploadVideoById**](docs/Api/VideosApi.md#inituploadvideobyid) | **GET** /videos/{videoId}/upload/init | Single file upload intialization
*VideosApi* | [**updateVideoById**](docs/Api/VideosApi.md#updatevideobyid) | **PUT** /videos/{videoId} | Update an existing video
*WebhooksApi* | [**addWebhook**](docs/Api/WebhooksApi.md#addwebhook) | **POST** /webhooks | Add a new webhook
*WebhooksApi* | [**deleteWebhookById**](docs/Api/WebhooksApi.md#deletewebhookbyid) | **DELETE** /webhooks/{webhookId} | Delete a webhook
*WebhooksApi* | [**getWebhookById**](docs/Api/WebhooksApi.md#getwebhookbyid) | **GET** /webhooks/{webhookId} | Retun a single webhook
*WebhooksApi* | [**getWebhooks**](docs/Api/WebhooksApi.md#getwebhooks) | **GET** /webhooks | List webhooks
*WebhooksApi* | [**updateWebhookById**](docs/Api/WebhooksApi.md#updatewebhookbyid) | **PUT** /webhooks/{webhookId} | Update an existing webhook

## Models

- [DataVideoUsage](docs/Model/DataVideoUsage.md)
- [DataVideoUsageList](docs/Model/DataVideoUsageList.md)
- [Error](docs/Model/Error.md)
- [Pagination](docs/Model/Pagination.md)
- [Playlist](docs/Model/Playlist.md)
- [PlaylistList](docs/Model/PlaylistList.md)
- [PlaylistProperties](docs/Model/PlaylistProperties.md)
- [TagList](docs/Model/TagList.md)
- [Video](docs/Model/Video.md)
- [VideoAssets](docs/Model/VideoAssets.md)
- [VideoAttachment](docs/Model/VideoAttachment.md)
- [VideoAttachmentList](docs/Model/VideoAttachmentList.md)
- [VideoList](docs/Model/VideoList.md)
- [VideoMultipartUploadFinalize](docs/Model/VideoMultipartUploadFinalize.md)
- [VideoMultipartUploadFinalizePartsInner](docs/Model/VideoMultipartUploadFinalizePartsInner.md)
- [VideoMultipartUploadInit](docs/Model/VideoMultipartUploadInit.md)
- [VideoMultipartUploadInitResponse](docs/Model/VideoMultipartUploadInitResponse.md)
- [VideoMultipartUploadInitResponsePartsInner](docs/Model/VideoMultipartUploadInitResponsePartsInner.md)
- [VideoProperties](docs/Model/VideoProperties.md)
- [VideoStatus](docs/Model/VideoStatus.md)
- [VideoUploadInitResponse](docs/Model/VideoUploadInitResponse.md)
- [Webhook](docs/Model/Webhook.md)
- [WebhookList](docs/Model/WebhookList.md)
- [WebhookProperties](docs/Model/WebhookProperties.md)

## Authorization

Authentication schemes defined for the API:
### api_key

- **Type**: API key
- **API key parameter name**: x-api-key
- **Location**: HTTP header


## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author



## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.2`
    - Package version: `1.2.1`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
