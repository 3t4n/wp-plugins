<?php

namespace Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueCardDetails;

interface ABCardDetails
{
    public function getName(): string;
    public function getLast4(): string;
    public function getExpiryMonth(): int;
    public function getExpiryYear(): int;
    public function getCardType(): string;
    public function getAvsStreet(): string;
    public function getAvsZip(): string;
    public function getAuthCode(): string;
    public function getAvsResult(): string;
    public function getCvvResult(): string;
    public function getBin(): string;
    public function getAvsResultCode(): string;
    public function getCvvResultCode(): string;
    public function getCavvResult(): string;
    public function getCavvResultCode(): string;
}