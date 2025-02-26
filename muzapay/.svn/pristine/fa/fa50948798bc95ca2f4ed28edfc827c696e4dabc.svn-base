# BenefitPlusGatewaySdk\MerchantEShopAuthenticationApi

All URIs are relative to https://pay.benefit-plus.cz, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**authenticate()**](MerchantEShopAuthenticationApi.md#authenticate) | **POST** /v1/auth/token | authenticate() |


## `authenticate()`

```php
authenticate($authentication_request): \BenefitPlusGatewaySdk\Model\AuthenticationResponse
```

authenticate()

Validates and authenticates the e-shop and returns access token which must be used in further communication with the gateway. Send credentials <code>eshopId</code> and <code>eshopPassword</code> assigned to you in your e-shop onboarding in <code>Authorization</code> header using Basic scheme. In case of token expiration the e-shop must reauthenticate.<br/></br> The token returned in the response must be sent in HTTP header of all further requests to the gateway. Example of the header for further operation is <code>Authorization: Bearer UMWZw61rbGFkb3bDvSBKV1QgdG9rZW4u</code>.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = BenefitPlusGatewaySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new BenefitPlusGatewaySdk\Api\MerchantEShopAuthenticationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$authentication_request = new \BenefitPlusGatewaySdk\Model\AuthenticationRequest(); // \BenefitPlusGatewaySdk\Model\AuthenticationRequest

try {
    $result = $apiInstance->authenticate($authentication_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MerchantEShopAuthenticationApi->authenticate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **authentication_request** | [**\BenefitPlusGatewaySdk\Model\AuthenticationRequest**](../Model/AuthenticationRequest.md)|  | |

### Return type

[**\BenefitPlusGatewaySdk\Model\AuthenticationResponse**](../Model/AuthenticationResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
