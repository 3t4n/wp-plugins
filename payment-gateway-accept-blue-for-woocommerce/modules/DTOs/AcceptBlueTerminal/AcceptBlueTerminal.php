<?php

namespace Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueTerminal;

use Devurai\AcceptbluePaymentPro\DTOs\BaseDTO;

class AcceptBlueTerminal extends BaseDTO implements ABTerminal
{

    public function getOperatingEnvironment(): int
    {
        return $this->response['operating_environment'] ?? 0;
    }

    public function getCardholderAuthenticationMethod(): string
    {
        return $this->response['cardholder_authentication_method'] ?? 'null';
    }

    public function getCardholderAuthenticationEntity(): int
    {
        return $this->response['cardholder_authentication_entity'] ?? 0;
    }

    public function getPrintCapability(): bool
    {
        return $this->response['print_capability'] ?? false;
    }
}