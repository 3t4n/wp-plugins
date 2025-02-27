<?php

namespace Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueTransaction;

use Devurai\AcceptbluePaymentPro\DTOs\ABAddressInfo;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueAmountDetails\ABAmountDetails;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueAmountDetails\AcceptBlueAmountDetails;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueBillingInfo\AcceptBlueBillingInfo;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueCardDetails\ABCardDetails;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueCardDetails\AcceptBlueCardDetail;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueCustomer\ABCustomer;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueCustomer\AcceptBlueCustomer;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueShippingInfo\AcceptBlueShippingInfo;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueStatusDetails\ABStatusDetails;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueStatusDetails\AcceptBlueStatusDetails;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueTransactionDetails\ABTransactionDetails;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueTransactionDetails\AcceptBlueTransactionDetails;
use Devurai\AcceptbluePaymentPro\DTOs\BaseDTO;

class AcceptBlueTransaction extends BaseDTO implements ABTransaction
{

    public function getID(): int
    {
        return $this->response['id'] ?? 0;
    }

    public function getCreatedAt(): string
    {
        return $this->response['created_at'] ?? 'null';
    }

    public function getSettledDate(): string
    {
        return $this->response['settled_at'] ?? 'null';
    }

    public function getCardDetails(): ABCardDetails
    {
        return new AcceptBlueCardDetail($this->response['card_details'] ?? array());
    }

    public function getAmountDetails(): ABAmountDetails
    {
        return new AcceptBlueAmountDetails($this->response['amount_details'] ?? array());
    }

    public function getTransactionDetails(): ABTransactionDetails
    {
        return new AcceptBlueTransactionDetails($this->response['transaction_details'] ?? array());
    }

    public function getCustomer(): ABCustomer
    {
        return new AcceptBlueCustomer($this->response['customer'] ?? array());
    }

    public function getStatusDetails(): ABStatusDetails
    {
        return new AcceptBlueStatusDetails($this->response['status_details'] ?? array());
    }

    public function getCustomFields(): array
    {
        return $this->response['custom_fields'] ?? array();
    }

    public function getBillingInfo(): ABAddressInfo
    {
        return new AcceptBlueBillingInfo($this->response['billing_info'] ?? array());
    }

    public function getShippingInfo(): ABAddressInfo
    {
        return new AcceptBlueShippingInfo($this->response['shipping_info'] ?? array());
    }
}