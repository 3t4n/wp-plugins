<?php

namespace Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueTransaction;

use Devurai\AcceptbluePaymentPro\DTOs\ABAddressInfo;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueAmountDetails\ABAmountDetails;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueCardDetails\ABCardDetails;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueCustomer\ABCustomer;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueStatusDetails\ABStatusDetails;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueTransactionDetails\ABTransactionDetails;

interface ABTransaction
{
    public function getID(): int;
    public function getCreatedAt(): string;
    public function getSettledDate(): string;
    public function getCardDetails(): ABCardDetails;
    public function getAmountDetails(): ABAmountDetails;
    public function getTransactionDetails(): ABTransactionDetails;
    public function getCustomer(): ABCustomer;
    public function getStatusDetails(): ABStatusDetails;
    public function getCustomFields(): array;
    public function getBillingInfo(): ABAddressInfo;
    public function getShippingInfo(): ABAddressInfo;
}