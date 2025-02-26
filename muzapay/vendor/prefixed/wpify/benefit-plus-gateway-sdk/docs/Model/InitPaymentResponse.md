# # InitPaymentResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payment_id** | **string** | The unique identifier of the payment assigned by the gateway in &lt;code&gt;payments/init&lt;/code&gt; operation. |
**order_reference_code** | **string** | Echo of the request value. |
**beneficiary_id** | **string** | Identifier of the payment beneficiary (a payee) assigned in merchant onboarding. Will be used in settlement. |
**amount** | **int** | Total payment amount in the lowest currency denomination (halíř, cent). |
**currency** | [**\BenefitPlusGatewaySdk\Model\Currency**](Currency.md) |  |
**gateway_url** | **string** | The temporary URL of the gateway which should be opened by the e-shop from payer&#39;s browser. |
**signature** | **string** | Response signature data. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
