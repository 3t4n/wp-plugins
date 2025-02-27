<?php

namespace Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueRefundResponse;

use Devurai\AcceptbluePaymentPro\DTOs\ABVoidRefundResponse;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueCustomer\ABCustomer;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueCustomer\AcceptBlueCustomer;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueTransactionDetails\ABTransactionDetails;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueTransactionDetails\AcceptBlueTransactionDetails;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueTransactionFlags\ABTransactionFlags;
use Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueTransactionFlags\AcceptBlueTransactionFlags;
use Devurai\AcceptbluePaymentPro\DTOs\BaseDTO;

class AcceptBlueRefundResponse extends BaseDTO implements ABVoidRefundResponse
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

    public function getErrorMessage(): string
    {
        return $this->response['error_message'] ?? 'null';
    }

    public function getErrorCode(): string
    {
        return $this->response['error_code'] ?? 'null';
    }

    public function getErrorDetails(): string
    {
        return $this->response['error_details'] ?? 'null';
    }
}