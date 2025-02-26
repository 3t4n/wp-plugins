<?php


namespace Attrace\Connector\Entity;

use ArrayObject;
use Attrace\Connector\API\Controller\TransactionController;
use Attrace\Connector\API\Model\TransactionModel;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Exceptions\AttraceException;

/***
 * Agreement, as it lives on the network
 *
 * Class Agreement
 * @package Attrace\Connector\Entity
 */
class Agreement extends ArrayObject
{
    private $currency;
    private $confirmationDueInHours;
    private $compensation = [];

    //consts from contract
    const   InitArgumentBaseCompensationAmounts    = 1;
    const   InitArgumentSaleValueCompensationRules = 2;
    const   InitArgumentLeadValueCompensationRules = 3;
    const   ValueCompensationPercentage            = 1;
    const   ValueCompensationFixed                 = 2;


    /**
     * Agreement constructor.
     * @param $json
     * @throws AttraceException
     */
    public function __construct($json)
    {


        $array = json_decode($json, true);
        if (!$array) {
            throw new AttraceException(AttraceException::NOT_FOUND, "This agreement does not exist");
        }
        if (!isset($array['AddressStates'])) {
            throw new AttraceException(AttraceException::INVALID_JSON, "Invalid agreement json " . $json);
        }
        $states = $array['AddressStates'];
        foreach ($states as $state) {
            if (!isset($state['Agreement'])) {
                continue;
            }
            parent::__construct($state['Agreement']);

            if (!isset($this['CreateOperation'])) {
                return;
            }
            $createOperation = $this['CreateOperation'];
            //set the currency
            $currencyIn = isset($createOperation['CompensationCurrency']) ? $createOperation['CompensationCurrency'] : 1;

            //legacy contracts can have currency 0. We default them to 1 (USD) as well.
            if ($currencyIn == 0) {
                $currencyIn = 1;
            }
            $this->currency = Constants::CURRENCY[$currencyIn];


            //args/values
            if (!isset($createOperation['Arguments'])) {
                return;
            }
            $arguments = $createOperation['Arguments'];

            if (!isset($arguments['Values'])) {
                return;
            }
            $values = $arguments['Values'];


            //https://gitlab.com/attrace/core/-/blob/develop/contracts/affiliate/v1/v1_AttraceContractAffiliateV1.go#L420
            //basic compensation = at 0
            $compensationArr = [];
            foreach ($values as $valueRow) {
                if ($valueRow['Key'] == self::InitArgumentBaseCompensationAmounts) {
                    //basic compensation
                    $parts = explode(";", $valueRow['Value']['Str']);
                    foreach ($parts as $part) {
                        $expr                                     = explode("=", $part);
                        $conversionType                           = $expr[0];
                        $conversionValue                          = $expr[1];
                        $compensationArr[$conversionType]         = [];
                        $compensationArr[$conversionType]['type'] = ($conversionValue > 0) ? 'fixed' : 'ext';
                        if ($conversionValue > 0) {
                            $compensationArr[$conversionType]['value'] = $conversionValue;
                        }
                    }
                }
                if (($valueRow['Key'] == self::InitArgumentSaleValueCompensationRules) || ($valueRow['Key'] == self::InitArgumentLeadValueCompensationRules)) {
                    //Syntax: 'min,max,compensationamount,compensationtype;...'.
                    $rules                                     = explode(";", $valueRow['Value']['Str']);
                    $conversionType                            = ($valueRow['Key'] == self::InitArgumentSaleValueCompensationRules) ? 'sale' : 'lead';
                    $compensationArr[$conversionType]['rules'] = [];
                    foreach ($rules as $rule) {
                        $ruleParts                                   = explode(",", $rule);
                        $compensationArr[$conversionType]['rules'][] = [
                            'min'                => $ruleParts[0],
                            'max'                => $ruleParts[1],
                            'compensationamount' => $ruleParts[2],
                            'compensationtype'   => ($ruleParts[3] == self::ValueCompensationFixed) ? 'fixed' : 'percentage',
                        ];
                    }
                }
            }
            $this->compensation = $compensationArr;
        }
        if (!isset($array['AddressStates'])) {
            throw new AttraceException(AttraceException::INVALID_JSON, "No agreement at this Address");
        }
    }

    public function getCompensation()
    {
        return $this->compensation;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getParties()
    {
        return $this->offsetExists('Parties') ? $this->offsetGet('Parties') : [];
    }

    public function getConfirmedParties()
    {
        $parties          = $this->getParties();
        $confirmedIndexes = $this->offsetExists('ConfirmedParties') ? $this->offsetGet('ConfirmedParties') : [];
        $ret              = [];
        foreach ($confirmedIndexes as $confirmedIndex) {
            $ret[] = $parties[$confirmedIndex];
        }
        return $ret;
    }

    /**
     * Checks if all parties confirmed the Agreement
     */
    public function allPartiesConfirmed()
    {
        return count($this->getParties()) == count($this->getConfirmedParties());
    }

    /**
     * Get agreement addressstring
     * @return mixed
     */
    public function getAddress()
    {
        return $this->offsetExists('Addr') ? $this->offsetGet('Addr') : null;
    }

    /**
     * @throws AttraceException
     */
    public function getPublisher()
    {
        $parties = $this->getParties();
        if (!isset($parties[0])) {
            throw new AttraceException(AttraceException::INVALID_JSON, 'No publisher in this agreement ' . json_encode($this->getArrayCopy()));
        }
        return $parties[0];
    }

    /**
     * @return mixed
     * @throws AttraceException
     */
    public function getAdvertiser()
    {
        $parties = $this->getParties();
        if (!isset($parties[1])) {
            throw new AttraceException(AttraceException::INVALID_JSON, 'No advertiser in this agreement ' . json_encode($this->getArrayCopy()));
        }
        return $parties[1];
    }


}