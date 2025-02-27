<?php

namespace Devurai\AcceptbluePaymentPro\DTOs;

use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueAmountDetails\ABAmountDetails;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueCustomer\ABCustomer;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueStatusDetails\ABStatusDetails;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueTransaction\ABTransaction;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueTransactionDetails\ABTransactionDetails;

interface ABChargeResponse
{
    public function getVersion(): string;
    public function getStatus(): string;
    public function getStatusCode(): string;
    public function getReferenceNumber(): int;
    public function getErrorMessage(): string;
    public function getErrorCode(): string;
    public function getCardType(): string;
    public function getLast4(): string;
    public function getAuthCode(): string;
    public function getAuthAmount();
    public function getAvsResult(): string;
    public function getAvsResultCode(): string;
    public function getCvv2Result(): string;
    public function getCvv2ResultCode();
    public function getCardRef():string;
    public function getTransaction(): ABTransaction;
}