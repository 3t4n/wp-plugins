<?php

namespace Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueSurcharge;

interface ABCheckSurcharge
{
    public function get_type(): string;
    public function get_value(): int;
    public function is_currency(): bool;
    public function is_percentage(): bool;
}