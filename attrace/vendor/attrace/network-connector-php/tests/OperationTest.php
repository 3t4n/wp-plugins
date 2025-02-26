<?php


namespace Attrace\Connector\Test;


use Attrace\Connector\API\Model\IntegrationConfigModel;
use Attrace\Connector\Client;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Entity\Account;
use Attrace\Connector\Entity\Address;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Protocol\Core\Block;
use Attrace\Connector\Protocol\Core\Operation;
use Attrace\Connector\Protocol\Core\OperationModifyAccountAccess\AccessScope\TXScope;
use Attrace\Connector\Entity\ContractprotocolValue;
use Attrace\Connector\Service\Operations\ConfirmAgreement;
use Attrace\Connector\Service\Operations\CreateAgreement;
use Attrace\Connector\Service\Operations\CreateRoot;
use Attrace\Connector\Service\Operations\ModifyAccountAccess;
use Attrace\Connector\Service\Operations\TransferValue;
use Attrace\Connector\API\Model\TransactionModel;
use Attrace\Connector\Util\Base32;
use Attrace\Connector\Util\Crypto;
use Attrace\Connector\Util\Log;
use Attrace\Connector\Util\Network;

/**
 * You need to run lonet to run this tests:
 *
 * Open in 1 terminal, in attrace/core: `lonet/up-reset`, in another terminal `lonet/produce`
 *
 * Class OperationTest
 * @package Attrace\Connector\Test
 */
class OperationTest extends TestCase
{
	private $r = [
		"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",
	];
	
	public function testTransactionLoop()
	{
		foreach($this->r as $raw) {
			$block = new Block();
			$block->mergeFromString(base64_decode($raw));
			foreach($block->getTransactions() as $transaction) {
				self::assertTrue(is_int($transaction->getTimestamp()));
			}
		}
	}
	
	public function testGenerateTransferValue()
	{
		try {
			$pub = Address::fromBase32($this->keys[0]['addr']);
			$ad = Address::fromBase32($this->keys[1]['addr']);
			$operationTransferValue = TransferValue::create($pub, $ad, 100);
			self::assertTrue(true);
		} catch(AttraceException $e) {
			self::fail();
		}
	}
	
	/**
	 * Testing multi hash
	 */
	public function testTestMultiHash()
	{
		try {
			$key = "IGVYLUL7FDZ4SLKGRDWLIXPLGNZT7D74LXMLT2U22ZQ54JJ5LWB5MG4XTBE5ZWP6WLET3MKHOXJHWO7E4VXFVRGXEHICOMJWGV6FZDP4ZAPA";
			$addr = "AA2PE3CZUT22OD6UQE3F7LU2N7ULLH6R5ZH2GVWNDNIACGD7A62OYAJ3";
			
			$acc = Account::fromPrivateKeyBase32($key);
			
			$to = Address::fromBase32($addr);
			
			
			/** @var Operation $operation */
			$op = TransferValue::create($acc->getAddress(), $to, 10001);
			$hash = TransactionModel::createSigned($acc, [$op], 1591795003309, true);
			$expectedArray = [116, 123, 213, 167, 239, 90, 227, 14, 67, 201, 11, 19, 44, 202, 221, 96, 80, 79, 227, 157, 189, 93, 185, 24, 232, 45, 72, 115, 14, 227, 82, 170];
			self::assertEquals($hash, $expectedArray);
			
		} catch(AttraceException $e) {
			self::fail();
			die($e->getMessage());
		}
	}
	
	public function testSimpleClick()
	{
		try {
			$integrationConfigJson = '{"Role":"publisher","Agreement":"ATYWOIDH5I7NKRV6FVJD55LSD46BX5BA7AZCO5UHVENB5BYA4NI4TPDM","OperationalKey":"IEJ3G4EIBE2OW4SNGHXCXDWEOGK3TGGSNOEXAB2MUTDTVBJZRBR77NX6XZDXE5QJ7I7U6I3UCU463VZ5WCUOZJTMSYY3ZN72SLX7AUL5RLKA","DelegateOf":"ABSOAUUFUN7ZNQLAQJE3XTUZXP5XCJ3XLBKDVBH254RADRRM3T7ZJHK3","RootActionConfigs":[{"RootType":"click","RedirectUrls":[{"Url":"https:\/\/u82329p77103.web0091.zxcs-klant.nl\/","AliasId":"BvRJK"}]}],"DefaultActionRootType":"click","ExpireDays":1,"UrlActions":[{"Url":"\/sale","Action":"sale"}],"Name":"https:\/\/u82329p77103.web0091.zxcs-klant.nl-publisher-15-10-2020-13:40:19","Metadata":[{"Key":"PublisherType","Value":{"Str":"Related website"}},{"Key":"IntegrationType","Value":{"Str":"textlink"}}],"Network":"betanet"}';
			$integrationConfigModel = new IntegrationConfigModel($integrationConfigJson);
			$tx = Network::createClickTransaction($integrationConfigModel);
			Network::publishTransaction($tx);
			echo "Click published, check: https://explorer.attrace.com/transactions/" . $tx->getHashBase32() . PHP_EOL;
			echo "You might have to wait for a few seconds";
			self::assertTrue(true);
		} catch(AttraceException $e) {
			self::fail();
		}
    }


