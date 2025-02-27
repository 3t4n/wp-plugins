<?php

namespace Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueSurcharge;

use Devurai\AcceptbluePaymentPro\DTOs\BaseDTO;

class AcceptBlueCheckSurcharge extends BaseDTO implements ABCheckSurcharge
{

    public function get_type(): string
    {
        return $this->response['type'] ?? 'null';
    }

    public function get_value(): int
    {
        return $this->response['value'] ?? 0;
    }

    public function is_currency(): bool
    {
        return $this->get_type() === 'currency';
    }

    public function is_percentage(): bool
    {
        return $this->get_type() === 'percent';
    }
}