<?php

namespace Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueTransactionFlags;

use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueTerminal\ABTerminal;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueTerminal\AcceptBlueTerminal;
use Devurai\AcceptbluePaymentPro\DTOs\BaseDTO;

class AcceptBlueTransactionFlags extends BaseDTO implements ABTransactionFlags
{
    public function isAllowPartialApproval(): bool
    {
        return $this->response['allow_partial_approval'] ?? false;
    }

    public function isRecurring(): bool
    {
        return $this->response['is_recurring'] ?? false;
    }

    public function isInstallment(): bool
    {
        return $this->response['is_installment'] ?? false;
    }

    public function isCustomerInitiated(): bool
    {
        return $this->response['is_customer_initiated'] ?? false;
    }

    public function isCardholderPresent(): bool
    {
        return $this->response['is_cardholder_present'] ?? false;
    }

    public function isCardPresent(): bool
    {
        return $this->response['card_present'] ?? false;
    }

    public function getTerminal(): ABTerminal
    {
        return new AcceptBlueTerminal($this->response['terminal'] ?? array());
    }
}