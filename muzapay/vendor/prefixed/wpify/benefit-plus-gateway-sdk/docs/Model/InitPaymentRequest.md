# # InitPaymentRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **int** | Total requested amount of the payment in the lowest currency denomination (halíř, cent). |
**product_code** | **string** | Product category code of the purchase. Food and beverages is FOOD (food stamps); travelling, tourism, culture, sport, printed books, learning and healthcare is LEISURE. |
**order_reference_code** | **string** | Order code/number assigned by the merchant. The gateway will echo it in selected operations. Can be used as identifier of the purchase in e-shop and in settlement with Benefit Plus. The gateway checks for existence of the successful payment with the same value. |
**order_description** | **string** | Optional description of the order. | [optional]
**merchant_data** | **string** | Optional merchant&#39;s data received in &lt;code&gt;payments/init&lt;/code&gt; operation. Encoded in Base64 (RFC 4684). | [optional]
**return_url** | **string** | The returning URL of the e-shop to which the gateway should pass on the control of the flow after payment conclusion. E-shop &lt;b&gt;must&lt;/b&gt; implement the endpoint which accepts the GET method with query parameter paymentId and listens on &lt;code&gt;returnUrl&lt;/code&gt; address. |
**language** | **string** | Code of the desired language in which the gateway should communicate with the payer. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