    public function testCreateClickSaleApproved()
    {

        try {
            $sleep     = true;
            $seeder    = Account::fromPrivateKeyBase32("IGVYLUL7FDZ4SLKGRDWLIXPLGNZT7D74LXMLT2U22ZQ54JJ5LWB5MG4XTBE5ZWP6WLET3MKHOXJHWO7E4VXFVRGXEHICOMJWGV6FZDP4ZAPA", true);

            $publisher = Account::fromPrivateKeyBase32("IFNO7PFXBLZESPHXGLRU7AID2LIWPAQCAEOQXFBBZ4J7H4J6UCKLCNHSNRM2J5NHB7KICNS7V2NG72FVT7I64T5DK3GRWUABDB7QPNHMTK3A", true);


            $advertiser = Account::fromPrivateKeyBase32("IH2Z34XP4TTREK27JVZUDTEK3V2NJMFGXQ4OA7SUFAGC2CTRV4CESIXHRZB6KNVETM7QSBS65Z2MKB4UAGMAVR4P6PXOTPK5BTQNYGUFQUYA", true);

            $publisherDelegatee = Account::generateNewAccount();

            $advertiserDelegatee = Account::generateNewAccount();

            /** @var Client $client */
            $client = new Client($this->validConfig);

            /** @var Operation $operation */
            $op = TransferValue::create($seeder->getAddress(), $publisher->getAddress(), 60000);

            /** @var TransactionModel $tx */
            $tx  = TransactionModel::createSigned($seeder, [$op]);
            $res = $client->getService()->publishTransaction($tx);

            /** @var Operation $operation */
            $op = TransferValue::create($seeder->getAddress(), $advertiser->getAddress(), 60000);

            /** @var TransactionModel $tx */
            $tx  = TransactionModel::createSigned($seeder, [$op]);
            $res = $client->getService()->publishTransaction($tx);


            if ($sleep) {
                sleep(2);
            }


            $contractId = Constants::CONTRACT_ID_ATTRACE_AFFILIATE_USD;
            $listmap = ContractprotocolValue::createListMap([
                    [
                        "Key"   => 1,
                        "Value" => ["Str" => "lead=0.5;sale=12.5"]
                    ],
                    [
                        "Key"   => 2,
                        "Value" => ["Str" => "0,20,0.02,1;20,40.5,0.03,1;40.5,5000,10.5,2"]
                    ]
                ]
            );


            /** @var Operation $operation */
            $op = CreateAgreement::create([$publisher->getAddress(), $advertiser->getAddress()], $listmap, 1, $contractId, 720);
            /** @var TransactionModel $tx */
            $tx = TransactionModel::createSigned($publisher, [$op], 1562663226436);


            $agreementAddress = Address::forAgreement($tx->getHash(), $contractId);
            // verify hashing
            self::assertEquals('ASUJWSEJTISK3SL6QQ2GBJ36OWWP6QUTNBUZRLBBGHT5HHJILHIO7GSQ', $agreementAddress->encodeBase32());


            //publish this agreementAddress
            $res = $client->getService()->publishTransaction($tx);

            if ($sleep) {
                sleep(2);
            }


            Log::println();
            $op = ConfirmAgreement::create($agreementAddress);
            $tx = TransactionModel::createSigned($publisher, [$op]);
            Log::println('Agreement confirmed by publisher: ' . $res);

            $res = $client->getService()->publishTransaction($tx);

            $op  = ConfirmAgreement::create($agreementAddress);
            $tx  = TransactionModel::createSigned($advertiser, [$op]);
            $res = $client->getService()->publishTransaction($tx);
            Log::println('Agreement confirmed by advertiser: ' . $res);


            if ($sleep) {
                sleep(2);
            }

            //  $advertiserDelegatee = Account::generateNewAccount();

            //set scopes
            $txScope = new TXScope();
            $txScope->setCreateRoot(true);
            $txScope->setRootActionCall(true);

            $op  = ModifyAccountAccess::create($advertiserDelegatee->getAddress(), $txScope);
            $tx  = TransactionModel::createSigned($advertiser, [$op]);
            $res = $client->getService()->publishTransaction($tx);
            Log::println('Delegatee access for advertiser: ' . $res);

            if ($sleep) {
                sleep(2);
            }

//            $publisherDelegatee = Account::generateNewAccount();
            $op  = ModifyAccountAccess::create($publisherDelegatee->getAddress(), $txScope);
            $tx  = TransactionModel::createSigned($publisher, [$op]);
            $res = $client->getService()->publishTransaction($tx);
            Log::println('Delegatee access for publisher: ' . $res);

            if ($sleep) {
                sleep(3);
            }

            Log::println('Start click');
            $op = CreateRoot::create($agreementAddress, $publisherDelegatee->getAddress(), 'click');
            $tx = TransactionModel::createSignedTransactionWithDelegator($publisher->getAddress(), $publisherDelegatee, [$op], 1562663226436);

            $res = $client->getService()->publishTransaction($tx);
            Log::println('Published click: ' .  $tx->getHashBase32());

            $clickRoot = Address::fromBase32("BCOJ7IDCOJ5RNEORSWQEX4XX3UFWFNDV7VHQYN44YGFHIEZ7J7AV2PXN");

            if ($sleep) {
                sleep(2);
            }

            Log::println('Start Sale');
            $op = CreateRoot::create($agreementAddress, $advertiserDelegatee->getAddress(), 'sale', $clickRoot,
                [ContractprotocolValue::createValue(["Str" => "123.394"])]);
            $tx = TransactionModel::createSignedTransactionWithDelegator($advertiser->getAddress(), $advertiserDelegatee, [$op], 1562663226436);
            Log::println('Published sale: ' .  $tx->getHashBase32());

            $res = $client->getService()->publishTransaction($tx);
            Log::println('Published Sale: ' .  Base32::encode($tx->getProtocolTransaction()->getHash()));

            if ($sleep) {
                sleep(2);
            }

            Log::println('Approve Sale');
            $saleRoot = Address::fromBase32("BC2CBY7O6PQI6AD7FOEXNDYYSQTUNYZPXC2JB2AZG6CRIUOYFYEE3QBU");

            $op = CreateRoot::create($agreementAddress, $advertiserDelegatee->getAddress(), 'approved', $saleRoot);
            $tx = TransactionModel::createSignedTransactionWithDelegator($advertiser->getAddress(), $advertiserDelegatee, [$op], 1562663226436);

            $res = $client->getService()->publishTransaction($tx);
            Log::println('Published Approved Sale: ' . $res);


        } catch (AttraceException $e) {

            echo $e->toString();
            self::assertTrue(false);

        }
    }


