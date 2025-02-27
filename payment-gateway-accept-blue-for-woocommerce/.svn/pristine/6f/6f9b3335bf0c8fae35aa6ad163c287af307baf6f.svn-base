<?php

namespace Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueBillingInfo;

use Devurai\AcceptbluePaymentPro\DTOs\ABAddressInfo;
use Devurai\AcceptbluePaymentPro\DTOs\BaseDTO;

class AcceptBlueBillingInfo extends BaseDTO implements ABAddressInfo
{

    public function getFirstName(): string
    {
        return $this->response['first_name'] ?? 'null';
    }

    public function getLastName(): string
    {
        return $this->response['last_name'] ?? 'null';
    }

    public function getStreet(): string
    {
        return $this->response['street'] ?? 'null';
    }

    public function getStreet2(): string
    {
        return $this->response['street2'] ?? 'null';
    }

    public function getCity(): string
    {
        return $this->response['city'] ?? 'null';
    }

    public function getState(): string
    {
        return $this->response['state'] ?? 'null';
    }

    public function getZip(): string
    {
        return $this->response['zip'] ?? 'null';
    }

    public function getCountry(): string
    {
        return $this->response['country'] ?? 'null';
    }

    public function getPhone(): string
    {
        return $this->response['phone'] ?? 'null';
    }
}