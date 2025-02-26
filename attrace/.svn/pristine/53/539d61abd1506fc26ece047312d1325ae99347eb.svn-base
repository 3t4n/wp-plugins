<?php


namespace Attrace\Connector\Service;


use Attrace\Connector\API\Model\TransactionModel;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Entity\Address;
use Attrace\Connector\Entity\Agreement;
use Attrace\Connector\Entity\Witness;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Util\NetUtil;
use Attrace\Connector\Util\Perf;


class Service
{
    private $network;
    private $discoverManifest;

    /** @var Witness $selectedWitness */
    private $selectedWitness;

    private $errorWitnessAddresses = [];

    /**
     * @return Witness
     */
    public function getSelectedWitness()
    {
        return $this->selectedWitness;
    }


    /**
     * Service constructor.
     * @param $network string The network (lonet, testnet, betanet)
     * @param null $discoverManifest string The discovery manifest (only applicable for lonet)
     * @throws AttraceException
     */
    public function __construct($network, $discoverManifest = null)
    {
        $this->discoverManifest = $discoverManifest;
        $this->network          = $network;
        $this->initializeWitness();
    }

    /**
     * TODO: make sure we don't select same witness again upon failure
     *
     * Inits the service
     * Separate method as it invokes a call to fetch the manifest;
     *
     * @throws AttraceException
     */
    public function initializeWitness()
    {

        $witnessResponse = $this->fetchManifest();
        $witnessArray    = json_decode(trim($witnessResponse['body']), true);

        if (!isset($witnessArray['Witnesses'])) {
            throw new AttraceException(AttraceException::WITNESS_ERROR, 'No Witnesses element in response');
        }

        //filter out error witnesses
        $filteredWitnesses = [];
        foreach ($witnessArray['Witnesses'] as $witness) {
            if (!isset($witness['Address'])) {
                continue;
            }
            if (in_array($witness['Address'], $this->errorWitnessAddresses)) {
                continue;
            }
            $filteredWitnesses[] = $witness;
        }
        $witnessArray['Witnesses'] = $filteredWitnesses;

        //try find nearest node for speed
        if (isset($witnessResponse['header']['x-amz-cf-pop'])) {
            $pop                   = $witnessResponse['header']['x-amz-cf-pop'];
            $this->selectedWitness = $this->selectNearestNode($witnessArray, $pop);
            return;
        }

        //if it doesnt work, use random selection
        $index                 = mt_rand(0, (count($witnessArray['Witnesses']) - 1));
        $this->selectedWitness = new Witness($witnessArray['Witnesses'][$index]);
    }

    /**
     * Calculate distance haversine
     *
     * @param $start
     * @param $end
     * @return float|int
     */
    private function haversine($start, $end)
    {
        $r = 6371;

        $dLat = deg2rad($end['lat'] - $start['lat']);
        $dLon = deg2rad($end['lon'] - $start['lon']);
        $lat1 = deg2rad($start['lat']);
        $lat2 = deg2rad($end['lat']);
        $a    = sin($dLat / 2) * sin($dLat / 2) + sin($dLon / 2) + sin($dLon / 2) * cos($lat1) * cos($lat2);
        $c    = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $c * $r;
    }


    /**
     * @param $witnessArray
     * @param $pop
     * @return Witness|null
     * @throws AttraceException
     */
    private function selectNearestNode($witnessArray, $pop)
    {
        if (!isset($witnessArray['Airports'])) {
            return null;
        }

        $iata          = substr($pop, 0, 3);
        $searchAirport = function ($iata, $airPorts) {
            foreach ($airPorts as $airPort) {
                if (!isset($airPort['iata'])) {
                    continue;
                }
                if ($airPort['iata'] == $iata) {
                    return $airPort;
                }

            }
            return null;
        };
        $airPort       = $searchAirport($iata, $witnessArray['Airports']);
        if (!$airPort) {
            return null;
        }
        $nearest = null;
        foreach ($witnessArray['Witnesses'] as $witness) {
            if (
                !isset($witness['Location']) ||
                !isset($witness['Location']['Latitude']) ||
                !isset($witness['Location']['Longitude'])
            ) {
                continue;
            }
            $lat = $witness['Location']['Latitude'] / 100000.0;
            $lon = $witness['Location']['Longitude'] / 100000.0;
            if (!$lat || !$lon) {
                continue;
            }
            $d = $this->haversine($airPort, ['lat' => $lat, 'lon' => $lon]);
            if (!$nearest || $d < $nearest['d']) {
                $nearest['d'] = $d;
                $nearest['w'] = $witness;
            }
        }
        return new Witness($nearest['w']);
    }


    /**
     * @return string The manifest url
     */
    public function getManifestUrl()
    {
        if ($this->network == 'lonet') {
            return $this->discoverManifest;
        }
        return str_replace('{{network}}', $this->network, Constants::DISCOVERY_MANIFEST);
    }

