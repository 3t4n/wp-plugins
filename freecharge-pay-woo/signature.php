<?php

class FCPGZ_MerchantCheckoutPayRequest
{
  private $merchantId;
  private $callbackUrl;
  private $merchantTxnId;
  private $merchantTxnAmount;
  private $currency;
  private $tags;
  private $customerId;
  private $customerName;
  private $customerEmailId;
  private $customerMobileNo;
  private $customerStreetAddress;
  private $customerCity;
  private $customerState;
  private $customerPIN;
  private $customerCountry;
  private $timeStamp;
  //signature
  private $subMerchantPayInfo;
  private $udf1;
  private $udf2;
  private $udf3;
  private $udf4;
  private $udf5;
  public function __construct(
    $merchantId, $callbackUrl, $merchantTxnId, $merchantTxnAmount,
    $currency, $tags, $customerId, $customerName, $customerEmailId,
    $customerMobileNo, $customerStreetAddress, $customerCity,
    $customerState, $customerPIN, $customerCountry, $timeStamp,
    $subMerchantPayInfo, $udf1, $udf2, $udf3, $udf4, $udf5
) {
    $this->merchantId = $merchantId;
    $this->callbackUrl = $callbackUrl;
    $this->merchantTxnId = $merchantTxnId;
    $this->merchantTxnAmount = $merchantTxnAmount;
    $this->currency = $currency;
    $this->tags = $tags;
    $this->customerId = $customerId;
    $this->customerName = $customerName;
    $this->customerEmailId = $customerEmailId;
    $this->customerMobileNo = $customerMobileNo;
    $this->customerStreetAddress = $customerStreetAddress;
    $this->customerCity = $customerCity;
    $this->customerState = $customerState;
    $this->customerPIN = $customerPIN;
    $this->customerCountry = $customerCountry;
    $this->timeStamp = $timeStamp;
    $this->subMerchantPayInfo = $subMerchantPayInfo;
    $this->udf1 = $udf1;
    $this->udf2 = $udf2;
    $this->udf3 = $udf3;
    $this->udf4 = $udf4;
    $this->udf5 = $udf5;
}


  public function getMerchantId()
  {
    return $this->merchantId;
  }
  public function getCallbackUrl()
  {
    return $this->callbackUrl;
  }
  public function getMerchantTxnId()
  {
    return $this->merchantTxnId;
  }
  public function getMerchantTxnAmount()
  {
    return $this->merchantTxnAmount;
  }
  public function getCurrency()
  {
    return $this->currency;
  }
  public function getTags()
  {
    return $this->tags;
  }
  public function getCustomerId()
  {
    return $this->customerId;
  }
  public function getCustomerName()
  {
    return $this->customerName;
  }
  public function getCustomerEmaild()
  {
    return $this->customerEmailId;
  }
  public function getCustomerMobilNo()
  {
    return $this->customerMobileNo;
  }
  public function getCustomerStreetAddress()
  {
    return $this->customerStreetAddress;
  }
  public function getCustomerCity()
  {
    return $this->customerCity;
  }
  public function getCustomerState()
  {
    return $this->customerState;
  }
  public function getCustomerPIN()
  {
    return $this->customerPIN;
  }
  public function getCustomerCountry()
  {
    return $this->customerCountry;
  }
  public function getTimeStamp()
  {
    return $this->timeStamp;
  }
  //signature
  public function getSubMerchantPayInfo()
  {
    return $this->subMerchantPayInfo;
  }
  public function getUdf1()
  {
    return $this->udf1;
  }
  public function getUdf2()
  {
    return $this->udf2;
  }
  public function getUdf3()
  {
    return $this->udf3;
  }
  public function getUdf4()
  {
    return $this->udf4;
  }
  public function getUdf5()
  {
    return $this->udf5;
  }

