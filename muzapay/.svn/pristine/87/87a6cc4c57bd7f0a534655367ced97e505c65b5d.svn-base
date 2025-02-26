# BenefitPlusGatewaySdk\MerchantPaymentApi

All URIs are relative to https://pay.benefit-plus.cz, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**cancelPayment()**](MerchantPaymentApi.md#cancelPayment) | **PUT** /v1/payments/{paymentId}/cancel | cancelPayment() |
| [**getPaymentState()**](MerchantPaymentApi.md#getPaymentState) | **GET** /v1/payments/{paymentId}/state | getPaymentState() |
| [**initPayment()**](MerchantPaymentApi.md#initPayment) | **POST** /v1/payments/init | initPayment() |


## `cancelPayment()`

```php
cancelPayment($payment_id, $signature)
```

cancelPayment()

Attempts to perform cancel (a technical reversal) of the previously initiated payment. The operation is asynchronous on the gateway. After you received 202, please use <code>/payments/{paymentId}/state</code> operation to verify the final outcome of the operation. Cancellation time is limited to 30 minutes after payment initialization. For later reclamation please contact helpdesk.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = BenefitPlusGatewaySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BenefitPlusGatewaySdk\Api\MerchantPaymentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payment_id = EC42E6695FFADAE5D0017952F0CF7A69; // string | The unique identifier of the payment assigned by the gateway in /payments/init operation.
$signature = JAl14ryV0FZw9tyBZNlMaJOrY34t/a1kiHJksvlLw0MVeMCrCbEdYPdGFHBQ5dThw08moCFg6iohmxdaKH8403HXuqNW2wct1zWQrobe/9JNGBzlJEEXUs15tdwuexSeHF0RP2cHiE8kiRc7I+LvVz+so9Vy2dZZHxcWGOhyk4RbYMCZ5qVOHNqWMepeLWkJkrwUQmYOqb/or0QhXo92yG+HDNvHEFU/BFEiXkKEHZtOUsmtXTG6LkS40QMQOGlUBnWGjseTcpaizTj8v1MdIbVXZMwlDn06t/yZdxHp6U2Ajj//6r8NQmcaOAqkmCzqoBucwR2Oa8gEx5ablm32RyQKBoI3vDXH4lRFXkTTsC6Fxq4HYZno4ZFRpd2fGJXtuV3z7pKVnIoxNDz8Lp4RjEwq3A1r929I/T4oAZyyMUSvh9nRyySldIIDYmw8Q/Z81xhoygW6IvVGyFU6ebPH+B4UHqcdzK2Zv7wUsddS3Wc6C7A8QD8g81w3nyy7zavTd5zgPk1KjVkvaZWUoqDfLwccApl9DqqWKPr4CvEJpJgKEaXjI+nbg+vPa9LvZ7f5si2RcIs1cXkzzOhgiT9b5q4Nkd/BoUYBufVJEZQCquXaXdKg0y8T+jD6qX2+Gh5EEYcbFtjXD/EW43mjgdz3CwVWIRj+STSmgLlUVm7HDPg=; // string | Request signature data. URL encoded. Sign <b>paymentId</b> in this order. See online gateway documentation for details.

try {
    $apiInstance->cancelPayment($payment_id, $signature);
} catch (Exception $e) {
    echo 'Exception when calling MerchantPaymentApi->cancelPayment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payment_id** | **string**| The unique identifier of the payment assigned by the gateway in /payments/init operation. | |
| **signature** | **string**| Request signature data. URL encoded. Sign &lt;b&gt;paymentId&lt;/b&gt; in this order. See online gateway documentation for details. | |

### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPaymentState()`

```php
getPaymentState($payment_id, $signature): \BenefitPlusGatewaySdk\Model\PaymentStateResponse
```

getPaymentState()

Returns current state of the payment. Response code and/or message will be returned when available.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = BenefitPlusGatewaySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BenefitPlusGatewaySdk\Api\MerchantPaymentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payment_id = EC42E6695FFADAE5D0017952F0CF7A69; // string | The unique identifier of the payment assigned by the gateway in /payments/init operation.
$signature = E1U95wMS2AUaPnnI6RknP0arEjwFs%2Bfr%2BkYBYIpIJqrSkwBpfr35JfWU8KLKFhcgsNmyMx1sHhXeOwB9Dqz3dPotSPV0XzJ6BuvIGaW1fgsTsoFSMXhYbSbzJHZXiEosvmGrQSXHBrS8upLhiGcVr9UCnQ3jTryp%2BKKGtJQQj%2FRE4yzRbRTPtl2JfVCleU3g6nXhKjDAEGkgf623KhCtQ4b9MOiaofyu5z%2BsFlKXVzmLe9vu9ARGZcPunv1RJyI1ysovarQU5%2F0H848dVxCJtMb3ZZvnn%2BkmZCOPJnKv8DJXeltcEYSOOV4tn%2Fy4MRzQYJmDhg3N5JILWtzE6VoG5hrq4RyWHryh7ZY4tIffG6TCMpYuJhurHYXY%2FOC2GIU8GsDWBy5%2B0McJrUTIbqIUwXjRO9LvlCzB%2BhgBgBSWeAtsGgbivQc5%2Fckf%2FRaxtmgWztrD%2BJONmnhkOCvOrNd3at%2BnbDgBsAn775f6Vnwit%2FISh7sNLyAZKsMC5XTY9%2FyMtCo0CHPu%2B4rbKsgGB3XfatSIZSo6IKiDXZ4U6FOb5hlgWNS8GJid%2B%2FbAV3NPzHjMrn1UxuDfZeR7mv2pwStO9sQA4%2FQZi4Qxu6nu6V3n%2BbRvvZg%2FHXi5rpHQsEI3eBmrEMhRTo7RUF3zBCYv78DscmLmHerN50yRjSk5nXcfFXM%3D; // string | Request signature data. URL encoded. Sign <b>paymentId</b>. See online gateway documentation for details.

try {
    $result = $apiInstance->getPaymentState($payment_id, $signature);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MerchantPaymentApi->getPaymentState: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payment_id** | **string**| The unique identifier of the payment assigned by the gateway in /payments/init operation. | |
| **signature** | **string**| Request signature data. URL encoded. Sign &lt;b&gt;paymentId&lt;/b&gt;. See online gateway documentation for details. | |

### Return type

[**\BenefitPlusGatewaySdk\Model\PaymentStateResponse**](../Model/PaymentStateResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `initPayment()`

```php
initPayment($signature, $init_payment_request, $x_correlation_id): \BenefitPlusGatewaySdk\Model\InitPaymentResponse
```

initPayment()

Registers payment request in the gateway and returns unique identifier of the payment for further referencing.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = BenefitPlusGatewaySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BenefitPlusGatewaySdk\Api\MerchantPaymentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$signature = mRkwRXiFxjn3wjA804sHqSNAZ14UbD20lNAmTDVM6BS%2F49ji7%2F3P%2BP6Z4YGYhdKF6MQ6MDnIwcFNLX7WYUxQbBYpS1HAwEUx60SosIkv6SkrutqVXDAkU79JEH3G11AfqgHRhPgZGa8kJXXsgtYGvI308%2BIE2dwXeFez89PLzrI9Lo47%2BSVJVA46WA30WCEvSO5vMmBcs2WVPnZKTT8DDAJ%2B%2B9Drf1LL0i7KS%2FXsTyuzNE5TWctvDC18YLMmpqcDmFDwWpmS%2BSEqHkDPM0zkbCJeL%2Fws74UMFvixdHtHpopgdVj7Y%2FWrwJehLXsm%2FMA7LPSDu1ch9Af69cWP94QN9epUgvFHt1LWnL8aNQzPCJf6CbxdIh%2B%2FU2wstSDJj4QVXnJpcDVzZj7Lb6KG8GOU6yu9CsyuYlKxeB9CnQzEFMTPCe91ceZWgeHB6rwQvESlRR7D%2BZy4cmKcYoJuXwru4YlLo52N8%2FTaelgXRahOTjKCsjw0p9CIjK%2Foe%2BjnKHYbH7v6tLdfV0OTjrDDjjzehlxK%2FxL0ximWT14IKaHG%2FCQRMJQy3wDgcEp6g9OJ8QGQou2YbuMKSRnewbfb2hKrpd1%2FI4E%2FOlNjF1VeocwUWB3fhbnV%2BrF7Z6fRqvFpYbsWaYNU8c7BEHOGrSeZuhbsQqaBJ9WOgmjveOVVrd45pa8%3D; // string | Request signature data. URL encoded. Sign X-Correlation-ID, <b>amount, productCode, orderReferenceCode</b>, orderDescription, merchantData, <b>returnUrl, language</b> in this order. See online gateway documentation for details.
$init_payment_request = new \BenefitPlusGatewaySdk\Model\InitPaymentRequest(); // \BenefitPlusGatewaySdk\Model\InitPaymentRequest
$x_correlation_id = 'x_correlation_id_example'; // string | Correlation identifier which may be sent by the e-shop in the request. The gateway will echo it in positive responses related to the same payment instance. Maximum length 128 characters.

try {
    $result = $apiInstance->initPayment($signature, $init_payment_request, $x_correlation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MerchantPaymentApi->initPayment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **signature** | **string**| Request signature data. URL encoded. Sign X-Correlation-ID, &lt;b&gt;amount, productCode, orderReferenceCode&lt;/b&gt;, orderDescription, merchantData, &lt;b&gt;returnUrl, language&lt;/b&gt; in this order. See online gateway documentation for details. | |
| **init_payment_request** | [**\BenefitPlusGatewaySdk\Model\InitPaymentRequest**](../Model/InitPaymentRequest.md)|  | |
| **x_correlation_id** | **string**| Correlation identifier which may be sent by the e-shop in the request. The gateway will echo it in positive responses related to the same payment instance. Maximum length 128 characters. | [optional] |

### Return type

[**\BenefitPlusGatewaySdk\Model\InitPaymentResponse**](../Model/InitPaymentResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
