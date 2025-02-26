# # Video

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**title** | **string** | title of the video | [optional]
**description** | **string** | description of the video | [optional]
**public** | **bool** | Define if the video is public (it can be accessible by anybody with the video url). Default &#x3D; tue | [optional]
**tags** | **string[]** | tags list linked to video | [optional]
**id** | **string** | id of the video (null when adding a new video) |
**status** | **string** | Status of the video : * &#39;REQUESTED&#39;: video as been submited, waiting for its creation * &#39;CREATED&#39;: video has been created and file can be uploaded          * &#39;TRANSCODING&#39;: video is unvailable because still in the creation  &amp; in encoding process * &#39;TRANSCODING_ERROR&#39;: video is unvailable because the encoding failed  * &#39;AVAILABLE&#39;: video is ready to be stream | [optional]
**duration** | **int** | video duration in second | [optional]
**ctime** | **int** | Creation date (timestamp) | [optional]
**mtime** | **int** | Modification date (timestamp) | [optional]
**assets** | [**\Api42Vb\Client\Model\VideoAssets**](VideoAssets.md) |  | [optional]
**metas** | **array<string,mixed>** | metas data  free-form object: refere to the documentation | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
