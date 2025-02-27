<?php
/**
 * Provides configuration for an get transaction call.
 *
 * @package GiroCheckout
 * @version $Revision: 24 $ / $Date: 2014-05-22 14:30:12 +0200 (Do, 22 Mai 2014) $
 */

class GiroCheckout_SDK_Gfkl_PayProtect extends GiroCheckout_SDK_AbstractApi implements GiroCheckout_SDK_InterfaceApi {

    /*
     * Includes any parameter field of the API call. True parameter are mandatory, false parameter are optional.
     * For further information use the API documentation.
     */
    protected $paramFields = array(
//        'merchantId'=> TRUE,
//        'projectId' => TRUE,
//        'merchantTxId' => TRUE,
//        'customerFirstName' => TRUE,
//        'customerLastName' => TRUE,
//        'customerStreet' => TRUE,
//        'customerStreetNumber' => TRUE,
//        'customerZipCode' => TRUE,
//        'customerCity' => TRUE,
//        'customerCountry' => TRUE,
//        'customerBirthDate' => TRUE,
//        'customerGender' => TRUE,
//        'customerEmail' => FALSE,
//        'customerIp' => TRUE,
//        'customerId' => FALSE,
//        'amount' => TRUE,
//        'currency' => TRUE,
//        'iban' => FALSE,
//        'bic' => FALSE,
//        'shopId' => FALSE,
      'merchantId'=> FALSE,
      'projectId' => FALSE,
      'merchantTxId' => FALSE,
      'customerFirstName' => FALSE,
      'customerLastName' => FALSE,
      'customerStreet' => FALSE,
      'customerStreetNumber' => FALSE,
      'customerZipCode' => FALSE,
      'customerCity' => FALSE,
      'customerCountry' => FALSE,
      'customerBirthDate' => FALSE,
      'customerGender' => FALSE,
      'customerEmail' => FALSE,
      'customerIp' => FALSE,
      'customerId' => FALSE,
      'amount' => FALSE,
      'currency' => FALSE,
      'iban' => FALSE,
      'bic' => FALSE,
      'shopId' => FALSE,
    );


    /*
     * Includes any response field parameter of the API.
     */
    protected $responseFields = array(
        'rc'=> TRUE,
        'msg' => TRUE,
        'reference' => FALSE,
        'backendTxId' => FALSE,
        'backendCustomerId' => FALSE,
        'resultRisk' => FALSE,
        'customerFirstName' => FALSE,
        'customerLastName' => FALSE,
        'customerStreet' => FALSE,
        'customerStreetNumber' => FALSE,
        'customerZipCode' => FALSE,
        'customerCity' => FALSE,
        'uatpCard' => FALSE,
        'uatpExpdate' => FALSE,
        'uatpStatus' => FALSE,
    );

    /*
     * True if a hash is needed. It will be automatically added to the post data.
     */
    protected $needsHash = TRUE;

    /*
     * The request url of the GiroCheckout API for this request.
     */
    protected $requestURL = "https://payment.girosolution.de/girocheckout/api/v2/gfkl/payprotect";

    /*
     * If true the request method needs a notify page to receive the transactions result.
     */
    protected $hasNotifyURL = FALSE;

    /*
     * If true the request method needs a redirect page where the customer is sent back to the merchant.
     */
    protected $hasRedirectURL = FALSE;

    /*
     * The result code number of a successful transaction
     */
    protected $paymentSuccessfulCode = 7000;
}