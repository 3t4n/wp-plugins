<?php

namespace Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueDigitalWalletResponse;

use Devurai\AcceptbluePaymentPro\DTOs\ABChargeResponse;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueTransaction\ABTransaction;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueTransaction\AcceptBlueTransaction;
use Devurai\AcceptbluePaymentPro\DTOs\BaseDTO;

class AcceptBlueDigitalWalletChargeResponse extends BaseDTO implements ABChargeResponse
{

    public function getVersion(): string
    {
        return $this->response['version'] ?? 'null';
    }

    public function getStatus(): string
    {
        return $this->response['status'] ?? 'null';
    }

    public function getStatusCode(): string
    {
        return $this->response['status_code'] ?? 'null';
    }

    public function getReferenceNumber(): int
    {
        return $this->response['reference_number'] ?? 'null';
    }

    public function getErrorMessage(): string
    {
        return $this->response['error_message'] ?? 'null';
    }

    public function getErrorCode(): string
    {
        return $this->response['error_code'] ?? 'null';
    }

    public function getCardType(): string
    {
        return $this->response['card_type'] ?? 'null';
    }

    public function getLast4(): string
    {
        return $this->response['last_4'] ?? 'null';
    }

    public function getAuthCode(): string
    {
        return $this->response['auth_code'] ?? 'null';
    }

    public function getAuthAmount()
    {
        return $this->response['auth_amount'] ?? 'null';
    }

    public function getAvsResult(): string
    {
        return $this->response['avs_result'] ?? 'null';
    }

    public function getAvsResultCode(): string
    {
        return $this->response['avs_result_code'] ?? 'null';
    }

    public function getCvv2Result(): string
    {
        return $this->response['cvv2_result'] ?? 'null';
    }

    public function getCvv2ResultCode(): string
    {
        return $this->response['cvv2_result_code'] ?? 'null';
    }

    public function getCardRef(): string
    {
        return $this->response['card_ref'] ?? 'null';
    }

    public function getTransaction(): ABTransaction
    {
        return new AcceptBlueTransaction($this->response['transaction'] ?? array());
    }
}