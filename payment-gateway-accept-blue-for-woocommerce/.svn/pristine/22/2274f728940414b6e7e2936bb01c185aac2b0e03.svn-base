<?php

namespace Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueCardDetails;

use Devurai\AcceptbluePaymentPro\DTOs\BaseDTO;

class AcceptBlueCardDetail extends BaseDTO implements ABCardDetails
{

    public function getName(): string
    {
        return $this->response['name'] ?? 'null';
    }

    public function getLast4(): string
    {
        return $this->response['last4'] ?? 'null';
    }

    public function getExpiryMonth(): int
    {
        return $this->response['expiry_month'] ?? 0;
    }

    public function getExpiryYear(): int
    {
        return $this->response['expiry_year'] ?? 0;
    }

    public function getCardType(): string
    {
        return $this->response['card_type'] ?? 'null';
    }

    public function getAvsStreet(): string
    {
        return $this->response['avs_street'] ?? 'null';
    }

    public function getAvsZip(): string
    {
        return $this->response['avs_zip'] ?? 'null';
    }

    public function getAuthCode(): string
    {
        return $this->response['auth_code'] ?? 'null';
    }

    public function getAvsResult(): string
    {
        return $this->response['avs_result'] ?? 'null';
    }

    public function getCvvResult(): string
    {
        return $this->response['cvv_result'] ?? 'null';
    }

    public function getBin(): string
    {
        return $this->response['bin'] ?? 'null';
    }

    public function getAvsResultCode(): string
    {
        return $this->response['avs_result_code'] ?? 'null';
    }

    public function getCvvResultCode(): string
    {
        return $this->response['cvv_result_code'] ?? 'null';
    }

    public function getCavvResult(): string
    {
        return $this->response['cavv_result'] ?? 'null';
    }

    public function getCavvResultCode(): string
    {
        return $this->response['cavv_result_code'] ?? 'null';
    }
}