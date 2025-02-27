<?php

namespace Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueTransactionFlags;

interface ABTransactionFlags
{
    public function isAllowPartialApproval(): bool;
    public function isRecurring(): bool;
    public function isInstallment(): bool;
    public function isCustomerInitiated(): bool;
    public function isCardholderPresent(): bool;
    public function isCardPresent(): bool;
}