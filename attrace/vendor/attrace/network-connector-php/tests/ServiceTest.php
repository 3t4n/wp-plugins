<?php


namespace Attrace\Connector\Test;


use Attrace\Connector\Entity\Address;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Service\Service;
use Attrace\Connector\Util\Log;
use Attrace\Connector\Util\NetUtil;
use Attrace\Connector\Util\Network;

class ServiceTest extends TestCase
{

    public function testNetworkManifest()
    {
        $service = new Service('testnet');
        self::assertEquals($service->getManifestUrl(), 'https://discovery.attrace.network/testnet/manifest.json');
    }

    /**
     * dummy test this
     */
    public function testRedirectUrl()
    {
        $url = 'https://www.test.nl';
        $ret = NetUtil::urlAddVars($url, ['foo' => 'nice']);
        self::assertEquals('https://www.test.nl?foo=nice', $ret);

        $url = 'https://www.test.nl?bar=123';
        $ret = NetUtil::urlAddVars($url, ['foo' => 'nice']);
        self::assertEquals('https://www.test.nl?bar=123&foo=nice', $ret);

        $url = 'https://www.test.nl?bar';
        $ret = NetUtil::urlAddVars($url, ['foo' => 'nice']);
        self::assertEquals('https://www.test.nl?bar&foo=nice', $ret);
	
		$url = 'https://www.test.nl?bar';
		$ret = NetUtil::urlAddVars($url, ['foo' => 'nice']);
		self::assertEquals('https://www.test.nl?bar&foo=nice', $ret);
	
        $url = 'https://www.test.nl?bar=123';
        $ret = NetUtil::urlAddVars($url, ['foo' => 'nice', 'boo' => 'bad']);
        self::assertEquals('https://www.test.nl?bar=123&foo=nice&boo=bad', $ret);
	
		$url = 'https://www.test.nl?bar=123';
		$ret = NetUtil::urlAddVars($url, ['foo' => 'nice', 'bar' => 321]);
		self::assertEquals('https://www.test.nl?bar=123&foo=nice&bar=321', $ret);

        $url = 'https://www.test.nl?bar=123';
        $ret = NetUtil::urlAddVar($url, 'same', ['value1', 'value2', 'value3', 'value4']);
        self::assertEquals('https://www.test.nl?bar=123&same=value1&same=value2&same=value3&same=value4', $ret);

        $ret = NetUtil::urlAddVar($ret, 'another', 'coolvalue');
        self::assertEquals('https://www.test.nl?bar=123&same=value1&same=value2&same=value3&same=value4&another=coolvalue', $ret);
    }
	
	public function testCurlRequests()
	{
		$url = 'https://github.com/';
		$ret = NetUtil::doGetRequest($url);
		self::assertEquals('gzip', trim($ret['header']['content-encoding']));
		self::assertStringContainsString('</head>', $ret['body']);
		self::assertStringContainsString('</html>', $ret['body']);
		
		$url = 'https://reqres.in/api/users';
		$data = ['name' => 'morpheus', 'job' => 'leader'];
		$ret = NetUtil::doPostJsonRequest($url, $data);
		self::assertArrayHasKey('name', $ret);
		self::assertArrayHasKey('job', $ret);
		self::assertArrayHasKey('id', $ret);
		self::assertArrayHasKey('createdAt', $ret);
		
		/* the remote website fails time-to-time
		$url = 'https://reqres.in/api/register';
		$binary = '{"email": "eve.holt@reqres.in", "password": "pistol"}';
		$ret = NetUtil::doBinaryRequest($url, $binary);
		$arr = json_decode($ret, true);
		self::assertArrayHasKey('error', $arr);
		*/
	}

    public function testFetchByAddress()
    {
        try {
            $address = Address::fromBase32('ASK7NMAPKO2RIAPQBGBWEESFQOK35555SFOYT4MTB4CM7KAE6X4EEFYD');
            $agreement = Network::getAgreement($address);
            self::assertEquals('ABCSZVCWDU5DOSZZSRVJTXH6Y4IXUZFH6YFOTLX5J2LIWJZLDXQWEMCW', $agreement->getPublisher());
            self::assertEquals('ABOA2JSBWTQCYRFRTXZEPMONGICTP7XYGCROLHCQIY3LTRTJ6TCF6YP2', $agreement->getAdvertiser());
        } catch (AttraceException $e) {
            Log::println("");
            echo ($e->getMessage());
            self::assertTrue(false);
        }
    }
	
	public function testFetchTransactionsByParty()
	{
		try {
			$address = Address::fromBase32('ADIOM36DA7WCDN6R2ZZI3GSKWJOMQSTF5ACJRXKVCJVT2E6OCF6ZYRX6');
			$transactions = Network::getTransactionsByParty($address, ['sale']);
			self::assertArrayHasKey(0, $transactions);
			self::assertArrayHasKey('address', $transactions[0]);
		} catch (AttraceException $e) {
			Log::println("");
			Log::println($e->getMessage());
			self::assertTrue(false);
		}
	}

    public function testFetchRootHistory()
    {
        try {
            $address = Address::fromBase32('BADRNCTGX7FQWMBLAICH7ZI3H2TWPR3TFHJBNBHU6OGX7JPZ53P245NF');
            $transactions = Network::getRootHistoryByAddress($address);
            self::assertTrue(isset($transactions[0]['action']));
        } catch (AttraceException $e) {
            Log::println("");
            Log::println($e->getMessage());
            self::assertTrue(false);
        }
    }


    public function testFetchAgreementsByParty()
    {
        try {
            $staticAgreement = Network::getAgreement(Address::fromBase32('ASLBNCJFPKGUQWRAMCNQL4PV4AD6Z6RWPYTW4VDL2QVKJFSD53VLLGUZ'));
            $dynamicAgreement =  Network::getAgreement(Address::fromBase32('ASKOWE4GJ35CMK4M2U4HPXHSHQZQIIWNJKOTG5O7BC22PKQLUQTWWONQ'));
            $compensation = $staticAgreement->getCompensation();
            self::assertEquals('fixed',$compensation['sale']['type']);
            $compensation = $dynamicAgreement->getCompensation();
            self::assertEquals('0.2',$compensation['sale']['rules'][0]['compensationamount']);
        } catch (AttraceException $e) {
            Log::println("");
            Log::println($e->getMessage());
            self::assertTrue(false);
        }
    }

}