  //Setters
  public function setMerchantId($merchantId)
  {
    $this->merchantId = $merchantId;
  }
  public function setCallbackUrl($callbackUrl)
  {
    $this->callbackUrl = $callbackUrl;
  }
  public function setMerchantTxnId($merchantTxnId)
  {
    $this->merchantTxnId = $merchantTxnId;
  }
  public function setMerchantTxnAmount($merchantTxnAmount)
  {
    $this->merchantTxnAmount = $merchantTxnAmount;
  }
  public function setCurrency($currency)
  {
    $this->currency = $currency;
  }
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  public function setCustomerId($customerId)
  {
    $this->customerId = $customerId;
  }
  public function setCustomerName($customerName)
  {
    $this->customerName = $customerName;
  }
  public function setCustomerEmailId($customerEmailId)
  {
    $this->customerEmailId = $customerEmailId;
  }
  public function setCustomerMobilNo($customerMobileNo)
  {
    $this->customerMobileNo = $customerMobileNo;
  }
  public function setCustomerStreetAddress($customerStreetAddress)
  {
    $this->customerStreetAddress = $customerStreetAddress;
  }
  public function setCustomerCity($customerCity)
  {
    $this->customerCity = $customerCity;
  }
  public function setCustomerState($customerState)
  {
    $this->customerState = $customerState;
  }
  public function setCustomerPIN($customerPIN)
  {
    $this->customerPIN = $customerPIN;
  }
  public function setCustomerCountry($customerCountry)
  {
    $this->customerCountry = $customerCountry;
  }
  public function setTimeStamp($timeStamp)
  {
    $this->timeStamp = $timeStamp;
  }
  //signature
  public function setSubMerchantPayInfo($subMerchantPayInfo)
  {
    $this->subMerchantPayInfo = $subMerchantPayInfo;
  }
  public function setUdf1($udf1)
  {
    $this->udf1 = $udf1;
  }
  public function setUdf2($udf2)
  {
    $this->udf2 = $udf2;
  }
  public function setUdf3($udf3)
  {
    $this->udf3 = $udf3;
  }
  public function setUdf4($udf4)
  {
    $this->udf4 = $udf4;
  }
  public function setUdf5($udf5)
  {
    $this->udf5 = $udf5;
  }
  public function generateSignature($merchant_key)
  {
    $tmpobject = array();
    if (!empty($this->getMerchantId()))
      $tmpobject["merchantId"] = $this->getMerchantId();
    if (!empty($this->getCallbackUrl()))
      $tmpobject["callbackUrl"] = $this->getCallbackUrl();
    if (!empty($this->getMerchantTxnId()))
      $tmpobject["merchantTxnId"] = $this->getMerchantTxnId();
    if (!empty($this->getMerchantTxnAmount()))
      $tmpobject["merchantTxnAmount"] = $this->getMerchantTxnAmount();
    if (!empty($this->getCurrency()))
      $tmpobject["currency"] = $this->getCurrency();
    if (!empty($this->getTags()))
      $tmpobject["tags"] = $this->getTags();
    if (!empty($this->getCustomerId()))
      $tmpobject["customerId"] = $this->getCustomerId();
    if (!empty($this->getCustomerName()))
      $tmpobject["customerName"] = $this->getCustomerName();
    if (!empty($this->getCustomerEmaild()))
      $tmpobject["customerEmailId"] = $this->getCustomerEmaild();
    if (!empty($this->getCustomerMobilNo()))
      $tmpobject["customerMobileNo"] = $this->getCustomerMobilNo();
    if (!empty($this->getCustomerStreetAddress()))
      $tmpobject["customerStreetAddress"] = $this->getCustomerStreetAddress();
    if (!empty($this->getCustomerCity()))
      $tmpobject["customerCity"] = $this->getCustomerCity();
    if (!empty($this->getCustomerState()))
      $tmpobject["customerState"] = $this->getCustomerState();
    if (!empty($this->getCustomerPIN()))
      $tmpobject["customerPIN"] = $this->getCustomerPIN();
    if (!empty($this->getCustomerCountry()))
      $tmpobject["customerCountry"] = $this->getCustomerCountry();
    if (!empty($this->getTimeStamp()))
      $tmpobject["timestamp"] = $this->getTimeStamp();
    //signature
    if (!empty($this->getSubMerchantPayInfo()))
      $tmpobject["subMerchantPayInfo"] = $this->getSubMerchantPayInfo();
    if (!empty($this->getUdf1()))
      $tmpobject["udf1"] = $this->getUdf1();
    if (!empty($this->getUdf2()))
      $tmpobject["udf2"] = $this->getUdf2();
    if (!empty($this->getUdf3()))
      $tmpobject["udf3"] = $this->getUdf3();
    if (!empty($this->getUdf4()))
      $tmpobject["udf4"] = $this->getUdf4();
    if (!empty($this->getUdf5()))
      $tmpobject["udf5"] = $this->getUdf5();
    
    $generator = new FcpgzSignatureGenerator($merchant_key);
    return $generator->generateSignature($tmpobject);
  }
}