    /**
     * @throws AttraceException
     */
    public function fetchManifest()
    {
        try {
            Perf::start('fetchManifest');
            $response = NetUtil::doGetRequest($this->getManifestUrl());
            Perf::stop('fetchManifest');
            return $response;
        } catch (AttraceException $e) {
            throw new AttraceException(AttraceException::NETWORK_ERROR, 'Error while fetching manifest: ' . $e->getMessage());
        }
    }

    /**
     * @param TransactionModel $transaction
     * @return string the Response body
     * @throws AttraceException
     */
    public function publishTransaction(TransactionModel $transaction)
    {
        Perf::start('tx->serializeToString');
        $binary = $transaction->getProtocolTransaction()->serializeToString();
        Perf::stop('tx->serializeToString');
        $url = $this->selectedWitness->getHttpConnectionString() . Constants::NETWORK_BIN_TRANSACTION;
        //post as binary
        Perf::start('doPublishRequest');
        $error = '';
        for ($retry = 0; $retry < Constants::RETRIES; $retry++) {
            try {
                $ret = NetUtil::doBinaryRequest($url, $binary);
                Perf::stop('doPublishRequest');
                return $ret;
            } catch (AttraceException $e) {
                //this witness is dead, list as error
                $this->errorWitnessAddresses[] = $this->selectedWitness->getAddress();
                //rotate to other
                $this->initializeWitness();
                $error = $e->getMessage();
                continue;

            }
        }

        throw new AttraceException(AttraceException::WITNESS_UNKNOWN, 'Max retries, Some bad request: ' . $error);
    }

    /**
     * @param Address $address
     * @param string $route
     * @return string
     * @throws AttraceException
     */
    public function getJsonStringByAddress(Address $address, $route = Constants::NETWORK_API_BLOCKCHAIN_ADDRESS)
    {
        $url = $this->selectedWitness->getHttpConnectionString() . $route . '/' . $address->encodeBase32();
        return NetUtil::doGetRequest($url)['body'];
    }

    /**
     * @param Address $address
     * @return Agreement
     * @throws AttraceException
     */
    public function getAgreement(Address $address)
    {
        $json = $this->getJsonStringByAddress($address);
        return new Agreement($json);
    }

    /**
     * @param Address $address
     * @return Agreement[]
     * @throws AttraceException
     */
    public function getAgreementsByParty(Address $address)
    {
        $url  = $this->selectedWitness->getHttpConnectionString() . Constants::NETWORK_API_BLOCKCHAIN_AGREEMENTS;
        $data = NetUtil::doPostJsonRequest($url, ['Party' => $address->encodeBase32()]);
        if (!isset($data['Agreements'])) {
            return [];
        }
        $ret = [];
        foreach ($data['Agreements'] as $agreement) {
            $ret[] = $this->getAgreement(Address::fromBase32($agreement['Address']));
        }
        return $ret;
    }

    /**
     * @param Address $party
     * @param array $types
     * @param int $limit
     * @param int $offset
     * @return mixed
     * @throws AttraceException
     */
    public function getTransactionsByParty(Address $party, array $types, $limit = 100, $offset = 0){
        return $this->getTransactionsByAgreements($this->getAgreementsByParty($party), $types, $limit,$offset);
    }

    /**
     * @param Address $address
     * @return array
     * @throws AttraceException
     */
    public function getRootHistoryByAddress(Address $address) {
        $url = Constants::INDEX_BASE_PATH.Constants::INDEX_HISTORY.'?Address='.$address->encodeBase32();
        $result = NetUtil::doGetRequest($url);
        return Netutil::processResponse(json_decode($result['body'], true));
    }

    /**
     * Get transactions
     *
     * @param Agreement[] $agreements [agreementaddres1,agreementaddress2]
     * @param array $types ['click','lead','sale']
     * @param int $limit
     * @param int $offset
     * @return mixed
     * @throws AttraceException
     */
    public function getTransactionsByAgreements(array $agreements, array $types, $limit = 100, $offset = 0) {
        $url = Constants::INDEX_BASE_PATH.Constants::INDEX_ROOTS;
        // add agreements
        $agreementParams = [];
        foreach ($agreements as $agreement) {
            if (!$agreement->allPartiesConfirmed()) {
                continue;
            }
            
			$agreementParams[] = $agreement->getAddress();
        }
		$url = NetUtil::urlAddVar($url, 'Agreements', $agreementParams);

        // add types
		if(!empty($types)) {
			$url = NetUtil::urlAddVar($url, 'Actions', array_values($types));
		}

        //set limit offset
        $url = NetUtil::urlAddVar($url, 'Limit', $limit);
        $url = NetUtil::urlAddVar($url, 'Offset', $offset);
        $result = NetUtil::doGetRequest($url);

        return Netutil::processResponse(json_decode($result['body'], true));
    }



}