    public function testPublishTransverValue()
    {
        try {
            $key  = "IGVYLUL7FDZ4SLKGRDWLIXPLGNZT7D74LXMLT2U22ZQ54JJ5LWB5MG4XTBE5ZWP6WLET3MKHOXJHWO7E4VXFVRGXEHICOMJWGV6FZDP4ZAPA";
            $addr = "AA2PE3CZUT22OD6UQE3F7LU2N7ULLH6R5ZH2GVWNDNIACGD7A62OYAJ3";

            $acc = Account::fromPrivateKeyBase32($key);
            $to  = Address::fromBase32($addr);
            /** @var Operation $operation */
            $op = TransferValue::create($acc->getAddress(), $to, 10001);

            /** @var TransactionModel $tx */
            $tx = TransactionModel::createSigned($acc, [$op], 1591795003309);
            //Log::binaryAsBytes($tx->getTransactionCore()->getSignature(),'Signature');
            $expectedSignature = [149, 8, 214, 178, 60, 250, 240, 72, 96, 138, 89, 152, 221, 203, 202, 79, 235, 5, 91, 247, 66, 190, 149, 159, 122, 24, 210, 206, 123, 53, 213, 216, 69, 235, 117, 231, 168, 134, 197, 90, 78, 217, 159, 249, 235, 55, 167, 192, 56, 249, 218, 28, 150, 145, 106, 35, 88, 25, 141, 163, 47, 62, 72, 8];
            self::assertEquals(Crypto::binaryToByteArray($tx->getProtocolTransaction()->getSignature()), $expectedSignature);

            $client = new Client($this->validConfig);
            $res    = $client->getService()->publishTransaction($tx);
        } catch (AttraceException $e) {
            Log::println("");
            Log::println($e->getMessage());
            self::assertTrue(false);
        }
    }

}
