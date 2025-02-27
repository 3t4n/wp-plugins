<?php

namespace Devurai\AcceptbluePaymentPro\DTOs\AcceptBlueSurcharge;

use Devurai\AcceptbluePaymentPro\DTOs\BaseDTO;
use Devurai\AcceptbluePaymentPro\Surcharge\Surcharge;

class AcceptBlueSurcharge extends BaseDTO implements ABSurcharge
{

    public function getCard(): ABCardSurcharge
    {
        return new AcceptBlueCardSurcharge($this->response['card'] ?? array());
    }

    public function getCheck(): ABCheckSurcharge
    {
        return new AcceptBlueCheckSurcharge($this->response['check'] ?? array());
    }
}