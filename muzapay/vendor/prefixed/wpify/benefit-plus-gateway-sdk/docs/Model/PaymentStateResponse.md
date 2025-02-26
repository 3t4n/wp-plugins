# # PaymentStateResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payment_id** | **string** | The unique identifier of the payment assigned by the gateway in &lt;code&gt;payments/init&lt;/code&gt; operation. |
**amount_authorized** | **int** | Approved payment amount in the lowest currency denomination. Will be present only for approved and/or partially cancelled payments. | [optional]
**payment_state** | **string** |  |
**payment_date_time** | **\DateTime** | Date and time at which the payment was initiated on gateway. UTC time zone. ISO 8601. | [optional]
**response_code** | **int** | Response code which specifies detail of the payment outcome. | [optional]
**order_reference_code** | **string** | Order code/number assigned by the merchant. The gateway will echo it in selected operations. Can be used as identifier of the purchase in e-shop and in settlement with Benefit Plus. The gateway checks for existence of the successful payment with the same value. |
**response_message** | **string** | Message with the transaction outcome text. | [optional]
**signature** | **string** | Response signature data. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
